<div class="content dashboard-pg">
  <h3 class="heading"><span class="red_text"> Announcement > </span>  Create Announcement</h3>
   <div class="row">
      <div class="col-md-12 studentform textcenter">
        <form  action="{{ URL::to('add-announcement')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
        @csrf
          <div class="studentform_box">
              <div class="form_group small_btn">
                 <input type="text" name="title" placeholder="Title" class="form_control" required="">
              </div>
              <div class="form_group small_btn">
                 <textarea name="description" placeholder="Write Content......" class="form_control textarea" required=""></textarea>
              </div>
              
                <div class="form_group small_btn text-center">
                    <div class="redioBox fw">
                        <span class="aimfor_text">Aim For</span>
                        <div class="redioinput">
                            <div class="redioinput_box">
                                <input type="radio" id="Students" name="aim" value="Students">
                                <span></span>
                            </div>
                            <label for="Students">Students</label>
                        </div>
                        <div class="redioinput">
                            <div class="redioinput_box">
                                 <input type="radio" id="css" name="aim" value="Recruiters">
                                 <span></span>
                             </div>
                            <label for="css">Recruiters</label>
                        </div>
                        <div class="redioinput">
                            <div class="redioinput_box">
                                 <input type="radio" id="javascript" name="aim" value="Both" checked>
                                 <span></span>
                            </div>
                            <label for="javascript">Both</label>
                        </div>
                    </div>
                </div>
           
              <div class="form_group small_btn">
                <button type="submit"  class="form_control btn" >send</button>
              </div>
          </div>
        </form>
    </div>
  </div>
</div>