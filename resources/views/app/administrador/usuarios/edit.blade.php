@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('contenido')
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4>Editar Usuario</h4>
        </div>
        <div class="card-body">
            @include('app.administrador.usuarios.form', ['user' => $user])
        </div>
    </div>
@endsection
