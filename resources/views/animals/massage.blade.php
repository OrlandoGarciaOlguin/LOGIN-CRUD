@extends('layouts/template')

@section('tittle','Registrar animales')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>{{$msg}}</h2>

        <a href="{{url('animal')}}" class="btn btn-secondary">Regresar</a>
    </div>
</main>