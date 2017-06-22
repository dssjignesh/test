<?php
/*Template Name: Contact Us*/
get_header(); 
global $wp_query, $object,$url,$wpdb,$posts,$category_id;

?>
<?php if ( is_active_sidebar( 'google-map' ) ) : ?>
	<?php dynamic_sidebar( 'google-map' ); ?>
<?php endif; ?>
<script type="text/javascript">
	var url = '<?php echo get_site_url(); ?>';
	function contact_con(){
		if(jQuery("#contact_name").val() == ''){
			jQuery("#contact_name").css("background","#F4EDB6");
			jQuery("#contact_name").css("border","1px solid #FF3739");	
			jQuery("#contact_name").focus();
			return false;
		}
		else{
			jQuery("#contact_name").css("background","");
			jQuery("#contact_name").css("border","");	
			flag="true";
		}
		if(jQuery("#email").val() == ''){
			jQuery("#email").css("background","#FFF2F2");
			jQuery("#email").css("border","1px solid #FF3739");
			jQuery("#email").focus();
			return false;
		}
		else{
			var email = jQuery("#email").val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if(emailReg.test(email)) {
				flag="true";
				jQuery("#email").css("background","");
				jQuery("#email").css("border","");
			}
			else{
				jQuery("#email").css("background","#FFF2F2");
				jQuery("#email").css("border","1px solid #FF3739");
				jQuery("#email").focus();
				return false;
			}
		}
		if(jQuery("#subject").val() == ''){
			jQuery("#subject").css("background","#F4EDB6");
			jQuery("#subject").css("border","1px solid #FF3739");	
			jQuery("#subject").focus();
			return false;
		}
		else{
			jQuery("#subject").css("background","");
			jQuery("#subject").css("border","");	
			flag="true";
		}
		if(jQuery("#massage").val() == ''){
			jQuery("#massage").css("background","#F4EDB6");
			jQuery("#massage").css("border","1px solid #FF3739");	
			jQuery("#massage").focus();
			return false;
		}
		else{
			jQuery("#massage").css("background","");
			jQuery("#massage").css("border","");	
			flag="true";
		}
		if(flag="true"){
			jQuery.ajax({
				type: "POST",
				url: url+'/ajax/ajax_contact.php',
				data:"contact_name="+jQuery("#contact_name").val()+"&email="+jQuery("#email").val()+"&subject="+jQuery("#subject").val()+"&massage="+jQuery("#massage").val(),
				success:function(data){
					if(data==1){
						jQuery('#msg').html('<b>Your Detail Submit Sucessfully</b>');
						jQuery('#msg').css('color','green');
						jQuery('#contact_name').val('');
						jQuery('#email').val('');
						jQuery('#subject').val('');
						jQuery('#massage').val('');
					}
					else{
						jQuery('#msg').html('<b>Please Try again....</b>');
						jQuery('#msg').css('color','red');
						jQuery('#email').val('');
					}
					
				  }
			  });
			return true;
		}
		else{
			return false;
		}
	}
</script>
<div class="container">
	<div class="section-title">
        <h2>Contact us</h2>
    </div>
	<div class="col-sm-6 contact-form">
        <form id="contactForm" method="post" action="" novalidate="novalidate"> 
            <div class="contact-form-status"></div>
            <div class="row"> 
                <div class="col-md-6"> <div class="form-group"> <input type="text" placeholder="Name" class="form-control" name="contact_name" id="contact_name"> </div></div>
                <div class="col-md-6"> <div class="form-group"> <input type="email" placeholder="Email" class="form-control" name="email" id="email"> </div></div>
            </div>
            <div class="form-group"> <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject"> </div>
            <div class="form-group"> <textarea placeholder="Message" rows="10" cols="30" class="form-control" name="massage" id="massage"></textarea> </div>
            <button class="btn submit-button" type="button" onClick="return contact_con();">send</button> 
        </form>
        <div id="msg"></div>
    </div>
    <div class="col-md-6 col-sm-6">
    	<div class="contact-address">
        	<?php if ( is_active_sidebar( 'address' ) ) : ?>
				<?php dynamic_sidebar( 'address' ); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>