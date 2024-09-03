@extends('admin.master')

@section("title")
Add Category
@endsection

@push('styles')
   
@endpush


@section("content")



      <div class="row">
       
        <div class="col-md-12">
          <div class="tile">
            <!-- <h3 class="tile-title">Vertical Form</h3> -->
            <form action="{{route('admin.journal-article.store',$journalIssue->id)}}" method="POST"  enctype="multipart/form-data">
             @method("PUT")
            @csrf
            <div class="tile-body">

            
            
                <div class="mb-3">
                  <label class="form-label"> <b>Page No <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="page_no" value="{{old('page_no')}}" type="text" placeholder="Enter Page No">
                  @error('page_no')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                
                
                <div class="mb-3">
                  <label class="form-label"> <b>Title <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="title" type="text" value="{{old('title')}}" placeholder="Enter Title">
                  @error('title')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label"> <b>DOI Url <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="doi_url" value="{{old('doi_url')}}" type="text" placeholder="Enter DOI Url">
                  @error('doi_url')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label"> <b>Abstract <i class="text-danger">*</i></b></label>
                  <textarea class="form-control" rows="10" name="abstract"  placeholder="Enter Abstract">{{old("abstract")}}</textarea>
                  @error('abstract')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label"> <b>Authors <i class="text-danger">*</i></b></label>
                  <textarea class="form-control" rows="10" name="authors"  placeholder="Enter Authors">{{old("authors")}}</textarea>
                  @error('authors')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label"> <b>Keywords <i class="text-danger">*</i></b></label>
                  <textarea class="form-control" rows="10" name="keywords"  placeholder="Enter Keywords">{{old("keywords")}}</textarea>
                  @error('keywords')
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
                  <label class="form-label"> <b>Order Id <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="order_id" type="number" value="{{old('order_id')}}" placeholder="Enter Order Id">
                  @error('order_id')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>



                <div class="mb-3">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <select class="form-control" name="status" id="status">
                    <!-- <option value="">Select One</option> -->
                      <option value="1">Active</option>
                      <option  value="2">Inactive </option>
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
<!-- $(document).on('click', '.custom-popover', function(e) {
        e.preventDefault();

        $('.custom-popover').popover({container: 'body', html: true, placement: 'left', }).popover('show').not(this).popover('hide');
        return false;
    });
   
      $(document).on('click', '.custom-popover-close', function() {
        $('.custom-popover').popover('hide');
        return false;
    }); -->
@endpush