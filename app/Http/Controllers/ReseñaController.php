<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseña;

class ReseñaController extends Controller
{
    /**
     * Muestra una lista de reseñas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseñas = Reseña::all();
        return view('reseñas.index', compact('reseñas'));
    }

    /**
     * Muestra el formulario para crear una nueva reseña.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reseñas.create');
    }

    /**
     * Almacena una reseña recién creada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'comentario' => 'required|string',
            // Agrega aquí las validaciones para otros campos si es necesario
        ]);

        // Crea una nueva reseña con los datos del formulario
        Reseña::create($request->all());

        // Redirige a la lista de reseñas con un mensaje de éxito
        return redirect()->route('reseñas.index')->with('success', 'Reseña creada correctamente.');
    }

    /**
     * Muestra la reseña especificada.
     *
     * @param  \App\Models\Reseña  $reseña
     * @return \Illuminate\Http\Response
     */
    public function show(Reseña $reseña)
    {
        return view('reseñas.show', compact('reseña'));
    }

    /**
     * Muestra el formulario para editar la reseña especificada.
     *
     * @param  \App\Models\Reseña  $reseña
     * @return \Illuminate\Http\Response
     */
    public function edit(Reseña $reseña)
    {
        return view('reseñas.edit', compact('reseña'));
    }

    /**
     * Actualiza la reseña especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reseña  $reseña
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reseña $reseña)
    {
        // Valida los datos del formulario
        $request->validate([
            'comentario' => 'required|string',
            // Agrega aquí las validaciones para otros campos si es necesario
        ]);

        // Actualiza la reseña con los datos del formulario
        $reseña->update($request->all());

        // Redirige a la reseña editada con un mensaje de éxito
        return redirect()->route('reseñas.index')->with('success', 'Reseña actualizada correctamente.');
    }

    /**
     * Elimina la reseña especificada de la base de datos.
     *
     * @param  \App\Models\Reseña  $reseña
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseña $reseña)
    {
        // Elimina la reseña
        $reseña->delete();

        // Redirige a la lista de reseñas con un mensaje de éxito
        return redirect()->route('reseñas.index')->with('success', 'Reseña eliminada correctamente.');
    }
}

