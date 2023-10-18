@extends('employees.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                     Añadir un contrato nuevo
                </div>
                <div class="float-end">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">&larr; Atrás</a>
                </div>
            </div>
            
            <div class="card-body">
                <form action="{{ route('contracts.contractsBtwDates') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="begin" class="col-md-4 col-form-label text-md-end text-start">Fecha inicio</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('begin') is-invalid @enderror" id="begin" name="begin" value="{{ old('begin') }}">
                            @if ($errors->has('begin'))
                                <span class="text-danger">{{ $errors->first('begin') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <label for="end" class="col-md-4 col-form-label text-md-end text-start">Fecha fin</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('end') is-invalid @enderror" id="end" name="end" value="{{ old('end') }}">
                            @if ($errors->has('end'))
                                <span class="text-danger">{{ $errors->first('end') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Buscar">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection