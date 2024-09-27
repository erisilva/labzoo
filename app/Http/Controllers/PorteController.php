<?php

namespace App\Http\Controllers;

use App\Models\Porte;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PorteController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('porte-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('portes.index', [
            'portes' => Porte::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/portes'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('porte-create');

        return view('portes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('porte-create');

        $porte = $request->validate([
            'nome' => 'required|max:255',
          ]);
  
        $new_porte = Porte::create($porte);

        // LOG
        Log::create([
            'model_id' => $new_porte->id,
            'model' => 'Porte',
            'action' => 'store',
            'changes' => json_encode($new_porte),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('portes.index'))->with('message', 'Porte criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Porte $porte) : View
    {
        $this->authorize('porte-show');

        return view('portes.show', [
            'porte' => $porte
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Porte $porte) : View
    {
        $this->authorize('porte-edit');

        return view('portes.edit', [
          'porte' => $porte
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Porte $porte) : RedirectResponse
    {
        $this->authorize('porte-edit');
  
        $porte->update($request->validate(['nome' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $porte->id,
            'model' => 'Porte',
            'action' => 'update',
            'changes' => json_encode($porte->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('portes.index'))->with('message', 'Porte alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Porte $porte)  : RedirectResponse
    {
        $this->authorize('porte-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $porte->id,
                'model' => 'Porte',
                'action' => 'destroy',
                'changes' => json_encode($porte),
                'user_id' => auth()->id(),            
            ]);
  
            $porte->delete();

            DB::commit();
  
            return redirect(route('portes.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('portes.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
