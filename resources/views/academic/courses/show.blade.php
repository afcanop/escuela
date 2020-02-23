@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header titlePanel">
                    course {{ $course->id }}
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('courses.index') }}" data-toggle="tooltip" data-placement="top"
                            title="Lista cursos">
                            <button class="btn btn-link btn-sm text-secondary"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i> Regresar
                            </button>   
                        </a>
                        <a href="{{ route('courses.edit', $course->id ) }}" data-toggle="tooltip" data-placement="top"
                            title="Editar curso">
                            <button class="btn btn-link btn-sm text-info"><i class="far fa-edit"
                                    aria-hidden="true"></i> Editar
                            </button>
                        </a>
                        {!! Form::open([
                        'method'=>'DELETE',
                        'route' => ['courses.destroy', $course->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', array(
                        'type' => 'submit',
                        'class' => 'btn btn-link btn-sm text-danger',
                        'data-toggle'=>'tooltip',
                        'data-placement'=>'top',
                        'title' => 'Eliminar curso',
                        'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $course->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name</th>
                                    <td> {{ $course->name }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="card my-2">
                <div class="card-header">Information</div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-alucnos"
                                role="tab" aria-controls="nav-home" aria-selected="true">Alucnos</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-leccion"
                                role="tab" aria-controls="nav-profile" aria-selected="false">lecciones</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-alucnos" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <hr>
                            <a href="{{ route('student.create', $course->id) }}" data-toggle="tooltip"
                                data-placement="top" title="Nuevo alucno">
                                <button class="btn btn-link btn-sm text-secondary">
                                    <i class="fa fa-user-plus"></i> Nuevo alucno
                                </button>
                            </a>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Califcacion</th>
                                        <th>Aprobado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student )
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td></td>
                                        @if($student->Califcacion)
                                        <td><span CLASS="text-success">SI</span></td>
                                        @else
                                        <td><span CLASS="text-danger">NO</span></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-leccion" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <hr>
                            <a href="{{ route('lessons.create', $course->id) }}" data-toggle="tooltip"
                                data-placement="top" title="Nueva lección">
                                <button class="btn btn-link btn-sm text-secondary">
                                    <i class="fas fa-shapes"></i> Nuevo lección
                                </button>
                            </a>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Id</th>
                                        <th rowspan="2">Nombre</th>
                                        <th colspan="3" class="text-center">Fecha</th>
                                        <th rowspan="2">Terminado</th>
                                    </tr>
                                    <tr>
                                        <th>creación</th>
                                        <th>Inicio</th>
                                        <th>Fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lessons as $lesson )
                                    <tr>
                                        <td>{{$lesson->id}}</td>
                                        <td>{{$lesson->title}}</td>
                                        <td>{{$lesson->created_at}}</td>
                                        <td>{{$lesson->dateStart}}</td>
                                        <td>{{$lesson->dateEnd}}</td>
                                        @if($student->Califcacion)
                                        <td><span CLASS="text-success">SI</span></td>
                                        @else
                                        <td>
                                            <a href="{{ route('lessons.qualification', 
                                            ['codeCurso' => $course->id, 'codeLesson' => $lesson->id]) }}"
                                                data-toggle="tooltip" data-placement="top" title="calificar lección">
                                                <button class="btn btn-link btn-sm text-secondary">
                                                    <i class="fas fa-graduation-cap"></i> Calificar
                                                </button>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection