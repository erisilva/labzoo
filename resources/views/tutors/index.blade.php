@extends('layouts.app')

@section('title', 'Tutores')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('tutors.index') }}">Tutores</a>
                </li>
            </ol>
        </nav>

        <x-flash-message status='success' message='message' />

        <x-btn-group label='MenuPrincipal' class="py-1">

            @can('tutor-create')
                <a class="btn btn-primary" href="{{ route('tutors.create') }}" role="button"><x-icon icon='file-earmark' />
                    {{ __('New') }}</a>
            @endcan

            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalFilter"><x-icon
                    icon='funnel' /> {{ __('Filters') }}</button>

            @can('tutor-export')
                <x-dropdown-menu title='Reports' icon='printer'>
                    <li>
                        <a class="dropdown-item" href="#"><x-icon icon='file-earmark-spreadsheet-fill' />
                            {{ __('Export') . ' XLS' }}</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"><x-icon icon='file-earmark-spreadsheet-fill' />
                            {{ __('Export') . ' CSV' }}</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"><x-icon icon='file-pdf-fill' /> {{ __('Export') . ' PDF' }}</a>
                    </li>
                </x-dropdown-menu>
            @endcan

        </x-btn-group>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-right">ID</th>
                        <th>{{ __('Name') }}</th>
                        <th>Nascimento</th>
                        <th>CPF</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutors as $tutor)
                        <tr>
                            <td class="text-nowrap text-right">
                                <strong>{{ $tutor->id }}</strong>
                            </td>

                            <td class="text-nowrap">
                                {{ $tutor->nome }}
                            </td>

                            <td class="text-nowrap">
                                {{ date('d/m/Y', strtotime($tutor->nascimento)) }}
                            </td>

                            <td class="text-nowrap">
                                {{ $tutor->cpf }}
                            </td>

                            <td>
                                <x-btn-group label='Opções'>

                                    @can('tutor-edit')
                                        <a href="{{ route('tutors.edit', $tutor->id) }}" class="btn btn-primary btn-sm"
                                            role="button"><x-icon icon='pencil-square' /></a>
                                    @endcan

                                    @can('tutor-show')
                                        <a href="{{ route('tutors.show', $tutor->id) }}" class="btn btn-info btn-sm"
                                            role="button"><x-icon icon='eye' /></a>
                                    @endcan

                                </x-btn-group>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-pagination :query="$tutors" />

    </div>

    <x-modal-filter class="modal-lg" :perpages="$perpages" icon='funnel' title='Filters'>

        <div class="container">
            <form method="GET" action="{{ route('tutors.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id"
                            value="{{ session()->get('tutor_id') }}">
                    </div>
                    <div class="col-md-9">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="{{ session()->get('tutor_nome') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-sm"><x-icon icon='search' />
                            {{ __('Search') }}</button>

                        {{-- Reset the Filter --}}
                        <a href="{{ route('tutors.index', ['id' => '', 'nome' => '']) }}"
                            class="btn btn-secondary btn-sm" role="button"><x-icon icon='stars' />
                            {{ __('Reset') }}</a>
                    </div>
                </div>
            </form>
        </div>




    </x-modal-filter>

@endsection
@section('script-footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var perpage = document.getElementById('perpage');
            perpage.addEventListener('change', function() {
                perpage = this.options[this.selectedIndex].value;
                window.open("{{ route('tutors.index') }}" + "?perpage=" + perpage, "_self");
            });
        });
    </script>
@endsection
