<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Periodo Académico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
        }
        .card {
            margin-top: 50px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .btn-primario {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
        }
        .btn-primario:hover {
            background-color: #0056b3;
        }
        .btn-secundario {
            background-color: #6c757d;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
        }
        .btn-secundario:hover {
            background-color: #5a6268;
        }
        .form-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Crear periodo academico </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('periodos.store') }}" method="POST" class="formulario">
                @csrf
                <div class="form-group">
                    <label for="año">Año:</label>
                    <input type="number" name="año" id="año" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="periodo">Periodo:</label>
                    <select name="periodo" id="periodo" class="form-control" required>
                        <option value="SEMESTRE-1" {{ old('periodo') == 'SEMESTRE-1' ? 'selected' : '' }}>SEMESTRE-1</option>
                        <option value="SEMESTRE-2" {{ old('periodo') == 'SEMESTRE-2' ? 'selected' : '' }}>SEMESTRE-2</option>
                        <option value="TRIMESTRE-1" {{ old('periodo') == 'TRIMESTRE-1' ? 'selected' : '' }}>TRIMESTRE-1</option>
                        <option value="TRIMESTRE-2" {{ old('periodo') == 'TRIMESTRE-2' ? 'selected' : '' }}>TRIMESTRE-2</option>
                        <option value="TRIMESTRE-3" {{ old('periodo') == 'TRIMESTRE-3' ? 'selected' : '' }}>TRIMESTRE-3</option>
                        <option value="TRIMESTRE-4" {{ old('periodo') == 'TRIMESTRE-4' ? 'selected' : '' }}>TRIMESTRE-4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-primario">Guardar</button>
                    <a href="{{ route('periodos.index') }}" class="btn-secundario">Cancelar</a>
                </div>
            </form>
        </div> 
    </div> 
</div>        
</body>
</html>
