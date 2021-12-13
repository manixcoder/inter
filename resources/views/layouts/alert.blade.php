<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />

<script type="text/javascript">
	<?php if(Session::get('success')){ ?>
		toastr.success("<?php echo Session::get('success'); ?>");
	<?php }else if(Session::get('error')){  ?>
		toastr.error("<?php echo Session::get('error'); ?>");
	<?php }else if(Session::get('warning')){  ?>
		toastr.warning("<?php echo Session::get('warning'); ?>");
	<?php }else if(Session::get('info')){  ?>
		toastr.info("<?php echo Session::get('info'); ?>");
	<?php }else if(Session::get('message')){  ?>
		toastr.info("<?php echo Session::get('message'); ?>");
	<?php } ?>
</script>