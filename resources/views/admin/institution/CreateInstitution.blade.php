@extends('admin.Template')

@section('title')
    Registrar datos de Institución
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('institution.store') }}" method="POST">
                        @include('admin.institution.FormInstitution')
                        <br>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit"> Registrar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
