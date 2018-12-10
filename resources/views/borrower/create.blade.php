@extends('layouts.master')

@section('content')
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form">
       {!! Form::open(['action' => 'BorrowerController@store', 'method' => 'POST']) !!}
      <div class="card-body">
      <div class="form-group">
         <!--<label>Name</label>
         <input type="name" class="form-control" id="name" placeholder="Enter name"> -->
         {{Form::label('name', "Name")}}
         {{Form::text('name',"",['class' => 'form-control', 'placeholder' =>'Name'])}}
      </div>
      <div class="form-group">
          <!--<label>Phone Number</label>
          <input type="phone" class="form-control" id="hp" placeholder="Enter phone number">-->
         {{Form::label('phonenum', "Phone Number")}}
         {{Form::text('phonenum',"",['class' => 'form-control', 'placeholder' =>'Phone Number'])}}
       </div>
       <div class="form-group">
          <!--<label>Position</label>
          <input type="position" class="form-control" id="position" placeholder="Enter position">-->
         {{Form::label('position', "Position")}}
         {{Form::text('position',"",['class' => 'form-control', 'placeholder' =>'Position'])}}
       </div>
       <div class="form-group">
          <!--<label>Inventory ID</label>
          <input type="position" class="form-control" id="position" placeholder="Enter position">-->
         {{Form::label('inventoriy_id', "Inventory ID")}}
         {{Form::text('inventoriy_id',"",['class' => 'form-control', 'placeholder' =>'Inventory ID'])}}
       </div>
       <div class="form-group">
          <!--<label>Admin ID</label>
          <input type="position" class="form-control" id="position" placeholder="Enter position">-->
         {{Form::label('user_id', "Admin ID")}}
         {{Form::text('user_id',"",['class' => 'form-control', 'placeholder' =>'Admin ID'])}} 
       </div>
       
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
      </div>
      {!! Form::close() !!}
    </form>
  </div>
@endsection