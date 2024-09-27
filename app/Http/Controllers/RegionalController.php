<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RegionalController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('regional-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('regionals.index', [
            'regionals' => Regional::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/regionals'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('regional-create');

        return view('regionals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('regional-create');

        $Regional = $request->validate([
            'nome' => 'required|max:255',
            'sigla' => 'required|max:255',

          ]);
  
        $new_regional = Regional::create($Regional);

        // LOG
        Log::create([
            'model_id' => $new_regional->id,
            'model' => 'Regional',
            'action' => 'store',
            'changes' => json_encode($new_regional),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('regionals.index'))->with('message', 'Regional criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regional $regional) : View
    {
        $this->authorize('regional-show');

        return view('regionals.show', [
            'regional' => $regional
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regional $regional) : View
    {
        $this->authorize('regional-edit');

        return view('regionals.edit', [
          'regional' => $regional
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regional $regional) : RedirectResponse
    {
        $this->authorize('regional-edit');
  
        $regional->update($request->validate(['nome' => 'required|max:255', 'sigla' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $regional->id,
            'model' => 'Regional',
            'action' => 'update',
            'changes' => json_encode($regional->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('regionals.index'))->with('message', 'Regional alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regional $regional)  : RedirectResponse
    {
        $this->authorize('regional-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $regional->id,
                'model' => 'Regional',
                'action' => 'destroy',
                'changes' => json_encode($regional),
                'user_id' => auth()->id(),            
            ]);
  
            $regional->delete();

            DB::commit();
  
            return redirect(route('regionals.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('regionals.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
