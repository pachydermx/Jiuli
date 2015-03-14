@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">地域管理</div>

				<div class="panel-body">

					<a href="{{ URL('admin/regions/create') }}" class="btn btn-lg btn-primary">新增</a>

					@foreach ($regions as $region)

					<hr>
					<div class="page">
						<h4>{{ $region->region_name }}</h4>

						<!-- 地区 -->
						<div class="panel panel-default">
							<div class="panel-body">
								<a href="{{ URL('admin/districts/'.$region->id.'/create') }}" class="btn btn-lg btn-primary">新增</a>
								@foreach ($region->hasManyDistricts as $district)

									<hr>
									<h6>{{ $district->name }}</h6>

									<!-- 地点 -->

									<div class="panel panel-default">
										<div class="panel-body">
											<a href="{{ URL('admin/spots/'.$district->id.'/create') }}" class="btn btn-lg btn-primary">新增</a>
											@foreach ($district->hasManySpots as $spot)

												<hr>
												<h6>{{ $spot->name }}</h6>

												<a href="{{ URL('admin/spots/'.$spot->id.'/edit') }}" class="btn btn-success">编辑</a>

												<form action="{{ URL('admin/spots/'.$spot->id) }}" method="POST" style="display: inline;">
													<input name="_method" type="hidden" value="DELETE">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button type="submit" class="btn btn-danger">删除</button>
												</form>

											@endforeach
										</div>
									</div>


									<!-- 地点结尾 -->

									<a href="{{ URL('admin/districts/'.$district->id.'/edit') }}" class="btn btn-success">编辑</a>

									<form action="{{ URL('admin/districts/'.$district->id) }}" method="POST" style="display: inline;">
										<input name="_method" type="hidden" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-danger">删除</button>
									</form>

								@endforeach
							</div>
						</div>
						<!-- 地区结尾 -->

					</div>
					<a href="{{ URL('admin/regions/'.$region->id.'/edit') }}" class="btn btn-success">编辑</a>

					<form action="{{ URL('admin/regions/'.$region->id) }}" method="POST" style="display: inline;">
						<input name="_method" type="hidden" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-danger">删除</button>
					</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection