<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class MetodoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('metodo-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('metodos.index', [
            'metodos' => Metodo::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/metodos'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('metodo-create');

        return view('metodos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('metodo-create');

        $metodo = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255',
          ]);
  
        $new_metodo = Metodo::create($metodo);

        // LOG
        Log::create([
            'model_id' => $new_metodo->id,
            'model' => 'Metodo',
            'action' => 'store',
            'changes' => json_encode($new_metodo),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('metodos.index'))->with('message', 'Método criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Metodo $metodo) : View
    {
        $this->authorize('metodo-show');

        return view('metodos.show', [
            'metodo' => $metodo
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metodo $metodo) : View
    {
        $this->authorize('metodo-edit');

        return view('metodos.edit', [
          'metodo' => $metodo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Metodo $metodo) : RedirectResponse
    {
        $this->authorize('metodo-edit');
  
        $metodo->update($request->validate(['nome' => 'required|max:255','descricao' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $metodo->id,
            'model' => 'Metodo',
            'action' => 'update',
            'changes' => json_encode($metodo->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('metodos.index'))->with('message', 'Método alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metodo $metodo)  : RedirectResponse
    {
        $this->authorize('metodo-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $metodo->id,
                'model' => 'Metodo',
                'action' => 'destroy',
                'changes' => json_encode($metodo),
                'user_id' => auth()->id(),            
            ]);
  
            $metodo->delete();

            DB::commit();
  
            return redirect(route('metodos.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('metodos.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
