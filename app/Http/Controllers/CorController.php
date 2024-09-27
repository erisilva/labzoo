<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('cor-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('cors.index', [
            'cors' => Cor::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/cors'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('cor-create');

        return view('cors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('cor-create');

        $cor = $request->validate([
            'nome' => 'required|max:255',
          ]);
  
        $new_cor = Cor::create($cor);

        // LOG
        Log::create([
            'model_id' => $new_cor->id,
            'model' => 'Cor',
            'action' => 'store',
            'changes' => json_encode($new_cor),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('cors.index'))->with('message', 'Cor do animal criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cor $cor) : View
    {
        $this->authorize('cor-show');

        return view('cors.show', [
            'cor' => $cor
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cor $cor) : View
    {
        $this->authorize('cor-edit');

        return view('cors.edit', [
          'cor' => $cor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cor $cor) : RedirectResponse
    {
        $this->authorize('cor-edit');
  
        $cor->update($request->validate(['nome' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $cor->id,
            'model' => 'Cor',
            'action' => 'update',
            'changes' => json_encode($cor->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('cors.index'))->with('message', 'Cor do animal alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cor $cor)  : RedirectResponse
    {
        $this->authorize('cor-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $cor->id,
                'model' => 'Cor',
                'action' => 'destroy',
                'changes' => json_encode($cor),
                'user_id' => auth()->id(),            
            ]);
  
            $cor->delete();

            DB::commit();
  
            return redirect(route('cors.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('cors.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
