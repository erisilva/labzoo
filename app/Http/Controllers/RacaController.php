<?php

namespace App\Http\Controllers;

use App\Models\Raca;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RacaController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('raca-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('racas.index', [
            'racas' => Raca::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/racas'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('raca-create');

        return view('racas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('raca-create');

        $Raca = $request->validate([
            'nome' => 'required|max:255',
          ]);
  
        $new_raca = Raca::create($Raca);

        // LOG
        Log::create([
            'model_id' => $new_raca->id,
            'model' => 'Raca',
            'action' => 'store',
            'changes' => json_encode($new_raca),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('racas.index'))->with('message', 'Vínculo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Raca $raca) : View
    {
        $this->authorize('raca-show');

        return view('racas.show', [
            'raca' => $raca
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Raca $raca) : View
    {
        $this->authorize('raca-edit');

        return view('racas.edit', [
          'raca' => $raca
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Raca $raca) : RedirectResponse
    {
        $this->authorize('raca-edit');
  
        $raca->update($request->validate(['nome' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $raca->id,
            'model' => 'Raca',
            'action' => 'update',
            'changes' => json_encode($raca->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('racas.index'))->with('message', 'Vínculo alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Raca $raca)  : RedirectResponse
    {
        $this->authorize('raca-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $raca->id,
                'model' => 'Raca',
                'action' => 'destroy',
                'changes' => json_encode($raca),
                'user_id' => auth()->id(),            
            ]);
  
            $raca->delete();

            DB::commit();
  
            return redirect(route('racas.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('racas.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
