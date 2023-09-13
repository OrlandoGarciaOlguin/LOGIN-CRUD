<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Habitat;
use App\Models\Especie;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithFileType;
use App\Exports\AnimalsExport;
use App\Imports\AnimalsImport;


class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animal = animal::all();
        //return view('animals.index', compact('animal'));
        return view('animals.index', compact('animal'), ['animals.index' => animal::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $especie=especie::all();
        $habitat = habitat::all();
        
        return view('animals.create',compact('especie','habitat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:animals|max:15',
            'latin' => 'required|max:20',
            'descripcion' => 'required|max:50',
            'img' => 'nullable|img',
            'especie' => 'required',
            'habitat' => 'required',
            'updated_at' => 'nullable|updated_at',
            'created_at' => 'nullable|created_at',            
            //required|image|mimes:jpeg,png,jpg,gif|max:2048
        ]);

        $animal = new Animal();
        $animal->nombre = $request->input('nombre');
        $animal->latin = $request->input('latin');
        $animal->descripcion = $request->input('descripcion');
        $animal->img = $request->input('img');
        $animal->especie_id = $request->input('especie');
        $animal->habitat_id = $request->input('habitat');        
        $animal->save();

        return view("animals.massage",['msg' => "Registro guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $carnivoros = Animal::where('especie_id', $especie_id)
        // ->where('especie_id', '1')
        // ->get();

        // $herbivoros = Animal::where('especie_id', $especie_id)
        // ->where('especie_id', '2')
        // ->get();

        // $animalesCarnivoros = Animal::whereHas('especie', function ($query) use ($especie_id) {
        //     $query->where('id', $especie_id)
        //           ->where('tipo', 'carnívoro');
        // })->get();

        //return view ("animals.show", compact('animalesCarnivoros')); 
        //return view ("animals.show");

        //$animals = Animal::with('especie')->where('especie_id', '1')->select('nombre', 'latin', 'especie_id')->get();

             $carnivoros = Animal::where('especie_id', 1) 
            ->orderBy('nombre', 'asc')
            ->get();
            
            $herbivoros = Animal::where('especie_id', 2) 
            ->orderBy('nombre', 'asc')
            ->get(); 

            $animal = Animal::find($id);

        return view('animals.show', compact('carnivoros','herbivoros','animal'));
        //echo json_encode($animal);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {        
        $animal = Animal::find($id);
        return view('animals.edit', ['animal' => $animal, 'especie' => especie::all(), 'habitat' => habitat::all()]);
        //return view('animals.edit', compact('especie','habitat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:15|unique:animals,nombre,' . $id,
            'latin' => 'required|max:20',
            'descripcion' => 'required|max:50',
            'img' => 'nullable|img',
            'especie' => 'required',
            'habitat' => 'required',
            'updated_at' => 'nullable|updated_at',
            'created_at' => 'nullable|created_at',            
            //required|image|mimes:jpeg,png,jpg,gif|max:2048
        ]);

        $animal = Animal::find($id);
        $animal->nombre = $request->input('nombre');
        $animal->latin = $request->input('latin');
        $animal->descripcion = $request->input('descripcion');
        $animal->img = $request->input('img');
        $animal->especie_id = $request->input('especie');
        $animal->habitat_id = $request->input('habitat');        
        $animal->save();

        return view("animals.massage",['msg' => "Registro modificado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {       

        $animal = Animal::find($animal->id);
        $animal->delete();

        return redirect("animal");
    }

     /**
     * Muestra los carnivoros e hervivoros
     */

    public function dashboard(Animal $ultimosAnimales)
    {
        $ultimosAnimales = Animal::latest()->take(5)->get();
        
        $ultimosAnimales = Animal::
        orderBy('nombre', 'desc')
        ->take(5)
        ->get(); 

        $herbivoros = Animal::where('especie_id', 2) 
            ->orderBy('nombre', 'asc')
            ->get();

        //return ($ultimosAnimales);

        return view("animals.dashboard", compact('ultimosAnimales','herbivoros')); 
        
    }

    public function collection()
    {
       return Excel::download(new AnimalsExport, 'animals.xlsx');        
    }

    public function importar(){        

        // try {
        //     // Especifica la clase de importación y el archivo Excel que deseas importar
        //     Excel::import(new AnimalsImport, 'prueba.xlsx');
    
        //     // Procesa el archivo Excel utilizando la clase de importación personalizada
        //     return back()->with('success', 'Excel importado con éxito.');
        // } catch (\Exception $e) {
        //     // En caso de error, redirecciona de vuelta con un mensaje de error
        //     return back()->with('error', 'Error al importar el Excel: ' . $e->getMessage());
        // }

        //Excel::import(new AnimalsImport, $request->file('Prueba.xlsx')->store('temp'));
        Excel::import(new AnimalsImport, 'prueba.xlsx');
        //Excel::import(new AnimalsImport)->import('prueba.xlsx', null, \Maatwebsite\Excel\Excel::XLSX);
        // return redirect()->back();   
        
        //Excel::import(new AnimalsImport, 'Prueba.xlsx');

        return redirect('/')->with('success');
    
    }
}