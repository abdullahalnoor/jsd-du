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
            <form action="{{route('admin.journal-issue.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
            <div class="tile-body">

            <div class="mb-3">
                    <label class="form-label" for="journal_volume"><b>Volume No   <i class="text-danger">*</i> </b></label>
                    <select  class="form-control" name="journal_volume" id="journal_volume">
                    <option value="">Select One</option>
                    @foreach($journalVolumes as $JournalVolumeItem )
                      <option value="{{$JournalVolumeItem->id}}">{{$JournalVolumeItem->volume_no}}</option>
                    @endforeach
                    </select>
                    @error('journal_volume')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                  </div>

                  <div class="mb-3">
                  <label class="form-label"> <b>Chief Editor <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="chief_editor" type="text" placeholder="Enter Chief Editor">
                  @error('chief_editor')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>
            
                <div class="mb-3">
                  <label class="form-label"> <b>Issue No <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="issue_no" type="text" placeholder="Enter Issue No">
                  @error('issue_no')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label"> <b>Page No <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="page_no" type="text" placeholder="Enter Page No">
                  @error('page_no')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label class="form-label"> <b>Title <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="title" type="text" placeholder="Enter Title">
                  @error('title')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label"> <b>Publish Date <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="publish_date" type="date" placeholder="Enter Publish Date">
                  @error('publish_date')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>



                <div class="mb-3">
                  <label class="form-label"> <b>Cover Image<i class="text-danger">*</i></b></label>
                  <input class="form-control" name="cover_image" type="file" >
                  @error('cover_image')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>


                <div class="mb-3">
                  <label class="form-label"> <b>Order Id <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="order_id" type="number" placeholder="Enter Order Id">
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