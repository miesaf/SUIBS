<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowers = Borrower::all();

        return view('borrower.index')->with('borrower', $borrowers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrower.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phonenum' => 'required',
            'position' => 'required',
            'inventoriy_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $borrowers = new Borrower;
        $borrowers->name = $request->input('name');
        $borrowers->phonenum = $request->input('phonenum');
        $borrowers->position = $request->input('position');
        $borrowers->inventoriy_id = $request->input('inventoriy_id');
        $borrowers->user_id = $request->input('user_id');
        $borrowers->save();

        return redirect('/borrower')->with('success', 'New booking has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $borrowers = Borrower::findOrFail($id);

        return view('borrower.edit')->with('borrowers', $borrowers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phonenum' => 'required',
            'position' => 'required',
            'inventoriy_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $borrowers = Borrower::findOrFail($id);
        $borrowers->name = $request->input('name');
        $borrowers->phonenum = $request->input('phonenum');
        $borrowers->position = $request->input('position');
        $borrowers->inventoriy_id = $request->input('inventoriy_id');
        $borrowers->user_id = auth()->user()->id;
        $borrowers->save();

        return redirect('borrower')->with('success', 'Booking is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Borrower::findOrFail($id)->delete();

        return redirect('borrower')->with('success', 'Borrower has been deleted!');
    }
}
