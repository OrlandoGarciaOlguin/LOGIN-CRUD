@extends('layouts/template')

@section('tittle','Editar animales')

@section('contenido')

<main>
    <div class="container py-4">
    <h2>Editar animal</h2>


    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">  
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>      
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

<form action="{{url('animal/'.$animal->id)}}" method="post">
    @method("PUT")
    @csrf
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$animal->nombre}}" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">Latin</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="latin" id="latin" value="{{$animal->latin}}" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">Descripcion</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$animal->descripcion}}" required>
        </div>
    </div>

    <div class="mb-3 row">
    <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
    <div class="col-sm-5">
        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
    </div>

    <div class="mb-3 row">
        <label for="habitat" class="col-sm-2 col-form-label">Especie</label>
        <div class="col-sm-5">
            <select name="especie" id="especie" class="form-select" required>
                <option value ="">Selecciona una especie</option>
                @foreach ($especie as $especies)
                <option value="{{$especies->id}}" @if ($especies->id == $animal->especie_id){{'selected'}} @endif>{{$especies->tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="habitat" class="col-sm-2 col-form-label">Habitat</label>
        <div class="col-sm-5">
            <select name="habitat" id="habitat" class="form-select" required>
                <option value ="">Selecciona un habitat</option>
                @foreach ($habitat as $habitats)
                <option value="{{$habitats->id}}"@if ($habitats->id == $animal->habitat_id){{'selected'}} @endif>{{$habitats->tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <a href="{{url('animal')}}" class="btn btn-secondary">Regresar</a>

    <button type="submit" class="btn btn-success">Guardar</button>

    </form>
    </div>
</main>