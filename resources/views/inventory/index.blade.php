@extends('layouts.master')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Inventory</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Location</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($inventory as $inventor)
              <tr>
                <td>{{$inventor->id}}</td>
                <td>{{$inventor->item}}</td>
                <td>{{$inventor->location}}</td>
                <td><a href="/inventory/{{$inventor->id}}/edit" class="btn btn-primary">Edit</a>
                  <a href="/inventory-delete/{{$inventor->id}}" class="btn btn-danger">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

@endsection