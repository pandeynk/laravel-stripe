@extends('layouts.app')

@section('content')

    <div class="box box-primary col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">password Reset</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/profile/change/password" method="POST" id="id_change_password">
		{{csrf_field()}}
              <div class="box-body">
                <div class="form-group col-md-6 hide">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Old Password" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">New Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="New Password" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="Password" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          <script type="text/javascript">
            $(document).ready(function(){
              $("#id_change_password").submit(function(){
                  $("#id_change_password").validate();
              });
            });
          </script>
 <div class="box box-primary col-md-6">
      <div class="box-header with-border">
        <h3 class="box-title">Profile Image</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="/profile/change/avatar" enctype="multipart/form-data" method="POST" id="id_profile_image">
	{{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Change Profile Image</label>
            <input type="file" name="avatar" class="form-control" id="exampleInputPassword1" placeholder="Change Profile Image" required>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <script type="text/javascript">
            $(document).ready(function(){
              $("#id_profile_image").submit(function(){
                  $("#id_profile_image").validate();
              });
            });
          </script>
     <div class="box box-primary col-md-6">
      <div class="box-header with-border">
        <h3 class="box-title">Login Email</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="/profile/change/email" method="POST" id="id_change_login_email">
	{{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Change Login Email</label>
            <input type="text" value="{{Auth::user()->email}}" name="email" class="form-control" id="exampleInputPassword1" placeholder="Login Email" required>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
<script type="text/javascript">
            $(document).ready(function(){
              $("#id_change_login_email").submit(function(){
                  $("#id_change_login_email").validate();
              });
            });
          </script>

@endsection
