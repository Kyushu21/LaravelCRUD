<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($character->Nombre) ? $character->Nombre : old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
    <label for="Alias">Alias</label>
    <input type="text" class="form-control" name="Alias" value="{{ isset($character->Alias) ? $character->Alias : old('Alias') }}" id="Alias">
</div>

<div class="form-group">
    <label for="Edad">Edad</label>
    <input type="number" class="form-control" name="Edad" value="{{ isset($character->Edad) ? $character->Edad : old('Edad') }}" id="Edad">
</div>

<div class="form-group">
    <label for="Genero">Género</label>
    <input type="text" class="form-control" name="Genero" value="{{ isset($character->Genero) ? $character->Genero : old('Genero') }}" id="Genero">
</div>

<div class="form-group">
    <label for="Meta">Meta</label>
    <textarea class="form-control" name="Meta" id="Meta">{{ isset($character->Meta) ? $character->Meta : old('Meta') }}</textarea>
</div>

<div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($character->Foto))
        <img src="{{ asset('storage/' . $character->Foto) }}" alt="Foto del character" width="100">
    @endif
    <input type="file" class="form-control" name="Foto" id="Foto">
</div>

<input type="submit" class="btn btn-success" value="{{ $modo }} Character">
<a href="{{ url('/character') }}" class="btn btn-primary">Regresar</a>
