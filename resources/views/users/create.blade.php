@extends('layouts.app') @section('content')

    <div class="box box-primary col-md-6">
        <div class="box-header with-border">
        	@if(isset($user) && !empty($user))
          	<h3 class="box-title">Edit User</h3>
          	@else
          	<h3 class="box-title">Add User</h3>
          	@endif
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @if(isset($user) && !empty($user))
        <form role="form" method="POST" action="/users/{{$user->id}}" id="id_create_users">
        @else
        <form role="form" method="POST" action="/users" id="id_create_users">
        @endif
        	{{csrf_field()}}
            <div class="box-body">
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Name</label>
                    @if(isset($user) && !empty($user))
		              <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Name" value="{{$user->name}}" required>
		              @else
		              <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Name" value="" required>
		            @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    @if(isset($user) && !empty($user))
		              <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email Address" value="{{$user->email}}" required>
		              @else
		              <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email Address" value="" required>
		            @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Page Permissions</label>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            	@if(isset($user) && !empty($user))
              					<input type="checkbox" name="roles[]" value="client" {{$user->hasRole('client')?'checked':''}}>Clients</label>
                                @else
								<input type="checkbox" name="roles[]" value="client">Clients</label>
                                @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                @if(isset($user) && !empty($user))
              					<input type="checkbox" name="roles[]" value="product" {{$user->hasRole('product')?'checked':''}}>Products</label>
                                @else
                                <input type="checkbox" name="roles[]" value="product">Products</label>
                                @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                @if(isset($user) && !empty($user))
              					<input type="checkbox" name="roles[]" value="quote" {{$user->hasRole('quote')?'checked':''}}>Quote</label>
                                @else
                                <input type="checkbox" name="roles[]" value="quote">Quote</label>
                                @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                @if(isset($user) && !empty($user))
              					<input type="checkbox" name="roles[]" value="invoice" {{$user->hasRole('invoice')?'checked':''}}>Invoice</label>
                                @else
                                <input type="checkbox" name="roles[]" value="invoice">Invoice</label>
                                @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                @if(isset($user) && !empty($user))
              					<input type="checkbox" name="roles[]" value="user" {{$user->hasRole('user')?'checked':''}}>Users</label>
                                @else
                                <input type="checkbox" name="roles[]" value="user">Users</label>
                                @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                @if(isset($user) && !empty($user))
								<input type="checkbox" name="roles[]" value="labour" {{$user->hasRole('labour')?'checked':''}}>Labours</label>
                                @else
								<input type="checkbox" name="roles[]" value="labour">Labours</label>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
 <script type="text/javascript">
        $(document).ready(function(){
          $("#id_create_users").submit(function(){            
              $("#id_create_users").validate();
          });
        });
      </script>
@endsection
