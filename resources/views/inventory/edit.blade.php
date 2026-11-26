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
                    <form method="POST" action="{{ route('inventory.update', $inventory->id) }}" accept-charset="UTF-8">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="item">Item</label>
                        <input class="form-control" placeholder="Enter inventory item" name="item" type="text" value="{{ old('item', $inventory->item) }}" id="item">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input class="form-control" placeholder="Enter inventory location" name="location" type="text" value="{{ old('location', $inventory->location) }}" id="location">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
