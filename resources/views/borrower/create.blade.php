@extends('layouts.master')

@section('title', 'Page title')

@section('content')
<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
      <h3>Add new borrower</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
    <div class="card-body">
        {!! Form::open(['action' => 'BorrowerController@store', 'method' => 'POST']) !!} 
        <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter name'])}}
        </div>
        <div class="form-group">
                {{Form::label('phonenum', 'Phone Number')}}
                {{Form::text('phonenum', '', ['class' => 'form-control', 'placeholder' => 'Enter phone number'])}}
        </div>
        <div class="form-group">
            {{Form::label('position', 'Position')}}
            {{Form::text('position', '', ['class' => 'form-control', 'placeholder' => 'Enter position'])}}
         </div>
        <div class="form-group">
            {{Form::label('inventoriy_id', 'Inventory ID')}}
            {{Form::text('inventoriy_id', '', ['class' => 'form-control', 'placeholder' => 'Enter inventory id'])}}
        </div>  
        <div class="form-group">
            {{Form::label('user_id', 'Admin ID')}}
            {{Form::text('user_id', '', ['class' => 'form-control', 'placeholder' => 'Enter admin id'])}}
        </div>  
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
    </div>
      {{-- <div class="form-group">
        <label >Borrower Name :</label>
        <input type="text" class="form-control" id="name" placeholder="Name">
      </div>
      <div class="form-group">
        <label ">Phone Number :</label>
        <input type="text" class="form-control" id="phonenum" placeholder="Phone Number">
      </div>
      <div class="form-group">
        <label ">Position :</label>
        <input type="text" class="form-control" id="position" placeholder="Position">
      </div>
      <div class="form-group">
        <label ">Inventory ID :</label>
        <input type="text" class="form-control" id="inventoriy_id" placeholder="Inventory">
      </div>
      <div class="form-group">
        <label ">User ID :</label>
        <input type="text" class="form-control" id="user_id" placeholder="User ID">
      </div> --}}

    </div>
    <!-- /.card-body -->
    </div>
  </form>
</div>
@endsection

