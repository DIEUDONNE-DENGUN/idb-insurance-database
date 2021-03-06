<?php

/*AUTHOR :: NKWETEYIM DAISY @ idb_dev*/
class CarController extends BaseController {

	protected $totalAccidentNum;
	protected $totalAccidentParticipant;
	protected $totalAccidentCost;



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function action_index()
	{
		//get all cars
		$carsList=Cars::orderBy('created_at', 'desc')->get();
		return View::make('cars.index', compact ('carsList'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//add new car
		return View::make('cars.create');
	}

	public function action_createCommit(){
		echo "i want to commit cars";
		exit();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function action_store()
	{
		try{
			//rule validation
			//$date = date("Y");
			$rules=array(
				'regno' => 'required', 
				'model'=>'required',
				'year'=>'required|integer|digits_between:4,4'
			);

			/*$regno_validate = array('regno.unique'	=>	'Car registration number already existing.
														 Please try another one',);*/

			//get all car information
			$carInfo = Input::all();

			//validate car information with the rules
			$validation=Validator::make($carInfo, $rules);
			if($validation->passes())
			{

				$cars = new Cars();
				$cars->regno = Input::get('regno');
				$cars->model = Input::get('model');
				$cars->year  = Input::get('year');
				$cars->user_id = Auth::user()->id;

				$cars->save();

				return Redirect::route('homeCar')
				->withInput()
				->with('success', 'Successfully created car.');
	      	}
	      	//show error message
	      	return Redirect::route('addCar')
	           ->withInput()
	           ->withErrors($validation)
	           ->with('error', 'Some fields are incomplete.');
	       }catch(\Exception $e){
	       		return Redirect::route('addCar')
		           ->withInput()
		           ->with('error', 'Car already exists with registration Number ' 
		           	. Input::get('regno') . "<br>Please, make sure that 
		           	registrations number is the correct one");
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
		$car = Cars::find($id);
        if (is_null($car))
        {
            return Redirect::route('homeCar');
        }
        return View::make('cars.show', compact('car'));
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($regno)
	{
		//delete car
		echo "just changed";
		Cars::where('regno', '=', $regno)->delete();
        return Redirect::route('homeCar')
            ->withInput()
            ->with('success', 'Successfully deleted car.');

	}

	public function action_deleteCar($regno)
	{
		try{
			echo "just changed";
			Cars::where('regno', '=', $regno)->delete();
	        return Redirect::route('homeCar')
	            ->withInput()
	            ->with('success', 'Successfully deleted entry.');
	        }catch (\Exception $e){
	        	return Redirect::route('homeCar')
	            ->withInput()
	            ->with('error', 'Violating key contraint. <br> 
	            	Please, check to make sure that the car is not assigned
	            	 to an owner or is currently active on an accident');
	        }

	}

	public function action_editCar($regno){
		//echo Request::segment(1);
		$car = Cars::where('regno', '=', $regno)->firstOrFail();

        if (is_null($car))
        {
            return Redirect::route('homeCar');
        }

        return View::make('cars.edit')->with('car' , $car);
	}

	public function action_commitEdits(){
		//create a rule validation
		$rules=array(
            'model'=>'required',
            'year'=>'required|numeric'
        );
        $carInfo = Input::all();
        $validation = Validator::make($carInfo, $rules);
        if ($validation->passes())
        {
            $car = Cars::where('regno', '=', Input::get('regno'))
            ->update(['model' => Input::get('model'), 
            		  'year'  => Input::get('year')]);
           
            return Redirect::route('homeCar')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'Successfully updated entry.');
        }
        return Redirect::route('cars.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}
}
