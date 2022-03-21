<?php
//This function to load pages based on the page names on sucessful CF7 sending
function cf7_footer_script(){
	
	// Initialising the location variable with null
	$newLocation = " ";
	
	//if page class name is Open day macarthur. 
	if ( is_page('register-for-open-day-macarthur')) {

		$newLocation = "/macarthur-thank-you";	
	}
	//if page class name is Open day ashfield. 
	else if ( is_page('register-for-open-day-ashfield')) {

	$newLocation = "/ashfield-thank-you";
	}
	//if page class name is Open day Inner west. 
	else if ( is_page('register-for-open-day-inner-west')) {

		$newLocation = "/inner-west-thank-you";
	}
	//if page class name is Open day inner west north. 
	else  if ( is_page('register-for-open-day-inner-west-north')) {

		$newLocation = "/inner-west-north-thank-you";
	}
	//if page class name is Open day inner city.
	else  if ( is_page('register-for-open-day-inner-city')) {
		
		$newLocation = "/inner-city-thank-you";
	}
	//if page class name is Open day lower north shore.
	else  if ( is_page('register-for-open-day-lower-north-shore')) {
		
		$newLocation = "/lower-north-shore-thank-you";
	}
	//if page class name is Open day ryde.
	else  if ( is_page('register-for-open-day-ryde')) {
		
		$newLocation = "/ryde-thank-you";
	}
	//if page class name is Open day eastern suburbs. 
	else  if ( is_page('register-for-open-day-eastern-suburbs')) {
		
		$newLocation = "/eastern-suburbs-thank-you";
	}
	//if page class name is Open day randwick 
	else  if ( is_page('register-for-open-day-randwick')) {
		
		$newLocation = "/randwick-thank-you";
	}
	//if page class name is Open day south eastern suburbs 
	else  if ( is_page('register-for-open-day-south-eastern-suburbs')) {
		
		$newLocation = "/south-eastern-suburbs-thank-you";
	}
	//if page class name is Open day auburn 
	else  if ( is_page('register-for-open-day-auburn')) {
		
		$newLocation = "/auburn-thank-you";
	}
	//if page class name is Open day lakemba 
	else  if ( is_page('register-for-open-day-lakemba')) {
		
		$newLocation = "/lakemba-thank-you";
	}
	//if page class name is Open day east hills 
	else  if ( is_page('register-for-open-day-east-hills')) {
		
		$newLocation = "/east-hills-thank-you";
	}
	//if page class name is Open day liverpool 
	else  if ( is_page('register-for-open-day-liverpool')) {
		
		$newLocation = "/liverpool-thank-you";
	}
	//if page class name is Open day west 
	else  if ( is_page('register-for-open-day-west')) {
		
		$newLocation = "/west-thank-you";
	}
	//if page class name is Open day outer west 
	else  if ( is_page('register-for-open-day-outer-west')) {
		
		$newLocation = "/outer-west-thank-you";
	}
	//if page class name is Open day sutherland shire 
	else  if ( is_page('register-for-open-day-sutherland-shire')) {
		
		$newLocation = "/sutherland-shire-thank-you";
	}
	//if page class name is Open day eastern shire 
	else  if ( is_page('register-for-open-day-eastern-shire')) {
		
		$newLocation = "/eastern-shire-thank-you";
	}
	//if page class name is Open day st George Hurstville 
	else  if ( is_page('register-for-open-day-st-george-hurstville')) {
		
		$newLocation = "/st-george-hurstville-thank-you";
	}
	//if page class name is Open day st George Bayside 
	else  if ( is_page('register-for-open-day-st-george-bayside')) {
		
		$newLocation = "/st-george-bayside-thank-you";
	}

	// if newLocation is not equal to null
	if($newLocation != " ")
	{ ?>
		<script>
			var location_var = "<?php echo $newLocation; ?>"; // assigning the PHP location variable to JS variable
			document.addEventListener( 'wpcf7mailsent', function( event ) {
			location = location_var;}, false );
		</script>

<?php
	}

	}
	add_action('wp_footer', 'cf7_footer_script');
