<form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if (isset($user))
        @method('PUT')
    @endif

    <div class="row">
        <!-- Nombre -->
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" name="email" id="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}"
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <!-- Roles -->
        <div class="col-md-6 mb-3">
            <label for="roles" class="form-label">Roles</label>
            <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror" multiple
                required>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}"
                        {{ collect(old('roles', isset($user) ? $user->roles->pluck('id') : []))->contains($rol->id) ? 'selected' : '' }}>
                        {{ ucfirst($rol->name) }}
                    </option>
                @endforeach
            </select>
            @error('roles')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Estado -->
        <div class="col-md-6 mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" required>
                <option value="activo" {{ old('estado', $user->estado ?? '') == 'activo' ? 'selected' : '' }}>Activo
                </option>
                <option value="inactivo" {{ old('estado', $user->estado ?? '') == 'inactivo' ? 'selected' : '' }}>
                    Inactivo</option>
            </select>
            @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <!-- Password -->
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password"
                class="form-control @error('password') is-invalid @enderror" {{ isset($user) ? '' : 'required' }}>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if (isset($user))
                <small class="text-muted">Déjelo vacío si no desea cambiar la contraseña</small>
            @endif
        </div>

        <!-- Foto -->
        <div class="col-md-6 mb-3">
            <label for="foto" class="form-label">Foto de perfil</label>
            <input type="file" name="foto" id="foto"
                class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if (isset($user) && $user->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto usuario" class="img-thumbnail"
                        width="100">
                </div>
            @endif
        </div>
    </div>

    <!-- Botones -->
    <div class="d-flex justify-content-end mt-4">
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary me-2">Cancelar</a>
        <button type="submit" class="btn btn-primary">
            {{ isset($user) ? 'Actualizar Usuario' : 'Crear Usuario' }}
        </button>
    </div>
</form>
