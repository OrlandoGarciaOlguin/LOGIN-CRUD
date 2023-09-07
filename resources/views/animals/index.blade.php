@extends('layouts/template')

@section('tittle','Animales')

@section('contenido')

<main>
    <div class="container py-4">
    <h2>Listado de animales</h2>

    <a href="{{url('animal/create')}}" class="btn btn-primary btn-sm">Nuevo Registro</a>
    <a href="{{url('animal/show')}}" class="btn btn-primary btn-sm">Show</a>
    <a href="{{url('animal/dashboard')}}" class="btn btn-primary btn-sm">Dashboard</a>
    
    <table class="table table-hover">

    <thead>

    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Latin</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Habitat</th>
        <th>Especie</th>
        <th></th>
        <th></th>
    </tr>

    </thead>

    <tbody>
        @foreach ($animal as $animals)

        <tr>
            <td>{{$animals->id}}</td>
            <td>{{$animals->nombre}}</td>
            <td>{{$animals->latin}}</td>
            <td>{{$animals->descripcion}}</td>
            <td>{{$animals->img}}</td>
            <td>{{$animals->habitat_id}}</td>
            <td>{{$animals->especie_id}}</td>
            <td><a href="{{url('animal/'.$animals->id. '/edit')}}" class="btn btn-warning btn-sm">Editar</a></td>
            <td>
                <form action="{{url('animal/'.$animals->id)}}" method="post">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

    </table>

    </div>
</main>