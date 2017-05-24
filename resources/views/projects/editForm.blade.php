@section('styles')
<link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
@endsection

<h4> Project Form: </h4>
<form id="editProject" action="{{route('projects.update', ['id' => $project->id])}}" method="POST">
	
  <div class="form-group">
	  <label for="name">Name</label>
	  <input type="text" class="form-control" id="name" name="title" placeholder="{{$project->title}}" value="{{$project->title}}" required>
	</div>

  <div class="form-group">
    <label for="Description">Description:</label>
    <textarea class="form-control" rows="5" id="description" name="description">{{$project->description}}</textarea>
  </div>

  <div class="form-group">
    <label for="name">Live URL</label>
    <input type="url" class="form-control" id="name" name="live_url" placeholder="{{$project->live_url}}" value="{{$project->live_url}}">
  </div>
  <div class="form-group">
    <label for="name">Source URL</label>
    <input type="url" class="form-control" id="name" name="source_url" placeholder="{{$project->source_url}}" value="{{$project->source_url}}">
  </div>


  <div class="form-group">
    <label for="began">Project Begin Date</label>
    <input data-toggle="datepicker" name="began" id="began" value="{{$began}}" />

    <label for="ended">Project End Date</label>
    <input data-toggle="datepicker" name="ended" id="ended" value="{{$ended}}" />

  </div>

  <button type="submit" class="btn btn-default">Update</button>
  

  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>


@section('scripts')
  <script src="{{asset('js/datepicker.min.js')}}"></script>
  <script type="text/javascript">
     $('[data-toggle="datepicker"]').datepicker();
  </script>

@endsection