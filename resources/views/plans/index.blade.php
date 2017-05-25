@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Plan List - <a href="{{route('plans.create')}}">New</a></div>

                <div class="panel-body">
                    

                    <table id="plans" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($plans as $p)
                                <tr>
                                    <td><a href="{{$p->image_url}}">
                                        <img src="{{$p->image_url}}" class="img img-thumbnail" />
                                    </a></td>
                                    <td>{{$p->title}}</td>
                                    <td>{{str_limit($p->description, 40)}}</td>
                                    <td>
                                        <form id="delete" action="{{route('plans.destroy', ['id' => $p->id])}}" method="POST">
                                            <a href="{{route('plans.edit', ['id' => $p->id])}}">Edit</a>
                                            <a href="#" onclick="document.getElementById('delete').submit(); return false;">Delete</a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#plans').DataTable();
    } );
</script>
@endsection