<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::all();

        return view('inventory.index')->with('inventory', $inventories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item' => 'required',
            'location' => 'required',
        ]);

        $inventories = new Inventory;
        $inventories->item = $request->input('item');
        $inventories->location = $request->input('location');
        $inventories->save();

        return redirect('/inventory')->with('success', 'New inventory has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inventories = Inventory::findOrFail($id);

        return view('inventory.edit')->with('inventory', $inventories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item' => 'required',
            'location' => 'required',
        ]);

        $inventories = Inventory::findOrFail($id);
        $inventories->item = $request->input('item');
        $inventories->location = $request->input('location');
        $inventories->save();

        return redirect('inventory')->with('success', 'inventories is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();

        return redirect('inventory')->with('success', 'Inventory has been deleted!');
    }
}
