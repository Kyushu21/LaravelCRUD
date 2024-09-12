@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{ $character->Nombre }} ({{ $character->Alias }})</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($character->Foto)
                        <img src="{{ asset('storage/' . $character->Foto) }}" alt="{{ $character->Nombre }}" class="img-fluid">
                    @else
                        <img src="https://via.placeholder.com/150" alt="{{ $character->Nombre }}" class="img-fluid">
                    @endif
                </div>
                <div class="col-md-8">
                    <p><strong>Alias:</strong> {{ $character->Alias }}</p>
                    <p><strong>Edad:</strong> {{ $character->Edad }}</p>
                    <p><strong>Género:</strong> {{ $character->Genero }}</p>
                    <p><strong>Meta:</strong> {{ $character->Meta }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ url('/character') }}" class="btn btn-primary">Regresar</a>
            <a href="{{ url('character/' . $character->id . '/edit') }}" class="btn btn-warning">Editar</a>
            <form action="{{ url('character/' . $character->id) }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">Borrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
