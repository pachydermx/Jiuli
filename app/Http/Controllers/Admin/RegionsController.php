<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Region;

use Redirect, Input, Auth;

class RegionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.RegionAdmin')->withRegions(Region::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.regions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, ['region_name' => 'required|max:255']);

		$region = new Region;
		$region->region_name = Input::get('region_name');

		if($region->save()){
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
		return view('admin.regions.edit')->withRegion(Region::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, ['region_name' => 'required|max:255']);

		$region = Region::find($id);
		$region->region_name = Input::get('region_name');

		if($region->save()){
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
		$region = Region::find($id);
		$region->delete();

		return Redirect::to('admin/regions');
	}

}
