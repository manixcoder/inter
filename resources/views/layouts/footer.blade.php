</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->

	<script type="text/javascript">
		CKEDITOR.replace('description');
	</script>
    <script type="text/javascript">
		$(document).ready(function () {
		    
		       
	    // Setup - add a text input to each footer cell
	    $('#example thead tr')
	        .clone(true)
	        .addClass('filters')
	        .appendTo('#example thead');
	 
	    var table = $('#example').DataTable({
	        orderCellsTop: true,
	        fixedHeader: true,
	        "order": [[ 3, "desc" ]]
	        initComplete: function () {
	            var api = this.api();
	 
	            // For each column
	            api
	                .columns()
	                .eq(0)
	                .each(function (colIdx) {
	                    // Set the header cell to contain the input element
	                    var cell = $('.filters th').eq(
	                        $(api.column(colIdx).header()).index()
	                    );
	                    var title = $(cell).text();
	                    $(cell).html('<input type="text" placeholder="' + title + '" />');
	 
	                    // On every keypress in this input
	                    $(
	                        'input',
	                        $('.filters th').eq($(api.column(colIdx).header()).index())
	                    )
	                        .off('keyup change')
	                        .on('keyup change', function (e) {
	                            e.stopPropagation();
	 
	                            // Get the search value
	                            $(this).attr('title', $(this).val());
	                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
	 
	                            var cursorPosition = this.selectionStart;
	                            // Search the column for that value
	                            api
	                                .column(colIdx)
	                                .search(
	                                    this.value != ''
	                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
	                                        : '',
	                                    this.value != '',
	                                    this.value == ''
	                                )
	                                .draw();
	 
	                            $(this)
	                                .focus()[0]
	                                .setSelectionRange(cursorPosition, cursorPosition);
	                        });
	                });
	        	},
	    	});
		});
	</script>
<script type="text/javascript">        
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    }, 5000);      
</script>
<script>
    $(".login_part").click(function(){
      $(".logout-dropdown").toggleClass("show");
    });
</script>
  </body>
</html>