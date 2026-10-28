<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarreraController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Carrera::query()->withCount('estudiantes')->orderBy('id')->get());
    }

    public function show(int $id): JsonResponse
    {
        $carrera = Carrera::withCount('estudiantes')->find($id);

        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada.'], 404);
        }

        return response()->json($carrera);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'codigo' => ['required', 'string', 'max:30', 'unique:carreras,codigo'],
            'facultad' => ['required', 'string', 'max:150'],
            'duracion_semestres' => ['required', 'integer', 'between:6,14'],
        ]);

        $carrera = Carrera::create($validated);

        return response()->json($carrera, 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $carrera = Carrera::find($id);

        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada.'], 404);
        }

        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:100'],
            'codigo' => ['sometimes', 'required', 'string', 'max:30', Rule::unique('carreras', 'codigo')->ignore($carrera->id)],
            'facultad' => ['sometimes', 'required', 'string', 'max:150'],
            'duracion_semestres' => ['sometimes', 'required', 'integer', 'between:6,14'],
        ]);

        $carrera->update($validated);

        return response()->json($carrera->fresh());
    }

    public function destroy(int $id): JsonResponse
    {
        $carrera = Carrera::find($id);

        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada.'], 404);
        }

        if ($carrera->estudiantes()->exists()) {
            return response()->json([
                'message' => 'No se puede eliminar la carrera porque tiene estudiantes registrados.',
            ], 409);
        }

        $carrera->delete();

        return response()->json(null, 204);
    }

    public function estudiantes(int $id): JsonResponse
    {
        $carrera = Carrera::with('estudiantes')->find($id);

        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada.'], 404);
        }

        return response()->json($carrera);
    }
}
