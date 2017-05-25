<h4> Plan Form: </h4>
<form id="editPlan" action="{{route('plans.update', ['id' => $plan->id])}}" method="POST">
	
  <div class="form-group">
	  <label for="name">Name</label>
	  <input type="text" class="form-control" id="name" name="title" placeholder="{{$plan->title}}" value="{{$plan->title}}" required>
	</div>

  <div class="form-group">
    <label for="Description">Description:</label>
    <textarea class="form-control" rows="5" id="description" name="description">{{$plan->description}}</textarea>
  </div>

  <div class="form-group">
    <label for="image_url">Image URL</label>
    <input type="url" class="form-control" id="image_url" name="image_url" placeholder="http://www.google.com/image.png" value="{{$plan->image_url}}" />

    @if($plan->image_url)
      <img src="{{$plan->image_url}}" class="img" />
    @endif

  </div>

  

  <button type="submit" class="btn btn-default">Update</button>
  

  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
