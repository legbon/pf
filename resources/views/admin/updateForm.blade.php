<h3> Please update your account details: </h3>
<form id="updateAdmin" action="{{route('admin.update')}}" method="POST">
	<div class="form-group">
	  <label for="name">Name</label>
	  <input type="text" class="form-control" id="name" name="name" placeholder="{{$user->name}}" required>
	</div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="{{$user->email}}" required>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>

  <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="confirm_password" placeholder="Password" required>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
  <h3 id="message"></h3>
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@section('scripts')
<script type="text/javascript">
  $('#password, #confirm_password').on('keyup', function (e) {
    var msg, color;
    var p = $('#password').val();
    var cp = $('#confirm_password').val();
    if (p == cp) {
      msg = '';
      color = '';
      if(p.length < 8) {
        msg = 'Password must have 8 or more characters';
      }
    } else {
      msg = 'Passwords must match';
    }
    e.target.setCustomValidity(msg);
  });
</script>
@endsection