@extends('layouts.master')

@section('content')
<br />
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Inventory</h3>
				</div>
				<!-- /.card-header -->
				@if (count($inventory) > 0)
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
								@foreach ($inventory as $inventories)
									<tr>
										<td>{{ $inventories->id }}</td>
										<td>{{ $inventories->item }}</td>
										<td>{{ $inventories->location }}</td>
										<td><a href="/inventory/{{ $inventories->id }}/edit"
												class="btn btn-primary">Edit</a>
											<a href="/inventory-delete/{{ $inventories->id }}"
												class="btn btn-danger">Delete</a>
										</td>
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
</div>
@endsection
