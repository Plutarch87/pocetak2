@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">

					@include('auth.partials.errors')

					{!! Form::open(['class' => 'form-horizontal', 'role' => 'form' ],['route' => 'auth.register']) !!}
						@include('auth.partials.regForm')
					{!! Form::close() !!}


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
