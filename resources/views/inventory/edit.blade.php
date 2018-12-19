@extends('layouts.master')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3>Edit your product</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <div class="card-body">
            {!! Form::open(['action' => ['InventoryController@update', $inventory->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('item', 'Item')}}
                    {{Form::text('item', $inventory->item, ['class' => 'form-control', 'placeholder' => 'Enter inventory item'])}}
                </div>
                <div class="form-group">
                        {{Form::label('location', 'Location')}}
                        {{Form::text('location', $inventory->type, ['class' => 'form-control', 'placeholder' => 'Enter inventory location'])}}
                </div>  
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection