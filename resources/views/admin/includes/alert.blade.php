@if (Session::has('danger'))
 
    <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                <strong>{{Session::get('danger')}} .</strong> 
              </div>
            </div>
@endif

@if (Session::has('info'))
<div class="bs-component">
              <div class="alert alert-dismissible alert-info">
                <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                <strong>{{Session::get('info')}} .</strong> 
              </div>
            </div>

@endif

@if (Session::has('primary'))
<div class="bs-component">
              <div class="alert alert-dismissible alert-primary">
                <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                <strong>{{Session::get('primary')}} .</strong> 
              </div>
            </div>
@endif


@if (Session::has('warning'))
<div class="bs-component">
              <div class="alert alert-dismissible alert-warning">
                <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                <strong>{{Session::get('warning')}} .</strong> 
              </div>
            </div>

@endif


@if (Session::has('success'))
<div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                <strong>{{Session::get('success')}} .</strong> 
              </div>
            </div>

@endif