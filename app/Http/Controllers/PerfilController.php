<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    // Mostrar perfil
    public function index()
    {
        $user = Auth::user();
        return view('app.perfil.perfil', compact('user'));
    }

    // Actualizar perfil (opcional, solo si permites editar)
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;

      if ($request->hasFile('foto')) {
    // Borrar la foto anterior si existe
    if ($user->foto && \Storage::disk('public')->exists($user->foto)) {
        \Storage::disk('public')->delete($user->foto);
    }

    // Subir nueva
    $path = $request->file('foto')->store('fotos', 'public');
    $user->foto = $path;
}
        $user->save();

        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente');
    }
}
