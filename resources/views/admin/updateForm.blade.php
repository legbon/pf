<h3> Please update your account details: </h3>
<form>
	<div class="form-group">
	  <label for="name">Name</label>
	  <input type="text" class="form-control" id="name" placeholder="Name">
	</div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>

	{{ csrf_field() }}
</form>