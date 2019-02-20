
<?php    
    // load up your config file
	require_once("../resources/config.php");
	require_once(TEMPLATES . "/display.php");
   
	$display = new Display();
	
	$desc = "Hi, I am currently fixing my site. Sorry about it's current state.";

					
	$display->mainHeader('Cramer Smith', $desc);

	?>
	<div id=mainContent> 
		<?php

		?>
	</div>

	<?php

	$filename = __FILE__;
    $display->footer($filename);
?>