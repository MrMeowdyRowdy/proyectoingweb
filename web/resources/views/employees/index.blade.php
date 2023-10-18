@extends('employees.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Lista de empleados</div>
            <div class="card-body">
                <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Añadir un nuevo empleado</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Mostrar</a>

                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Deseas eliminar este empleado?');"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No se ha encontrado empleados</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $employees->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection