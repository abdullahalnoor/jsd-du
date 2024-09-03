
@if (Session::has('primary'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Error !</strong> 
  {{Session::get('danger')}} .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif



<!-- <div class="alert alert-secondary alert-dismissible fade show" role="alert">
  <strong>Danger !</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->


@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> 
  {{Session::get('success')}} ..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (Session::has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> 
  {{Session::get('danger')}} ..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Warning !</strong> 
  {{Session::get('warning')}} ..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif



@if (Session::has('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Warning !</strong> 
  {{Session::get('info')}} ..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif



<!-- 
<div class="alert alert-light alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->




<!-- <div class="alert alert-dark alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->
