@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">

					@include('auth.partials.errors')

					@include('auth.partials.resForm')

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
