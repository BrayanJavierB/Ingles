<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        /* Fondo y colores generales */
        body {
            font-family: 'Arial', sans-serif;
            background: url('/img/blanq.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        /* Contenedor principal */
        .content {
            flex: 1;
            padding: 20px 15px;
            margin-top: 20px;
        }

        /* Secciones (tarjetas) */
        .card {
            background-color: #ffffff;
            color: #495057;
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #28a745;
            color: #fff;
            text-align: center;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 20px;
        }

        .btn-link {
            color: #28a745;
            font-weight: bold;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        /* Estilo del footer */
        footer {
            background-color: #28a745;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }

        footer a {
            color: #ffc107;
            font-weight: bold;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .footer-link {
            margin-left: 10px;
        }

        /* Logo */
        .logo {
            text-align: center;
            margin: 20px 0;
        }

        .logo img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Logo -->
    <div class="logo">
        <img src="/img/utew.png" alt="Logo">
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Sección Cursos -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-book"></i> Cursos
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($cursos as $curso)
                                    <li>
                                        <strong>Nombre:</strong> {{ $curso->nombre }}<br>
                                        <strong>Modalidad:</strong> {{ $curso->modalidad }}<br>
                                        <strong>Nivel:</strong> {{ $curso->nivel_curso }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('cursos.index') }}" class="btn btn-link">Ver más</a>
                        </div>
                    </div>
                </div>

                <!-- Sección Grupos -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-users"></i> Grupos
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($grupos as $grupo)
                                    <li>
                                        <strong>Código:</strong> {{ $grupo->codigo }}<br>
                                        <strong>Cantidad:</strong> {{ $grupo->cantidad }}<br>
                                        <strong>Docente:</strong> {{ $grupo->pofe->nombre }}<br>
                                        <strong>Curso:</strong> 
                                        @if( $grupo->curso) 
                                        {{$grupo->curso->nombre}}
                                                @else 
                                            No asignado 
                                        @endif     <br>
                                        <strong>Periodo Académico:</strong> 
                                        @if ($grupo->periodo_academicos) 
                                            {{ $grupo->periodo_academicos->nombre }} 
                                        @else 
                                            No asignado 
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('grupos.index') }}" class="btn btn-link">Ver más</a>
                        </div>
                    </div>
                </div>

                <!-- Sección Matrículas -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-clipboard-list"></i> Matrículas
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($matriculas as $matricula)
                                    <li>
                                        <strong>Nombre:</strong> {{ $matricula->name }}<br>
                                        <strong>Documento:</strong> {{ $matricula->Documento }}<br>
                                        <strong>Estado:</strong> {{ $matricula->estado }}<br>
                                        <strong>Promedio:</strong> {{ $matricula->nota_final }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('matriculas.index') }}" class="btn btn-link">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sección Períodos Académicos -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-calendar-alt"></i> Períodos Académicos
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($periodos as $periodo)
                                    <li>
                                        <strong>Año:</strong> {{ $periodo->año }}<br>
                                        <strong>Nombre:</strong> {{ $periodo->nombre }}<br>
                                        <strong>Periodo:</strong> {{ $periodo->periodo }}<br>
                                        <strong>Descripción:</strong> {{ $periodo->descripcion }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('periodos.index') }}" class="btn btn-link">Ver más</a>
                        </div>
                    </div>
                </div>

                <!-- Sección Formularios de Inscripción -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-file-alt"></i> Formularios de Inscripción
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($formularios as $formulario)
                                    <li>
                                        <strong>Nombre:</strong> {{ $formulario->name }}<br>
                                        <strong>Email:</strong> {{ $formulario->email }}<br>
                                        <strong>Documento:</strong> {{ $formulario->Documento }}<br>
                                        <strong>Estado:</strong> {{ $formulario->estado }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('formularios.index') }}" class="btn btn-link">Ver más</a>
                        </div>
                    </div>
                </div>

                <!-- Sección Inscripciones -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user-plus"></i> Inscripciones
                        </div>
                        <div class="card-body text-center">
                            <p>Realiza inscripciones rápidamente.</p>
                            <a href="/inscripcion" class="btn btn-success">Ir al formulario</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Zenthic & rompe mesas. Todos los derechos reservados.</p>
        <a href="mailto:zenvic.contacto@gmail.com">pofe quiero la chamba</a>
        <span class="footer-link">|</span>
        <a href="/terminos-y-condiciones">soy el indicado </a>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
