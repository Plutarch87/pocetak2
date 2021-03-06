@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">

					@include('auth.partials.errors')

					@include('auth.partials.logForm')

					@include('auth.partials.flash')

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
