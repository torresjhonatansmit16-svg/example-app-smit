<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Estudiante::with('carrera:id,nombre,codigo')->orderBy('id')->get()
        );
    }

    public function show(int $id): JsonResponse
    {
        $estudiante = Estudiante::with('carrera:id,nombre,codigo')->find($id);

        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado.'], 404);
        }

        return response()->json($estudiante);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'carrera_id' => ['required', 'integer', 'exists:carreras,id'],
            'codigo' => ['required', 'string', 'max:30', 'unique:estudiantes,codigo'],
            'nombres' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150', 'unique:estudiantes,email'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
        ]);

        $estudiante = Estudiante::create($validated)->load('carrera:id,nombre,codigo');

        return response()->json($estudiante, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado.'], 404);
        }

        $validated = $request->validate([
            'carrera_id' => ['sometimes', 'required', 'integer', 'exists:carreras,id'],
            'codigo' => ['sometimes', 'required', 'string', 'max:30', Rule::unique('estudiantes', 'codigo')->ignore($estudiante->id)],
            'nombres' => ['sometimes', 'required', 'string', 'max:100'],
            'apellidos' => ['sometimes', 'required', 'string', 'max:150'],
            'email' => ['sometimes', 'required', 'email', 'max:150', Rule::unique('estudiantes', 'email')->ignore($estudiante->id)],
            'fecha_nacimiento' => ['sometimes', 'required', 'date', 'before:today'],
        ]);

        $estudiante->update($validated);

        return response()->json($estudiante->fresh()->load('carrera:id,nombre,codigo'));
    }

    public function destroy(int $id): JsonResponse
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado.'], 404);
        }

        $estudiante->delete();

        return response()->json(null, 204);
    }
}
