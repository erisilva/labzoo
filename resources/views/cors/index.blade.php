@extends('layouts.app')

@section('title', 'Cores os Animais')

@section('content')
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">
        <a href="{{ route('cors.index') }}">
          Cores os Animais
        </a>
      </li>
    </ol>
  </nav>

  <x-flash-message status='success'  message='message' />

  <x-btn-group label='MenuPrincipal' class="py-1">

    @can('permission-create')
    <a class="btn btn-primary" href="{{ route('cors.create') }}" role="button"><x-icon icon='file-earmark'/> {{ __('New') }}</a>
    @endcan
     
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalFilter"><x-icon icon='funnel'/> {{ __('Filters') }}</button>

  </x-btn-group>
  
  <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cors as $cor)
            <tr>
                <td class="text-nowrap">
                  {{$cor->nome}}
                </td>
                <td>
                  <x-btn-group label='Opções'>

                    @can('cor-edit')
                    <a href="{{route('cors.edit', $cor->id)}}" class="btn btn-primary btn-sm" role="button"><x-icon icon='pencil-square'/></a>
                    @endcan

                    @can('cor-show')
                    <a href="{{route('cors.show', $cor->id)}}" class="btn btn-info btn-sm" role="button"><x-icon icon='eye'/></a>
                    @endcan

                  </x-btn-group>
                </td>
            </tr>    
            @endforeach                                                 
        </tbody>
    </table>
  </div>
  
  <x-pagination :query="$cors" />

</div>

<x-modal-filter class="modal-lg" :perpages="$perpages" icon='funnel' title='Filters'></x-modal-filter>  

@endsection
@section('script-footer')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var perpage = document.getElementById('perpage');
    perpage.addEventListener('change', function() {
        perpage = this.options[this.selectedIndex].value;
        window.open("{{ route('cors.index') }}" + "?perpage=" + perpage,"_self");
    });
});
</script>
@endsection