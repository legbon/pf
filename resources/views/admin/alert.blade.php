@if(null !== session('admin_status') )
    
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{session('admin_status')}}</div>
                </div>
            </div>
        </div>
</div>

@endif
