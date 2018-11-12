@extends('layouts.master')
@section('main-content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User List</h4>
                  <p class="card-category"> All User List</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="user_table">
                      <thead class=" text-primary">
                        <th> SL </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Type </th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>

                        @foreach($allUser as $user)
					  		<tr>
					  			<td>{{ ++$loop->index }} </td>
					  			<td class="text-warning">{{ $user->first_name }} - {{ $user->last_name }} </td>
					  			<td class="text-default">{{ $user->email }}</td>
					  			<td class="text-info"> Employee </td>
					  			<td class="text-primary">{{ $user->created_at }} </td>
					  				@if($user->completed)
					  			<td class="text-success">Active</td>
					  				@else
					  			<td class="text-danger">In Active</td>
					  				@endif
					  			<td class="text-primary">
					  				<a href="{{url('user/single-user/')}}/{{ Encryption::encodeid($user->id) }}"><i class="material-icons">more</i></a>

					  				@if($user->completed)
					  			<a href="{{url('user/statuschange-user/')}}/{{ Encryption::encodeid($user->id) }}"><i class="material-icons">clear</i></a>
					  				@else
					  			<a href="{{url('user/statuschange-user/')}}/{{ Encryption::encodeid($user->id) }}">
					  				<i class="material-icons">check</i></a>					
					  				@endif

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

@stop

@section('footer_script')

	<script>
		// $('#user_table').datatable({});
		 $(function() {
               $('#user_table').DataTable({
               
            });
         });

		// $(function() {
		//  	$('#user_table').DataTable({
		//         processing: true,
		//         serverSide: true,
		//         ajax: '{!! url("users/userl-list") !!}',
		//         columns: [
		//             { data: 'id', name: 'id' },
		//             { data: 'first_name', name: 'first_name' },
		//             { data: 'last_name', name: 'last_name' },
		//             { data: 'email', name: 'email' },
		//             { data: 'created_at', name: 'created_at' },
		//             { data: 'updated_at', name: 'updated_at' },
		            
		//         ]
		//     });
		//  })

	</script>
@endsection

