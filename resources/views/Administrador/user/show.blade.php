@extends('adminlte::page')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="float-left">
                            <span class="card-title">Informacion de usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cliente') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <img src="{{ asset('imagenes/' . $user->imagen) }}" alt=" {{ $user->imagen }}"
                                height="400px" width="400px">
                        </div>

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $user->edad }}
                        </div>
                        <div class="form-group">
                            <strong>Dui:</strong>
                            {{ $user->dui }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $user->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $user->rol }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>

                    </div>
                    <a class="btn btn-sm btn-success" href="{{ route('user.edit', $user->id) }}"><i
                            class="fa fa-fw fa-edit"></i> </a>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    img {
        border-radius: 50%;
    }

</style>
