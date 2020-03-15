@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cursos
                    <div class="dropdown dropleft">
                        <button class="btn text-primary" type="button" id="menuPanel" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu " aria-labelledby="menuPanel">
                            <a href="{{ route('courses.create') }}" class="dropdown-item" data-toggle="tooltip"
                                data-placement="top" title="Agregar curso">
                                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    {!! Form::open(['method' => 'GET', 'route' => 'courses.index', 'class' => 'form-inline my-2 my-lg-0
                    float-right', 'role' => 'search']) !!}
                    {!! Form::close() !!}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th colspan="3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('courses.show', $item->id) }}" data-toggle="tooltip"
                                            data-placement="top" title="Información curso">
                                            <button class="btn btn-outline-primary btn-sm"><i
                                                    class="far fa-eye"></i></button>
                                        </a>
                                    </td>
                                    <td class="text-center ">
                                        <a href="{{ route('courses.edit', $item->id) }}" data-toggle="tooltip"
                                            data-placement="top" title="Editar curso">
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['courses.destroy', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-outline-danger btn-sm',
                                        'data-toggle'=>'tooltip',
                                        'data-placement'=>'top',
                                        'title' => 'Eliminar curso',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $courses->appends(['search' =>
                            Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection