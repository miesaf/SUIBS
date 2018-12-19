@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3>Edit your product</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <div class="card-body">
            {!! Form::open(['action' => ['BorrowerController@update', $borrowers->id], 'method' => 'POST']) !!}
                
				<div class="form-group">
                    {{Form::label('name', 'User Name')}}
                    {{Form::text('name', $borrowers->name, ['class' => 'form-control', 'placeholder' => 'Enter name'])}}
                </div>
                <div class="form-group">
                        {{Form::label('phonenum', 'Phone Number')}}
                        {{Form::text('phonenum', $borrowers->phonenum, ['class' => 'form-control', 'placeholder' => 'Enter phone number'])}}
                </div>
                <div class="form-group">
                        {{Form::label('position', 'Position')}}
                        {{Form::text('position', $borrowers->position, ['class' => 'form-control', 'placeholder' => 'Enter Position'])}}
                </div>
                <div class="form-group">
                        {{Form::label('inventoriy_id', 'Inventory ID')}}
                        {{Form::text('inventoriy_id', $borrowers->inventory, ['class' => 'form-control', 'placeholder' => 'Enter Inventory ID'])}}
                </div>
				<div class="form-group">
                    {{Form::label('user_id', 'User ID')}}
                    {{Form::text('user_id', $borrowers->user_id, ['class' => 'form-control', 'placeholder' => 'Enter User ID'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection