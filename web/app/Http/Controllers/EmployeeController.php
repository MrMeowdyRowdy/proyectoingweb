<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request) : RedirectResponse
    {
        Employee::create($request->all());
        return redirect()->route('employees.index')
                ->withSuccess('Se ha añadido un nuevo empleado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee) : View
    {
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee) : View
    {
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee) : RedirectResponse
    {
        $employee->update($request->all());
        return redirect()->back()
                ->withSuccess('El empleado ha sido actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee) : RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employees.index')
                ->withSuccess('El empleado ha sido eliminaod satisfactoriamente.');
    }
}
