@extends('admin.master')

@section("title")
Manage Categories 
@endsection

@push('styles')
@endpush

@section("content")
      <div class="card mb-4">
        <div class="card-body">
        <div class="row">
        <div class="col-md-12">
                <table class="table table-hover table-bordered dataTable" id="" >
                  
                    <tbody class="fs-5">
                    <tr>
                            <th>Submitted Date : </th>
                            <td>{{date('Y-M-d',strtotime($manuscript->manuscriptVersion->submitted_date))}}</td>
                        </tr>
                        <tr>
                            <th>Subject : </th>
                            <td>{{$manuscript->subject}}</td>
                        </tr>
                        <tr>
                            <th>Abstract : </th>
                            <td>{{$manuscript->manuscriptVersion->abstract}}</td>
                        </tr>
                        <tr>
                            <th>File : </th>
                            <td>
                                <a class="btn btn-sm btn-outline-primary" download href="{{asset($manuscript->manuscriptVersion->main_file)}}">Download</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
      </div>
        </div>
      </div>

      <div class="row">
       
       <div class="col-md-12">
         <div class="tile">

         

           <!-- <h3 class="tile-title">Vertical Form</h3> -->
           
           <div class="tile-body">

           <div class="accordion accordion-flush" id="accordionFlushExample">
            @foreach($manuscriptMails as $key => $manuscriptMailItem)
            <div class="accordion-item">
                <div class="accordion-header display-1" id="flush-heading_{{$key}}">
               
                <div class="accordion-button fs-5 collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{$key}}" 
                aria-expanded="false" aria-controls="flush-collapse_{{$key}}">
                <span class='d-inline btn btn-sm btn-outline-primary mx-1 '>{{$manuscriptMailItem->user->name}}</span>
                    
                    <span  class="d-inline  btn btn-sm btn-outline-primary mx-1">
                    {{ \Carbon\Carbon::parse($manuscriptMailItem->sent_time)->diffForHumans() }}
                  
                  
                    </span>

                    
                <p class='fs-5'>
              
                  {{$manuscriptMailItem->subject}} 
                </p>
                
                
                </div>
</div>


                <div id="flush-collapse_{{$key}}" class="accordion-collapse collapse" 
                aria-labelledby="flush-heading_{{$key}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body fs-5">
                {!! $manuscriptMailItem->message !!}    
              </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Accordion Item #2
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                </div>
            </div> -->
  
</div>
                 
           </div>
          

         
         </div>
         
       </div>
    
      
     </div>


      <div class="row mt-2">
       
       <div class="col-md-12">
         <div class="tile">

         

           <!-- <h3 class="tile-title">Vertical Form</h3> -->
           <form action="{{route('admin.manage-manuscript.send-mail')}}" method="POST"  enctype="multipart/form-data">
             @csrf
           <div class="tile-body">

           <input type="hidden" name="manuscript_id" value="{{$manuscript->id}}">

           
           <div class="mb-3">
                  <label class="form-label"> <b>Subject <i class="text-danger">*</i></b></label>
                  <input class="form-control" name="subject" type="text" placeholder="Enter Subject...">
                  @error('subject')
                  <b class="form-text text-danger">{{$message}} </b>
                  @enderror
                </div>

               <div class="mb-3">
                 <label class="form-label"> <b>Message<i class="text-danger">*</i></b></label>
                 <textarea class="form-control" rows="7" name="message"  placeholder="Write Your Message..."></textarea>
                 @error('message')
                 <b class="form-text text-danger">{{$message}} </b>
                 @enderror
               </div>
               
               <!-- <div class="mb-3">
                   <label class="form-label" for="status"><b>Status</b></label>
                   <select class="form-control" name="status" id="status">
                     <option value="1">Active</option>
                     <option  value="2">Inactive </option>
                   </select>
                   @error('status')
                 <b class="form-text text-danger">{{$message}} </b>
                 @enderror
                 </div> -->


                 
           </div>
           <div class="tile-footer">
             <button class="btn btn-primary" type="submit"><i class="bi bi-envelope me-2"></i>Send Mail</button>
             <!-- &nbsp;&nbsp;&nbsp;
             <a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a> -->
           </div>

           </form>
         </div>
         
       </div>
    
      
     </div>



@endsection

@push('scripts')
    
 @endpush