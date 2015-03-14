@extends('app')

@section('content')
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">在 {{ $district->name }} 新建地点</div>

			<div class="panel-body">

				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>错误</strong>输入错误<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ URL('admin/spots') }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="district_id" value="{{ $district->id }}">
					<input type="text" name="name" class="form-control" required="required">
					<br>
					<button class="btn btn-lg btn-info">新建</button>
				</form>

			</div>
		</div>
	</div>
</div>
@endsection