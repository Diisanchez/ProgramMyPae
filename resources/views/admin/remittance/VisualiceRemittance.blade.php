@extends('admin.Template')

@section('title')
    Visualizar Remesa
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card body">
                    <form action="{{ route('remittance.show', $remittance->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.remittance.viewRemitance')
                        <br>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('remittance.index') }}" class="btn btn-primary">Atras</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
