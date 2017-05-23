@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(null !== session('admin_status') )
                        {{session('admin_status')}}
                    @endif
                    @if(!Auth::user()->updated_details)
                        @include('admin.updateForm')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
