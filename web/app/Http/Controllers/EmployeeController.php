<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Contract;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('employees.index', [
            'employees' => Employee::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employees.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        Employee::create($request->all());
        return redirect()->route('employees.index')
            ->withSuccess('Se ha añadido un nuevo empleado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee): View
    {
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): View
    {
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->all());
        return redirect()->back()
            ->withSuccess('El empleado ha sido actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employees.index')
            ->withSuccess('El empleado ha sido eliminado satisfactoriamente.');
    }

    public function contractsBtwDates(Request $request): View
    {
        $sumaContratos = 0;
        $contratosPorEmp = [];
        $contracts = Contract::with('employees')->whereHas('employees', function ($query) use( $request ) {
            $query->whereBetween('creation', [$request->begin, $request->end]);
        })->get();
        dd($contracts);
        foreach ($contracts as $contract) {
            $filteredObjects = array_filter($contratosPorEmp, function ($contratos) use ($contract) {
                return $contratos->idemp === $contract->employeeId;
            });
            if (empty($filteredObjects)) {
                $emptyObject = new \stdClass;
                $emptyObject->idemp = $contract->employeeId;
                $emptyObject->employeeName = $contract->Employee->name;
                $emptyObject->contPrice = $contract->price;
                array_push($contratosPorEmp, $emptyObject);
            }
            else
            {
                foreach ($contratosPorEmp as $contrato) {
                    if($contrato->idemp === $contract->employeeId){
                        $contrato->contPrice += $contract->price;
                        break;
                    }
                }
            }
            
        }

        return view('employees.contractsBtwDates', [
            'contratosPorEmp' => $contratosPorEmp
        ]);
        
        
    }

    public function searchbydate(): View
    {
        return view('employees.searchbydate');
    }
}
