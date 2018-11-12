@extends('layouts.master')
@section('main-content')

<style>
  .table th{
      font-weight: bold;
      font-size: 25px;
      font-family: initial;
      color: #780202;
  }
  .table td{
    font-weight: bold;
  }
</style>

<div class="content">
    <div class="container-fluid">
      <div class="row">
		<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title pull-left">Employee List : </h4>
                  <p class="card-category pull-left"> All Employee List</p>
                <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#employeeAdd"><i class="material-icons">add_circle</i> Add New  </button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="employee_table">
                      <thead class="">
                        <th> SL </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Type </th>
                        <th>Office</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>

                        @foreach($allEmployee as $employee)
					  		<tr>
					  			<td>{{ ++$loop->index }} </td>
					  			<td class="text-warning" style="font-weight: bold;"> {{ ucfirst($employee->first_name) }} - {{ $employee->last_name }} </td>
					  			<td class="text-default">{{ $employee->email }}</td>
					  			<td class="text-info"> Employee </td>
					  			<td class="text-primary">{{ $employee->employee_type }} </td>
					  				@if($employee->blood_group)
					  			<td class="text-success">Active</td>
					  				@else
					  			<td class="text-danger">In Active</td>
					  				@endif
					  			<td class="text-primary">
					  				<a href="{{url('employee/single-employee/')}}/{{ Encryption::encodeid($employee->id) }}"><i class="material-icons">more</i></a>
					  			</td>
				  			</tr>
			  			@endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      </div>
  </div>
</div>

<div class="modal fade" id="employeeAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Employee Add List</b></h5>
        <button class="btn btn-danger btn-sm" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Employees Add</h4>
                  <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr></thead>
                    <tbody>
                      @foreach($pendingEmployee as $employee)
                      <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ ucfirst($employee->first_name) }}-{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td class="td-actions text-right">
                              <a href="{{url('employee/employee-add/'.Encryption::encodeId($employee->id))}}"><button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Add Employee">
                                <i class="material-icons">add_circle</i>
                              </button>
                              </a>
                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger btn-sm" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success btn-sm">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection


@section('footer_script')

<script>
  $(function() {
    $('#employee_table').DataTable({})
  })
</script>

@endsection