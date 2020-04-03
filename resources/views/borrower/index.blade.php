@extends('layouts.master')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Borrower</h3>
          </div>
          <!-- /.card-header -->
          @if(count($borrower) > 0)
          <div class="card-body">
            <table id="borrowertable" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Position</th>
                <th>Inventory ID</th>
                <th>Admin ID</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($borrower as $borrowers)
              <tr>
                <td>{{$borrowers->id}}</td>
                <td>{{$borrowers->name}}</td>
                <td>{{$borrowers->phonenum}}</td>
                <td>{{$borrowers->position}}</td>
                <td>{{$borrowers->inventoriy_id}}</td>
                <td>{{$borrowers->user_id}}</td>
              <td><a href="/borrower/{{$borrowers->id}}/edit" class="btn btn-primary">Edit</a>
                  <a href="/borrower-delete/{{$borrowers->id}}" class="btn btn-danger">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
          <p>No Data to Display</p>
        @endif
        <!-- /.card-body -->
        </div>
      </div>
    </div>

@endsection
