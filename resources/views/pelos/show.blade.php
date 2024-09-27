@extends('layouts.app')

@section('title', 'Tipos de Pelagem')

@section('content')
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('pelos.index') }}">
          Tipos de Pelagem
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
      {{ __('Name') . ' : ' . $pelo->nome }}
    </li>
  </ul>
</x-card>

@can('pelo-delete')
<x-btn-trash />
@endcan

<x-btn-back route="pelos.index" />

@can('pelo-delete')
<x-modal-trash class="modal-sm">
  <form method="post" action="{{route('pelos.destroy', $pelo->id)}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
      <x-icon icon='trash' /> {{ __('Delete this record?') }}
    </button>
  </form>
</x-modal-trash>
@endcan

@endsection
