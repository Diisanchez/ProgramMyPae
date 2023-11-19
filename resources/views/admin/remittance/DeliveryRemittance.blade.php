@extends('admin.Template')

@section('title')
    Entrega Remesa
@endsection

@section('content')
<div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card body">
                    <form action="{{ route('delivery', $remittance) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.remittance.FormDeliveryRemittance')
                        <br>
                        <div class=" justify-content-center">
                            <br>
                            <div style="display: flex; justify-content: center;">
                                <a href="{{ route('remittance.index') }}" class="btn btn-primary">Registrar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
