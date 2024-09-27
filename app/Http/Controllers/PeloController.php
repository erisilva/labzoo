<?php

namespace App\Http\Controllers;

use App\Models\Pelo;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PeloController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('pelo-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('pelos.index', [
            'pelos' => Pelo::orderBy('nome', 'asc')->paginate(session('perPage', '5'))->withPath(env('APP_URL', null) .  '/pelos'),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('pelo-create');

        return view('pelos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('pelo-create');

        $Pelo = $request->validate([
            'nome' => 'required|max:255',
          ]);
  
        $new_pelo = Pelo::create($Pelo);

        // LOG
        Log::create([
            'model_id' => $new_pelo->id,
            'model' => 'Pelo',
            'action' => 'store',
            'changes' => json_encode($new_pelo),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('pelos.index'))->with('message', 'Tipo de pelagem criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelo $pelo) : View
    {
        $this->authorize('pelo-show');

        return view('pelos.show', [
            'pelo' => $pelo
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelo $pelo) : View
    {
        $this->authorize('pelo-edit');

        return view('pelos.edit', [
          'pelo' => $pelo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelo $pelo) : RedirectResponse
    {
        $this->authorize('pelo-edit');
  
        $pelo->update($request->validate(['nome' => 'required|max:255']));

        // LOG
        Log::create([
            'model_id' => $pelo->id,
            'model' => 'Pelo',
            'action' => 'update',
            'changes' => json_encode($pelo->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('pelos.index'))->with('message', 'Tipo de pelagem alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelo $pelo)  : RedirectResponse
    {
        $this->authorize('pelo-delete');
     
        DB::beginTransaction();   
        try {

            // LOG
            Log::create([
                'model_id' => $pelo->id,
                'model' => 'Pelo',
                'action' => 'destroy',
                'changes' => json_encode($pelo),
                'user_id' => auth()->id(),            
            ]);
  
            $pelo->delete();

            DB::commit();
  
            return redirect(route('pelos.index'))->with('message', 'Registro excluído com sucesso!');
  
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('pelos.index')->with('message', 'Erro ao excluir : <br> ' . $e->getMessage());
        }
 
    }
}
