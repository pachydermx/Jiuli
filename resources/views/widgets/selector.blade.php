@extends('main')

@section('content')
<select name="region">
	<option>请选择</option>
	@foreach ($regions as $region)
		<option value="{{ $region->id }}">{{ $region->region_name }}</option>
	@endforeach
</select>
<script>
	$("select[name='region']").change(function(){
		var region_id_selected = $(event.target).val();
		console.log(region_id_selected);
	});
</script>
@endsection