<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Muestra una lista de autores.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    /**
     * Muestra el formulario para crear un nuevo autor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Almacena un autor recién creado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Agrega aquí las validaciones para otros campos si es necesario
        ]);

        // Crea un nuevo autor con los datos del formulario
        Autor::create($request->all());

        // Redirige a la lista de autores con un mensaje de éxito
        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    /**
     * Muestra el autor especificado.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        return view('autores.show', compact('autor'));
    }

    /**
     * Muestra el formulario para editar el autor especificado.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    /**
     * Actualiza el autor especificado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Agrega aquí las validaciones para otros campos si es necesario
        ]);

        // Actualiza el autor con los datos del formulario
        $autor->update($request->all());

        // Redirige al autor editado con un mensaje de éxito
        return redirect()->route('autores.index')->with('success', 'Autor actualizado correctamente.');
    }

    /**
     * Elimina el autor especificado de la base de datos.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        // Elimina el autor
        $autor->delete();

        // Redirige a la lista de autores con un mensaje de éxito
        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}

