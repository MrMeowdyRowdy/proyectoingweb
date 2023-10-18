@extends('contracts.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                     Añadir un contrato nuevo
                </div>
                <div class="float-end">
                    <a href="{{ route('contracts.index') }}" class="btn btn-primary btn-sm">&larr; Atrás</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('contracts.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="employeeId" class="col-md-4 col-form-label text-md-end text-start">ID de empleado</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('employeeId') is-invalid @enderror" id="employeeId" name="employeeId" value="{{ old('employeeId') }}">
                            @if ($errors->has('employeeId'))
                                <span class="text-danger">{{ $errors->first('employeeId') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="creation" class="col-md-4 col-form-label text-md-end text-start">Fecha Creacion</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('creation') is-invalid @enderror" id="creation" name="creation" value="{{ old('creation') }}">
                            @if ($errors->has('creation'))
                                <span class="text-danger">{{ $errors->first('creation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Precio</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Añadir contrato">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection