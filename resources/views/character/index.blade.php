@extends('layouts.app')

@section('content')
<div class="container">

    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="{{ url('character/create') }}" class="btn btn-success">Registrar nuevo Character</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Alias</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Meta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($characters as $character)
            <tr>
                <td>{{ $character->id }}</td>
                <td>
                    @if($character->Foto)
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $character->Foto) }}" width="100" alt="">
                    @endif
                </td>
                <td><a href="{{ route('character.show', $character->id) }}">{{ $character->Nombre }}</a></td> <!-- Enlace al show -->
                <td>{{ $character->Alias }}</td>
                <td>{{ $character->Edad }}</td>
                <td>{{ $character->Genero }}</td>
                <td>{{ $character->Meta }}</td>
                <td>
                    <a href="{{ url('character/' . $character->id . '/edit') }}" class="btn btn-warning">Editar</a>
                    |
                    <form action="{{ url('character/' . $character->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $characters->links() !!}
</div>
@endsection
