
/* --------- Student Active Inactive -------- */
	function statuschange(id){
		alert(id);
		$.ajaxSetup({   
	        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	    }); 
	    $.ajax({   
	        url:"{{url('student-change/')}}"+'/'+id,     
	        method:"GET",   
	        contentType : 'application/json',   
	        success: function( data ) {  	            
	        }
	    });
	}

/* ----- Table Search filter ----- */
	$(document).ready(function(){
	  $(".serachbox").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#tabledata tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	  
       
	});
     