<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Perpage;
use App\Models\Log;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Rules\Cpf;

# use Barryvdh\DomPDF\Facade\Pdf; // Export PDF
# use App\Exports\TutorsExport;
# use Maatwebsite\Excel\Facades\Excel; // Export Excel

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $this->authorize('tutor-index');

        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        return view('tutors.index', [
            'tutors' => Tutor::orderBy('nome', 'asc')->filter(request(['nome','id']))->paginate(session('perPage', '5'))->appends(request(['nome', 'id'])),
            'perpages' => Perpage::orderBy('valor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $this->authorize('tutor-create');

        return view('tutors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->authorize('tutor-create');

        $tutor = $request->validate([
            'cpf' => ['required', 'max:15', new Cpf],
            'nome' => 'required|max:80',
            'nascimento' => 'required|date_format:d/m/Y',
            'logradouro' => 'required|max:100',
            'complemento' => 'max:100', // 'complemento is nullable
            'numero' => 'required|max:10',
            'bairro' => 'required|max:80',
            'cidade' => 'required|max:80',
            'uf' => 'required|max:2',
            'cep' => 'required|max:20',
            'email' => 'required|max:190|email',
            'cel' => 'required|max:20',
            'tel' => 'max:20',
            'cns' => 'max:20'
        ]);

        $tutor['nascimento'] = date('Y-m-d', strtotime(str_replace('/', '-', $request->nascimento)));
  
        $new_tutor = Tutor::create($tutor);

        // LOG
        Log::create([
            'model_id' => $new_tutor->id,
            'model' => 'Tutor',
            'action' => 'store',
            'changes' => json_encode($new_tutor),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('tutors.index'))->with('message', 'Tutor registrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Tutor $tutor) : View
    {
        $this->authorize('tutor-show');

        return view('tutors.show', [
          'tutor' => $tutor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor) : View
    {
        $this->authorize('tutor-edit');

        return view('tutors.edit', [
          'tutor' => $tutor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutor $tutor) : RedirectResponse
    {
        $this->authorize('tutor-edit');

        $input = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
          ]);
  
        $tutor->update($input);

        // LOG
        Log::create([
            'model_id' => $tutor->id,
            'model' => 'Tutor',
            'action' => 'update',
            'changes' => json_encode($tutor->getChanges()),
            'user_id' => auth()->id(),            
        ]);

        return redirect(route('tutors.index'))->with('message', __('Tutor updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor) : RedirectResponse
    {
        $this->authorize('tutor-delete');

        // LOG
        Log::create([
            'model_id' => $tutor->id,
            'model' => 'Tutor',
            'action' => 'destroy',
            'changes' => json_encode($tutor),
            'user_id' => auth()->id(),            
        ]);

        $tutor->roles()->detach();

        $tutor->delete();

        return redirect(route('tutors.index'))->with('message', __('Tutor deleted successfully!'));       
    }
}
