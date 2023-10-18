@extends('contracts.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Información del contrato
                </div>
                <div class="float-end">
                    <a href="{{ route('contracts.index') }}" class="btn btn-primary btn-sm">&larr; Atrás</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Código:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contract->code }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contract->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Cantidad:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contract->quantity }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Precio:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contract->price }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Descripcion:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $contract->description }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection