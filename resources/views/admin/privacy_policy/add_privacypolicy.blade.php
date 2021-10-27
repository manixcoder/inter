<div class="content dashboard-pg">
  <h3 class="heading"><span class="red_text"> Privacy Policy > </span>  Create New Line</h3>
   <div class="row">
      <div class="col-md-12 studentform textcenter">
        <form  action="{{ URL::to('add-privacypolicy')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
        @csrf
          <div class="studentform_box">
              <div class="form_group small_btn">
                <input type="hidden" name="edit_id" value="{{ $editData->id ?? ''}}">
                 <input type="text" name="heading" placeholder="Title" class="form_control" required="" value="{{ $editData->heading ?? ''}}">
              </div>
              <div class="form_group small_btn">
                 <textarea name="text" placeholder="Write Content......" class="form_control textarea" required="">{{ $editData->text ?? ''}}</textarea>
              </div>             
              <div class="form_group small_btn">
                <button type="submit"  class="form_control btn" >send</button>
              </div>
          </div>
        </form>
    </div>
  </div>
</div>