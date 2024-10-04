@extends('layouts.app')

@section('title', 'Resultados')

@section('content')
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('resultados.index') }}">
          Resultados
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ __('Show') }}
      </li>
    </ol>
  </nav>
</div>

<x-card title="Raça">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      {{ __('Name') . ' : ' . $resultado->nome }}
    </li>
    <li class="list-group-item">
      {{ 'Descrição' . ' : ' . $resultado->descricao }}
    </li>
  </ul>
</x-card>

@can('resultado-delete')
<x-btn-trash />
@endcan

<x-btn-back route="resultados.index" />

@can('resultado-delete')
<x-modal-trash class="modal-sm">
  <form method="post" action="{{route('resultados.destroy', $resultado->id)}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
      <x-icon icon='trash' /> {{ __('Delete this record?') }}
    </button>
  </form>
</x-modal-trash>
@endcan

@endsection
