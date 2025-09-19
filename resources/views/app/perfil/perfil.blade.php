@extends('layouts.app')
@section('title','Perfil')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header text-white text-center position-relative" style="background-color: #FFD43B;">
            <h3 class="mb-0">Mi Perfil</h3>


        </div>

        <div class="card-body text-center">

            {{-- Foto --}}
            <div class="mb-4 position-relative d-inline-block">
                @if($user->foto)
                    <img src="{{ asset('storage/' . $user->foto) }}"
                         class="rounded-circle shadow"
                         alt="Foto Usuario"
                         style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <i class="fa-solid fa-user-circle fa-9x text-secondary"></i>
                @endif

                {{-- Burbujita de estado --}}
                @if($user->estado == 'activo')
                    <span class="position-absolute bottom-0 end-0 translate-middle p-2 bg-success border border-light rounded-circle"
                          title="Activo"></span>
                @else
                    <span class="position-absolute bottom-0 end-0 translate-middle p-2 bg-danger border border-light rounded-circle"
                          title="Inactivo"></span>
                @endif
            </div>

            {{-- Roles --}}
            <div class="mb-4">
                <h5 class="fw-bold">Mis Roles</h5>
                @if($user->roles->count() > 0)
                    @foreach($user->roles as $role)
                        <span class="badge rounded-pill text-dark" style="background-color: #FFD43B; margin: 2px;">
                            {{ ucfirst($role->name) }}
                        </span>
                    @endforeach
                @else
                    <p class="text-muted">No tienes roles asignados</p>
                @endif
            </div>

            {{-- Formulario --}}
            <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data" class="text-start">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" value="{{ $user->email }}"
                           class="form-control" disabled>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn text-white px-4" style="background-color: #FFD43B;">
                        <i class="fa-solid fa-save me-2"></i> Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

