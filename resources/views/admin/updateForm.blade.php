<h3> Please update your account details: </h3>
<form action="{{route('admin.update')}}" method="POST">
	<div class="form-group">
	  <label for="name">Name</label>
	  <input type="text" class="form-control" id="name" name="name" placeholder="{{$user->name}}">
	</div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="{{$user->email}}">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>