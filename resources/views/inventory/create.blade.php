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
                    <h3>Add new Inventory</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <form method="POST" action="{{ route('inventory.store') }}" accept-charset="UTF-8">
                    @csrf
                    <div class="form-group">
                        <label for="item">Item</label>
                        <input class="form-control" placeholder="Enter Item" name="item" type="text" value="{{ old('item', '') }}" id="item">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input class="form-control" placeholder="Enter Location" name="location" type="text" value="{{ old('location', '') }}" id="location">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
                {{-- <div class="form-group">
					<label >Enter Inventory Item :</label>
					<input type="text" class="form-control" id="item" placeholder="Item">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="location" placeholder="Location">
				</div> --}}
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
