@extends('admin.master')

@section("title")
Update  Page
@endsection

@push('styles')

  <link href="{{asset('assets/summernote/')}}/summernote-bs5.min.css" rel="stylesheet">
  <link href="{{asset('assets/summernote/')}}/summernote.min.css" rel="stylesheet">
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.site-page.update',$sitePage->id)}}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('PUT')
            <div class="tile-body">

            

                <div class="mb-3">
                  <label class="form-label"> <b>Page Name <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="name" type="text" value="{{old('name',$sitePage->name)}}" placeholder="Enter Page No">
                  @error('name')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label class="form-label"> <b>Title <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="title" type="text" value="{{old('title',$sitePage->title)}}" placeholder="Enter Title">
                  @error('title')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


               

                <div class="mb-3">
                  <label class="form-label"> <b>Description <i class="text-danger">*</i></b></label>
                  <textarea class="form-control summernote" rows="10" name="description"  placeholder="Enter Description">{{old('description',$sitePage->description)}}</textarea>
                  @error('description')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

               



                <div class="mb-3">
                  <label class="form-label"> <b>PDF File<i class="text-danger">*</i></b></label>
                  <input class="form-control" name="pdf_file" type="file" >
                  @error('pdf_file')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <select class="form-control" name="status" id="status">
                    <!-- <option value="">Select One</option> -->
                      <option value="1" {{$sitePage->status == 1 ? 'selected' : ''}} >Active</option>
                      <option  value="2" {{$sitePage->status == 2 ? 'selected' : ''}}>Inactive </option>
                    </select>
                    @error('status')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                  </div>


                
             
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Submit</button>
              <!-- &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a> -->
            </div>

            </form>
          </div>
          
        </div>
     
       
      </div>
@endsection


@push('scripts')

  <script src="{{asset('assets/summernote/')}}/summernote-bs5.min.js" ></script>
  <script src="{{asset('assets/summernote/')}}/summernote.min.js" ></script>
   <script>
    $(document).ready(function() {
  $('.summernote').summernote({
    tabsize: 2,
        height: 300,
   
  });

  var noteBar = $('.note-toolbar');
        noteBar.find('[data-toggle]').each(function() {
            $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
        });



});
   </script>
@endpush