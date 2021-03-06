<div class="content dashboard-pg">
   <h3 class="heading">About Us<span class="add_student_btn"><a href="{{URL::to('add_aboutus')}}">Create New Line</a></span></h3>
   
   @if(isset($Data))
        @foreach($Data as $value)
            <div class="lorem">
                <h3>{{ $value->heading }}<i class="edit_icon">
                   <a href="{{URL::to('edit-aboutus', base64_encode($value->id))}}">
                         <img src="{{ asset('public/assets/images/editicon.png')}}">
                   </a>  <a href="{{URL::to('delete-aboutus', $value->id)}}" onclick="return confirm('Are you sure you want to delete this item?');">
                         <img src="{{ asset('public/assets/images/delete.svg')}}">
                   </a></i>
                </h3>
                <?php 
                echo $value->description 
                ?>
            </div>
        @endforeach
   @endif  
</div>