@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('contenido')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Nuevo Usuario</h4>
        </div>
        <div class="card-body">
            @include('app.administrador.usuarios.form')
        </div>
    </div>
@endsection
