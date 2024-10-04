@extends('layouts.app')

@section('title', 'Resultados')

@section('content')
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">
        <a href="{{ route('resultados.index') }}">
          Resultados
        </a>
      </li>
    </ol>
  </nav>

  <x-flash-message status='success'  message='message' />

  <x-btn-group label='MenuPrincipal' class="py-1">

    @can('permission-create')
    <a class="btn btn-primary" href="{{ route('resultados.create') }}" role="button"><x-icon icon='file-earmark'/> {{ __('New') }}</a>
    @endcan
     
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalFilter"><x-icon icon='funnel'/> {{ __('Filters') }}</button>

  </x-btn-group>
  
  <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultados as $resultado)
            <tr>
                <td class="text-nowrap">
                  {{$resultado->nome}}
                </td>
                <td>
                  {{$resultado->descricao}}
                </td>
                <td>
                  <x-btn-group label='Opções'>

                    @can('resultado-edit')
                    <a href="{{route('resultados.edit', $resultado->id)}}" class="btn btn-primary btn-sm" role="button"><x-icon icon='pencil-square'/></a>
                    @endcan

                    @can('resultado-show')
                    <a href="{{route('resultados.show', $resultado->id)}}" class="btn btn-info btn-sm" role="button"><x-icon icon='eye'/></a>
                    @endcan

                  </x-btn-group>
                </td>
            </tr>    
            @endforeach                                                 
        </tbody>
    </table>
  </div>
  
  <x-pagination :query="$resultados" />

</div>

<x-modal-filter class="modal-lg" :perpages="$perpages" icon='funnel' title='Filters'></x-modal-filter>  

@endsection
@section('script-footer')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var perpage = document.getElementById('perpage');
    perpage.addEventListener('change', function() {
        perpage = this.options[this.selectedIndex].value;
        window.open("{{ route('resultados.index') }}" + "?perpage=" + perpage,"_self");
    });
});
</script>
@endsection