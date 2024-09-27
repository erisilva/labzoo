<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('categoria-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('categorias.index', [
            'categorias' => Categoria::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/categorias'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('categoria-create');

        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('categoria-create');

        $Categoria = $request->validate([
            'nome' => 'required|max:255',
          ]);
  
        $new_categoria = Categoria::create($Categoria);

        // LOG
        Log::create([
            'model_id' => $new_categoria->id,
            'model' => 'Categoria',
            'action' => 'store',
            'changes' => json_encode($new_categoria),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('categorias.index'))->with('message', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria) : View
    {
        $this->authorize('categoria-show');

        return view('categorias.show', [
            'categoria' => $categoria
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria) : View
    {
        $this->authorize('categoria-edit');

        return view('categorias.edit', [
          'categoria' => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria) : RedirectResponse
    {
        $this->authorize('categoria-edit');
  
        $categoria->update($request->validate(['nome' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $categoria->id,
            'model' => 'Categoria',
            'action' => 'update',
            'changes' => json_encode($categoria->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('categorias.index'))->with('message', 'Categoria alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)  : RedirectResponse
    {
        $this->authorize('categoria-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $categoria->id,
                'model' => 'Categoria',
                'action' => 'destroy',
                'changes' => json_encode($categoria),
                'user_id' => auth()->id(),            
            ]);
  
            $categoria->delete();

            DB::commit();
  
            return redirect(route('categorias.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('categorias.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
