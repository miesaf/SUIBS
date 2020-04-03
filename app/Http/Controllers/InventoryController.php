<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = inventory::all();
        return view('inventory.index')->with('inventory',$inventories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = inventory::orderBy('item', 'asc')->get();
		//$aina = "AINjjjjjjjA";
		//dd($aina);
    	return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'item' => 'required',
            'location' => 'required'

        ]);

        $inventories = new Inventory;
        $inventories->item = $request->input('item');
		$inventories->location = $request->input('location');
        //$borrowers->user_id = auth()->user()->id;
        $inventories->save();

        return redirect('/inventory')->with('success', 'New inventory has been added!');

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
        $inventories = Inventory::find($id);

        // Check for correct user
        // if(auth()->user()->id !== $inventories->id){
        //     return redirect('/inventory')->with('error', 'Unauthorized Page');
        // }

        return view('inventory.edit')->with('inventory', $inventories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item' => 'required',
            'location' => 'required',
        ]);

        // Create inventories
        $inventories = Inventory::find($id);
        $inventories->item = $request->input('item');
        $inventories->location = $request->input('location');
        // $inventories->id = auth()->user()->id;
        $inventories->save();

        return redirect('inventory')->with('success', 'inventories is updated!');
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
        $message = "Your Inventory has been deleted";
        if (Inventory::find($id)->delete()){
            $status = true;
        } else {
            $message = "The inventory failed to delete!";
        }
        $inventories = Inventory::all();
        // Session::flash('message',$message);
        // Session::flash('message-type', 'success');
        return redirect('inventory')->with('inventory',$inventories);
    }
}
