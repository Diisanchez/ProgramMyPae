@extends('admin.Template')

@section('title')
    Editar Institución
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('institution.update', $institution)}}" method="POST">
                        @method('PUT')
                        @include('admin.institution.FormInstitution')
                        <br>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
