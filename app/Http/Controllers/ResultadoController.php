<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ResultadoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('resultado-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('resultados.index', [
            'resultados' => Resultado::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/resultados'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('resultado-create');

        return view('resultados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('resultado-create');

        $Resultado = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255'
          ]);
  
        $new_resultado = Resultado::create($Resultado);

        // LOG
        Log::create([
            'model_id' => $new_resultado->id,
            'model' => 'Resultado',
            'action' => 'store',
            'changes' => json_encode($new_resultado),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('resultados.index'))->with('message', 'Resultado criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultado $resultado) : View
    {
        $this->authorize('resultado-show');

        return view('resultados.show', [
            'resultado' => $resultado
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultado $resultado) : View
    {
        $this->authorize('resultado-edit');

        return view('resultados.edit', [
          'resultado' => $resultado
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultado $resultado) : RedirectResponse
    {
        $this->authorize('resultado-edit');
  
        $resultado->update($request->validate(['nome' => 'required|max:255', 'descricao' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $resultado->id,
            'model' => 'Resultado',
            'action' => 'update',
            'changes' => json_encode($resultado->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('resultados.index'))->with('message', 'Resultado alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)  : RedirectResponse
    {
        $this->authorize('resultado-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $resultado->id,
                'model' => 'Resultado',
                'action' => 'destroy',
                'changes' => json_encode($resultado),
                'user_id' => auth()->id(),            
            ]);
  
            $resultado->delete();

            DB::commit();
  
            return redirect(route('resultados.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('resultados.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
