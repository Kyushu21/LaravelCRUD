@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ url('/character/'.$character->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('character.form', ['modo' => 'Editar'])
    </form>

</div>
@endsection
