<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Muestra una lista de libros.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Muestra el formulario para crear un nuevo libro.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Almacena un libro recién creado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|integer',
            // Agrega aquí las validaciones para otros campos si es necesario
        ]);

        // Crea un nuevo libro con los datos del formulario
        Libro::create($request->all());

        // Redirige a la lista de libros con un mensaje de éxito
        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    /**
     * Muestra el libro especificado.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Muestra el formulario para editar el libro especificado.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    /**
     * Actualiza el libro especificado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        // Valida los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|integer',
            // Agrega aquí las validaciones para otros campos si es necesario
        ]);

        // Actualiza el libro con los datos del formulario
        $libro->update($request->all());

        // Redirige al libro editado con un mensaje de éxito
        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Elimina el libro especificado de la base de datos.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        // Elimina el libro
        $libro->delete();

        // Redirige a la lista de libros con un mensaje de éxito
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
