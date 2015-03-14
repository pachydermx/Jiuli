<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\District;
use App\Spot;

use Redirect, Input;

class SpotsController extends Controller {

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
	public function create($district_id)
	{
		return view('admin.spots.create')->withDistrict(District::find($district_id));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, ['name' => 'required|max:255']);

		$spot = new Spot;
		$spot->name = Input::get('name');
		$spot->district_id = Input::get('district_id');

		if($spot->save()){
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
		return view('admin.spots.edit')->withSpot(Spot::find($id));
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

		$spot = Spot::find($id);
		$spot->name = Input::get('name');

		if($spot->save()){
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
		$spot = Spot::find($id);
		$spot->delete();

		return Redirect::to('admin/regions');
	}

}
