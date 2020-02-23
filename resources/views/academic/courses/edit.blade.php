@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titlePanel">Edit course #{{ $course->id }}
                        <a href="{{ route('courses.index') }}" title="Back">
                            <a href="{{ route('courses.index') }}" data-toggle="tooltip" data-placement="top" title="Lista cursos">
                                <button class="btn btn-link btn-sm text-secondary">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar
                                </button>
                            </a>
                    </div>

                    <div class="card-body">


                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($course, [
                            'method' => 'PATCH',
                            'route' => ['courses.update', $course->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('academic.courses.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
