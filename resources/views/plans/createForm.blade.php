@section('styles')
<link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
@endsection
<h4> Plan Form: </h4>
<form id="createPlan" action="{{route('plans.store')}}" method="POST">
	
  <div class="form-group">
	  <label for="name">Name</label>
	  <input type="text" class="form-control" id="name" name="title" placeholder="The Sample Plan" required>
	</div>

  <div class="form-group">
    <label for="Description">Description:</label>
    <textarea class="form-control" rows="5" id="description" name="description"></textarea>
  </div>

  <div class="form-group">
    <label for="image_url">Image URL</label>
    <input type="url" class="form-control" id="image_url" name="image_url" placeholder="http://www.google.com/image.png">
  </div>


  <button type="submit" class="btn btn-default">Submit</button>
  

  <input type="hidden" name="_method" value="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
