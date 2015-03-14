<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\District;
use App\Region;

use Redirect, Input;

class DistrictsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($region_id)
	{
		return view('admin.districts.create')->withRegion(Region::find($region_id));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, ['name' => 'required|max:255']);

		$district = new District;
		$district->name = Input::get('name');
		$district->region_id = Input::get('region_id');

		if($district->save()){
			return Redirect::to('admin/regions');
		} else {
			return Redirect::back()->withInput()->withErrors('地域更新失败');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.districts.edit')->withDistrict(District::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, ['name' => 'required|max:255']);

		$district = District::find($id);
		$district->name = Input::get('name');

		if($district->save()){
			return Redirect::to('admin/regions');
		} else {
			return Redirect::back()->withInput()->withErrors('地域更新失败');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$district = District::find($id);
		$district->delete();

		return Redirect::to('admin/regions');
	}

}
