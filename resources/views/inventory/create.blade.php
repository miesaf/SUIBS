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
                    {!! Form::open(['action' => 'InventoryController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{ Form::label('item', 'Item') }}
                        {{ Form::text('item', '', ['class' => 'form-control', 'placeholder' => 'Enter Item']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('location', 'Location') }}
                        {{ Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Enter Location']) }}
                    </div>

                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
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
