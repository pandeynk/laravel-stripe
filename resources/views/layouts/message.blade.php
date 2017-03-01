@if(Session::has('danger') || Session::has('success'))
	<div class="alert alert-dismissible alert-{{Session::has('danger')?'danger':'success'}}">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <div>{{Session::has('danger')?Session::get('danger'):Session::get('success')}}</div>
	</div>
@endif
