<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class Catalogo extends Controller
{
    public function inicio(){
        return view("pages.inicio",["titulo"=>"Inicio"]);
    }
    public function listado() {
        $consulta = Catalog::all();
        return view("pages.listado", [
            "titulo" => "Listado_peliculas",
            "datos" => $consulta
        ]);
    }
   public function agregar(){
        return view('pages.agregar', ['titulo' => 'Agregar nueva película']);
    } 
    public function editar(Request $request) {
        $consulta = Catalog::where("id",$request->id)->first();
        return view("pages.editar", [
            "titulo" => "Editar",
            "pelicula" => $consulta
        ]);
    }
    public function actualizar(Request $request, Catalog $pelicula) {
        $pelicula->titulo=$request->titulo;
        $pelicula->descripcion=$request->descripcion;
        $pelicula->director=$request->director;
        $pelicula->genero=$request->genero;
        $pelicula->fecha_estreno=$request->fecha_estreno;
        $pelicula->save();

        return redirect()->route('list');
    }
    public function insertar_pelicula(Request $request){
        $pelicula = new Catalog();
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->director = $request->director;
        $pelicula->genero = $request->genero;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();

        return redirect()->route('list');
    }
    public function eliminar_pelicula($id) {
        Catalog::destroy($id);
        return redirect()->route('list')->with('success', 'Película eliminada correctamente');
    }
    
}