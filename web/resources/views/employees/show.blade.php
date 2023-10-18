@extends('employees.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Información del empleado
                </div>
                <div class="float-end">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Atrás</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Código:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->id }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->name }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection