@extends('layouts.app')

@section('title', 'Portes')

@section('content')
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('portes.index') }}">
          Portes
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
      {{ __('Name') . ' : ' . $porte->nome }}
    </li>
  </ul>
</x-card>

@can('porte-delete')
<x-btn-trash />
@endcan

<x-btn-back route="portes.index" />

@can('porte-delete')
<x-modal-trash class="modal-sm">
  <form method="post" action="{{route('portes.destroy', $porte->id)}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
      <x-icon icon='trash' /> {{ __('Delete this record?') }}
    </button>
  </form>
</x-modal-trash>
@endcan

@endsection
