@extends('contracts.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Lista de contratos</div>
            <div class="card-body">
                <a href="{{ route('contracts.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Añadir un nuevo contrato</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Id Empleado</th>
                        <th scope="col">Fecha Creación</th>
                        <th scope="col">Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($contracts as $contract)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $contract->employeeId }}</td>
                            <td>{{ $contract->creation }}</td>
                            <td>{{ $contract->price }}</td>
                            <td>
                                <form action="{{ route('contracts.destroy', $contract->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Mostrar</a>

                                    <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Deseas eliminar este contrato?');"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No se ha encontrado contratos</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $contracts->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection