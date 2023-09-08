@extends('layouts/template')

@section('tittle','Dashboard')

@section('contenido')

<main>
    <div class="container py-4">
    <h2>Dashboard</h2>

    <table border="1">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Latin</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Habitat</th>
            <th>Especie</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach ($ultimosAnimales as $ultimos)
                <tr>
                    <td>{{$ultimos->id}}</td>
                    <td>{{$ultimos->nombre}}</td>
                    <td>{{$ultimos->latin}}</td>                    
                    <td>{{$ultimos->descripcion}}</td>
                    <td>{{$ultimos->img}}</td>
                    <td>{{$ultimos->habitat_id}}</td>
                    <td>{{$ultimos->especie_id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Latin</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Habitat</th>
            <th>Especie</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach ($herbivoros as $herbivoro)
                <tr>
                    <td>{{$herbivoro->id}}</td>
                    <td>{{$herbivoro->nombre}}</td>
                    <td>{{$herbivoro->latin}}</td>
                    <td>{{$herbivoro->descripcion}}</td> 
                    <td>{{$herbivoro->imagen}}</td>  
                    <td>{{$herbivoro->habitat_id}}</td>                    
                    <td>{{$herbivoro->especie_id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
</main>