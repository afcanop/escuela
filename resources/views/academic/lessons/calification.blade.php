@extends('layouts.backend')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">calificar leccion: <strong>{{$lesson->title}}</strong> del curso:
					<strong>{{$course->name}}<strong></div>
				<div class="card-body">
					@if ($errors->any())
					<ul class="alert alert-danger">
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif
					{!! Form::open(['route' => ['quialification.store'] , 'class' => 'form-horizontal', 'files'
					=> true]) !!}
					<table class="table table-hober">
						<thead>
							<tr>
								<th>nombre estudian</th>
								<th>nota</th>
								<th>Recuperación</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($qualification as $item)
							<tr>
								<td>
									{{$item->name}}
								</td>
								<td>
									<select name="note[{{$course->name}}][{{$lesson->title}}][{{$item->name}}]" class="form-control">
										@for ($i = 0; $i <= 5; $i++)
											@if ($item->qualificationValue === $i)
												<option value="{{$i}}" selected>{{$i}}</option>
											@else
												<option value="{{$i}}">{{$i}}</option>
											@endif
										@endfor
									</select>
								</td>
								<td>
									<input type="checkbox" name="enableRecovery[{{$course->name}}][{{$lesson->title}}][{{$item->name}}]" 	{{ $item->enableRecovery ? 'checked' : '' }}>
								</td>
							@endforeach
						</tbody>
					</table>
					<button type="submit" class="btn btn-outline-primary">Guardar</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection