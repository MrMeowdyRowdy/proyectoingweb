@extends('employees.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Total de precio de contratos por fechas por empleado
                </div>
                <div class="float-end">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Atrás</a>
                </div>

            </div>
            <div class="card-body">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contratosPorEmp as $contrato)
                        <tr>
                            <td>{{ $contrato->idemp }}</td>
                            <td>{{ $contrato->employeeName }}</td>
                            <td>{{ $contrato->contPrice }}</td>
                        </tr>
                        @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>No se ha encontrado contratos o empleados registrados</strong>
                            </span>
                        </td>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection