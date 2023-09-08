@extends('layouts/template')

@section('tittle','Animales herbivoros y carnivoros')

@section('contenido')

<main>
    <div class="container py-4">
    <h2>Listado de Carnivoros e Herbivoros</h2>   
    
    <!-- <form method="GET" action=" # ">
        <label for="tipoEspecie">Seleccione el tipo de especie:</label>
        <select name="tipoEspecie" id="tipoEspecie">
            <option value="carnivoros" @if ($tipoEspecie = 'carnivoros') selected @endif>Carnívoros</option>
            <option value="herbivoros" @if ($tipoEspecie = 'herbivoros') selected @endif>Herbívoros</option>
        </select>
        <button type="submit">Filtrar</button>
    </form> -->
    
    <table border="1">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Latin</th>
            <!-- <th>Descripcion</th>
            <th>Imagen</th>
            <th>Habitat</th> -->
            <th>Especie</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach ($carnivoros as $carnivoro)
                <tr>
                    <td>{{$carnivoro->id}}</td>
                    <td>{{$carnivoro->nombre}}</td>
                    <td>{{$carnivoro->latin}}</td>                    
                    <td>{{$carnivoro->especie_id}}</td>
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
            <!-- <th>Descripcion</th>
            <th>Imagen</th>
            <th>Habitat</th> -->
            <th>Especie</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach ($herbivoros as $herbivoro)
                <tr>
                    <td>{{$herbivoro->id}}</td>
                    <td>{{$herbivoro->nombre}}</td>
                    <td>{{$herbivoro->latin}}</td>                    
                    <td>{{$herbivoro->especie_id}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>






