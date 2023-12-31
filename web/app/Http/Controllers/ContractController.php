<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Contract;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('contracts.index', [
            'contracts' => Contract::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request) : RedirectResponse
    {
        Contract::create($request->all());
        return redirect()->route('contracts.index')
                ->withSuccess('Nuevo contrato añadido satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract) : View
    {
        return view('contracts.show', [
            'contract' => $contract
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract) : View
    {
        return view('contracts.edit', [
            'contract' => $contract
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract) : RedirectResponse
    {
        $contract->update($request->all());
        return redirect()->back()
                ->withSuccess('El contrato ha sido actualizado satisfactoriamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract) : RedirectResponse
    {
        $contract->delete();
        return redirect()->route('contracts.index')
                ->withSuccess('El contrato ha sido eliminado satisfactoriamente.');
    }
}
