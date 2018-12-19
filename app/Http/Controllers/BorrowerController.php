<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\borrower;
use DB;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowers = borrower::all();
        return view('borrower.index')->with('borrower',$borrowers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function create()
    {
		
    	$borrowers = borrower::orderBy('name', 'asc')->get();
		//$aina = "AINjjjjjjjA";
		//dd($aina);
    	return view('borrower.create');
    }
    /*public function create()
    {
        return view('borrower.create');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phonenum' => 'required',
            'position' => 'required',
            'inventoriy_id' => 'required',
            'user_id' => 'required'
        ]);

        $borrowers = new borrower;
        $borrowers->name = $request->input('name');
        $borrowers->phonenum = $request->input('phonenum');
        $borrowers->position = $request->input('position');
        $borrowers->inventoriy_id = $request->input('inventoriy_id');
		$borrowers->user_id = $request->input('user_id');
        //$borrowers->user_id = auth()->user()->id;
        $borrowers->save();

        return redirect('/borrower')->with('success', 'New booking has been added!');
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
        $borrowers = Borrower::find($id);

        // Check for correct user
      

        return view('borrower.edit')->with('borrowers', $borrowers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrower $id)
    {

        //dd($id);

        $this->validate($request, [
            'name' => 'required',
            'phonenum' => 'required',
            'position' => 'required',
            'inventoriy_id' => 'required',
            'user_id' => 'required',
        ]);
        // Create Product
        $borrowers = borrower::find($id);
        $borrowers->name = $request->input('name');
        $borrowers->phonenum = $request->input('phonenum');
        $borrowers->position = $request->input('position');
        $borrowers->inventoriy_id = $request->input('inventory_id');
        $borrowers->user_id = auth()->user()->id;
        $borrowers->save();

        return redirect('borrower.index')->with('success', 'Booking is updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $status = false;
        $message = "Your Product has been deleted";
        if (Borrower::find($id)->delete()){
            $status = true;
        } else {
            $message = "The product failed to delete!";
        }
        $borrowers = Borrower::all();
        \Session::flash('message',$message); 
        \Session::flash('message-type', 'success');
        return redirect('borrower')->with('borrower',$borrowers);
        
    }
}
