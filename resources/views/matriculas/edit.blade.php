<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
        }
        .card {
            margin-top: 50px;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Editar Matrícula</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('matriculas.update', $matricula->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $matricula->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $matricula->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Documento">Documento</label>
                        <input type="text" class="form-control" id="Documento" name="Documento" value="{{ old('Documento', $matricula->Documento) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $matricula->direccion) }}">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $matricula->telefono) }}">
                    </div>

                    <div class="form-group">
                        <label for="fecha_matricula">Fecha de Matrícula</label>
                        <input type="date" class="form-control" id="fecha_matricula" name="fecha_matricula" value="{{ old('fecha_matricula', $matricula->fecha_matricula) }}">
                    </div>

                    <div class="form-group">
    <label for="estado">Estado</label>
    <select class="form-control" id="estado" name="estado" required>
        <option value="">Seleccionar Estado</option>
        <option value="aprobado" {{ old('estado') == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
        <option value="desaprobado" {{ old('estado') == 'desaprobado' ? 'selected' : '' }}>Desaprobado</option>
        <option value="cancelado" {{ old('estado') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
        <option value="no aprobado" {{ old('estado') == 'no aprobado' ? 'selected' : '' }}>No aprobado</option>
    </select>
</div>


                    <div class="form-group">
                        <label for="nota_final">Nota Final</label>
                        <input type="number" step="0.01" class="form-control" id="nota_final" name="nota_final" value="{{ old('nota_final', $matricula->nota_final) }}">
                    </div>

                    <div class="form-group">
                        <label for="grupo_id">Curso</label>
                        <select class="form-control" id="grupo_id" name="grupo_id" required>
                            <option value="">Seleccionar Curso</option>
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" {{ old('grupo_id', $matricula->grupo_id) == $curso->id ? 'selected' : '' }}>
                                    {{ $curso->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teacher_id">Profesor</label>
                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                            <option value="">Seleccionar Profesor</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id', $matricula->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Actualizar Matrícula</button>
                    <a href="{{ route('matriculas.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
