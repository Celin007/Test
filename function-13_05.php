add_action('wp_footer', 'asp_add_script_to_footer', 999999);
function asp_add_script_to_footer() {
	?>
	<script>
		
	jQuery(function($){
		$('.asp_option_label').each(function(){
			//alert($(this).text().trim());
			if ( $(this).text().trim() == 'Strand E - Morality and Justice' ) {
				$(this).addClass('strand-end');
				$(this).parent().attr("id","strand-end-parent");
			   $("#strand-end-parent").after("\n <div id='select-year'>Select by Year </div>");
			}
			if ( $(this).text().trim() == 'Year 7' ) {
				$(this).attr("id","year-bgn");
			}
			if ( $(this).text().trim() == 'Strand A - Scripture and Jesus' ) {
				$(this).addClass('strand-bgn');
				$(this).parent().attr("id","strand-bgn-parent");
			   $("#strand-bgn-parent").before("\n <div id='select-year'>Select by Strand </div>");
			}
			
		});
	});
			
			//$('').parent().before('<div id="theAppendedDiv">The Appended Div<div>');
//jQuery('#year-bgn').before('<div class="addme">Add Me!</div>');
			
		
	</script>

<?php
}


