<h4> Project Form: </h4>
<form id="createProject" action="{{route('projects.store')}}" method="POST">
	
  <div class="form-group">
	  <label for="name">Name</label>
	  <input type="text" class="form-control" id="name" name="title" placeholder="The Sample Project" required>
	</div>

  <div class="form-group">
    <label for="Description">Description:</label>
    <textarea class="form-control" rows="5" id="description" name="description"></textarea>
  </div>

  <div class="form-group">
    <label for="name">Live URL</label>
    <input type="url" class="form-control" id="name" name="live_url" placeholder="http://www.google.com">
  </div>
  <div class="form-group">
    <label for="name">Source URL</label>
    <input type="url" class="form-control" id="name" name="source_url" placeholder="http://www.github.com">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
  

  <input type="hidden" name="_method" value="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
