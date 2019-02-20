<?php
// common.php
	// function header_part($title) {
	// 	?>
	<!-- // 	<head>
	//         <title><?=//$title?></title>
	//         <link type="text/css" rel="stylesheet" href="../style_sheets/common.css" />
	//         <link type="text/css" rel="stylesheet" href="../style_sheets/home.css"  />
	        
	//         <script type="text/javascript" src="../Javascript/home.js"></script>

	//     </head> -->
	// 	<?php
	// }


	function top_part($links, $desc) {
		?>
		<div id="top_part">
	        <h1>Cramer Smith</h1>
	        <p>     
	            <?=$desc?>
	        </p>
	        
	        <nav>
	        <?php
	        	foreach ($links as $title => $link) { 
	        	?>
	            	<a href=<?=$link?>><div class="header_button"><?=$title?></div></a>
	        	<?php
	        	}
	        ?>
	        </nav>
	        <div id="top_social">
                <a href="https://www.linkedin.com/in/cramer-smith-8b829187"><img src="/new_web/pictures/images/linkedin_pixel.png" alt="LinkedIn"></a>
                <a href="https://github.com/Thecmar7"><img src="/new_web/pictures/images/github_pixel.png" alt="GitHub"></a>
                <a href="https://www.facebook.com/cramers"><img src="/new_web/pictures/images/facebook_pixel.png" alt="Facebook"></a>
                <a href="https://twitter.com"><img src="/new_web/pictures/images/twitter_pixel.png" alt="Twitter"></a>
            </div>
	    </div>
	<?php	
	}
	
	function insertText($index, $s1, $s2) {
		$ret = str_split($s1);
		array_splice($ret, $index, 0, $s2);
		$ret = join($ret);
		return $ret;
	}

	function bottom_part() {
		?>
		<div>
			<h3>APIs used</h3>
			<a href="https://highlightjs.org">highlighter.js</a>
			<a href="https://www.google.com/analytics/">google analytics</a>
		</div>
		<?php
	}
?>