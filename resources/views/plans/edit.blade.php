@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $plan->name }}</div>

                <div class="panel-body">

                    
                    @include('plans.editForm')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
