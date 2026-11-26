@extends('layouts.master')

@section('title', 'Page title')

@section('content')
<br />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3>Add new borrower</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <form method="POST" action="{{ route('borrower.store') }}" accept-charset="UTF-8">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" placeholder="Enter name" name="name" type="text" value="{{ old('name', '') }}" id="name">
                    </div>
                    <div class="form-group">
                        <label for="phonenum">Phone Number</label>
                        <input class="form-control" placeholder="Enter phone number" name="phonenum" type="text" value="{{ old('phonenum', '') }}" id="phonenum">
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input class="form-control" placeholder="Enter position" name="position" type="text" value="{{ old('position', '') }}" id="position">
                    </div>
                    <div class="form-group">
                        <label for="inventoriy_id">Inventory ID</label>
                        <input class="form-control" placeholder="Enter inventory id" name="inventoriy_id" type="text" value="{{ old('inventoriy_id', '') }}" id="inventoriy_id">
                    </div>
                    <div class="form-group">
                        <label for="user_id">Admin ID</label>
                        <input class="form-control" placeholder="Enter admin id" name="user_id" type="text" value="{{ old('user_id', '') }}" id="user_id">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                    {{-- <div class="form-group">
				<label>Borrower Name :</label>
				<input type="text" class="form-control" id="name" placeholder="Name">
			</div>
			<div class="form-group">
				<label>Phone Number :</label>
				<input type="text" class="form-control" id="phonenum" placeholder="Phone Number">
			</div>
			<div class="form-group">
				<label>Position :</label>
				<input type="text" class="form-control" id="position" placeholder="Position">
			</div>
			<div class="form-group">
				<label>Inventory ID :</label>
				<input type="text" class="form-control" id="inventoriy_id" placeholder="Inventory">
			</div>
			<div class="form-group">
				<label>User ID :</label>
				<input type="text" class="form-control" id="user_id" placeholder="User ID">
			</div> --}}

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
