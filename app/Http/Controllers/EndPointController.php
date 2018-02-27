<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endpoint;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class EndPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Endpoint::all();
        return View('endpoint.index')
            ->with('categories', $categories);            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('endpoint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'category'        => 'required',
			'active'          => 'required' 
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('endpoints/create')
				->withErrors($validator);
				//->withInput(Input::except('password'));
		} else {
			// store
			$endpoint                 = new Endpoint;
			$endpoint->category       = Input::get('category');
			//$endpoint->active         = Input::get('active');			 
			$endpoint->save();

			// redirect
			Session::flash('message', 'Successfully created Endpoint!');
            return Redirect::to('/endpoints');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $endpoint = Endpoint::find($id);
        
        
        return View('endpoint.edit')->with('endpoint', $endpoint);

		 
		//return View('endpoint.edit')
		//	->with('endpoint', $endpoint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    //public function update( $id)
    {
        
        
		$rules = array(
			 
			'active'      => 'required' 
		);
        $validator = Validator::make(Input::all(), $rules);
        
        

		// process the login
		if ($validator->fails()) {
			return Redirect::to('endpoints')
				->withErrors($validator);
				 
		} else {
			// store
			$endpoint = Endpoint::find($id);
            $endpoint->active       = Input::get('active');			 
            $endpoint->active       = 'N';			 
			$endpoint->save();

			// redirect
			Session::flash('message', 'Successfully updated Endpoint!');
			return Redirect::to('endpoints');
        }
        
       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
