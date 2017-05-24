@section('styles')
<link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
@endsection
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
    <label for="live_url">Live URL</label>
    <input type="url" class="form-control" id="live_url" name="live_url" placeholder="http://www.google.com">
  </div>
  <div class="form-group">
    <label for="source_url">Source URL</label>
    <input type="url" class="form-control" id="source_url" name="source_url" placeholder="http://www.github.com">
  </div>

  <div class="form-group">
    <label for="began">Project Begin Date</label>
    <input data-toggle="datepicker" name="began" id="began" />

    <label for="ended">Project End Date</label>
    <input data-toggle="datepicker" name="ended" id="ended" />

  </div>


  <button type="submit" class="btn btn-default">Submit</button>
  

  <input type="hidden" name="_method" value="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@section('scripts')
  <script src="{{asset('js/datepicker.min.js')}}"></script>
  <script type="text/javascript">
     $('[data-toggle="datepicker"]').datepicker();
  </script>

@endsection