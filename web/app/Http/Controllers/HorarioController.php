<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('horarios.index', [
            'horarios' => Horario::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       return view('horarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHorarioRequest $request) : RedirectResponse
    {
        Horario::create($request->all());
        return redirect()->route('horarios.index')
            ->withSuccess('Se ha añadido un nuevo horario satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario): View
    {
        return view('horarios.show', [
            'horario' => $horario
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHorarioRequest $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
