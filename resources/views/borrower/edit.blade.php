@extends('layouts.master')

@section('content')
<br />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3>Edit your product</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <div class="card-body">
                    <form method="POST" action="{{ route('borrower.update', $borrowers->id) }}" accept-charset="UTF-8">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input class="form-control" placeholder="Enter name" name="name" type="text" value="{{ old('name', $borrowers->name) }}" id="name">
                    </div>
                    <div class="form-group">
                        <label for="phonenum">Phone Number</label>
                        <input class="form-control" placeholder="Enter phone number" name="phonenum" type="text" value="{{ old('phonenum', $borrowers->phonenum) }}" id="phonenum">
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input class="form-control" placeholder="Enter Position" name="position" type="text" value="{{ old('position', $borrowers->position) }}" id="position">
                    </div>
                    <div class="form-group">
                        <label for="inventoriy_id">Inventory ID</label>
                        <input class="form-control" placeholder="Enter Inventory ID" name="inventoriy_id" type="text" value="{{ old('inventoriy_id', $borrowers->inventoriy_id) }}" id="inventoriy_id">
                    </div>
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input class="form-control" placeholder="Enter User ID" name="user_id" type="text" value="{{ old('user_id', $borrowers->user_id) }}" id="user_id">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
