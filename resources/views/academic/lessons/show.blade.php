@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        @include('')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">lesson {{ $lesson->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/lessons') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/lessons/' . $lesson->id . '/edit') }}" title="Edit lesson"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit</button></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['lessons', $lesson->id],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-sm',
                    'title' => 'Delete lesson',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $lesson->id }}</td>
                                </tr>
                                <tr>
                                    <th> Title </th>
                                    <td> {{ $lesson->title }} </td>
                                </tr>
                                <tr>
                                    <th> Content </th>
                                    <td> {{ $lesson->content }} </td>
                                </tr>
                                <tr>
                                    <th> Slug </th>
                                    <td> {{ $lesson->slug }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection