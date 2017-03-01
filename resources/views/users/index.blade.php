@extends('layouts.app') @section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Manage Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered" id="usersTable" width="100%">
            	<thead>
            		<tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Options</th>
                    </tr>
            	</thead>
                <tbody>
                    @foreach($users as $user)
                    @if(!($user->hasRole('admin')))
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        {{ $user->roles->implode('display_name', ', ') }}
      					</td>
                        <td>
                        	<div class="btn-group blocks">
                        		<a class="btn btn-primary" data-toggle="tooltip" title="Edit" href="/users/{{$user->id}}">
                                	<i class="fa fa-edit"></i>
	                            </a>
	                            <a class="btn btn-danger" data-toggle="tooltip" title="Delete" href="/users/delete/{{$user->id}}">
	                                <i class="fa fa-remove" ></i>
	                            </a>
                        	</div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
          <script type="text/javascript">
		  	$(function(){
		  		$("#usersTable").DataTable({
                    "responsive": true,
                    "scrollX": true,
			        dom: 'Bfrtip',
			        buttons: [
			            'excel', 'pdf'
			        ]
		    	});
		  		$('[data-toggle="tooltip"]').tooltip();
		  		$(".dt-buttons").addClass('button-group');
		  		$(".dt-button").addClass("btn").addClass("btn-default");
		  	});
		  </script>
    </div>

@endsection
