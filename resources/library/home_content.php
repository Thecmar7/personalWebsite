

    <?php

    //Get Sketch daily thing
     $dom = new DOMDocument('1.0', 'UTF-8');
	// set error level
	$internalErrors = libxml_use_internal_errors(true);
	
 	$dom->loadHTML(file_get_contents("https://old.reddit.com/r/SketchDaily/"));
 	$links = $dom->getElementsByTagName("a");

 	foreach ($links as $link) {
		//echo "0 " . $link->attributes->item(0)->value . " 1 " .  $link->attributes->item(1)->value . " 2 " .  $link->attributes->item(2)->value .  " 3 " .  $link->attributes->item(3)->value ."<br>";
 		if (strcmp((string) $link->attributes->item(3)->value, "1") == 0) {
			$sketchDaily = $link->nodeValue;
			$sketchDailyLink = $link->attributes->item(2)->value . " ";
			break;
		} 
	}

 	// Get Daily programmer 
    $dom->loadHTML(file_get_contents("https://old.reddit.com/r/dailyprogrammer/"));
    $links = $dom->getElementsByTagName("a");
	
 	foreach ($links as $link) {
 		if (strcmp((string) $link->attributes->item(3)->value, "1") == 0) {
 			$dailyChallengeTitle = $link->nodeValue . " ";
 			$dailyChallengeLink = $link->attributes->item(2)->value . " ";
 		 	break;
	 	} 
	 }
	 
	// Get Daily programmer 
	// $dom->loadHTML(file_get_contents("https://old.reddit.com/r/dailyprogrammer/"));
	// $links = $dom->getElementsByTagName("a");
	
	// foreach ($links as $link) {
	// 	if (strcmp((string) $link->attributes->item(3)->value, "1") == 0) {
	// 		$dailyChallengeTitle = $link->nodeValue . " ";
	// 		$dailyChallengeLink = $link->attributes->item(2)->value . " ";
	// 		break;
	// 	} 
	// }

	?>


		<div class="home_content_main">
			<div class="home_sub">
				<h3 class="home_content_h3">Websites I Frequent</h3>
				<div class="home_sub_content">
					<table id="CommonSites">
						<tbody>
							<tr>
								<th> Website </th>
								<th> Description </th>
							</tr>
							<tr>
								<td> <a href="https://waitbutwhy.com/">Wait But Why</a> </td>
								<td> Interesting blog about whatever.  </td>
							</tr>
							<tr>
								<td> <a href="https://findtheinvisiblecow.com/">Find the invisible Cow</a></td>
								<td> Never a waste of time. </td>
							</tr>
							<tr>
								<td> <a href="http://fuckinghomepage.com/">Fucking Home Page</a> </td>
								<td> A classic minimalist and useful website. </td>
							</tr>
							<tr>
								<td> <a href="https://www.twitch.tv/day9tv">Day[9]TV</a> </td>
								<td> The only online video media that I partake in. <span class="shame" title="I still have access to my parents netflix"> False. </span> </td>
							</tr>
						</tbody> 
					</table>
				</div>
			</div>

			<div class="home_sub">
				<h3 class="home_content_h3"><a class="home_title_anchor" href="https://news.ycombinator.com/">Hacker News</a> The Top 10 Articles</h3>
				<div class="home_sub_content">
					<div class="internet_thing">
						
						<?php
							$hacker_news = explode("<td class=\"title\">", file_get_contents("https://news.ycombinator.com/"));
							echo "<ol>";
							for ($i = 1; $i <= 10; $i++) {
								$n1 = explode("<span class=", $hacker_news[$i])[0];
								//$n1 = insertText(2, $n1, " target=\"_blank\" ");
							 	echo "<li>" . $n1 . "</li>";
							}
							echo "</ol>"		
						?>
					</div>
				</div>
			</div>
			<div class="home_sub">
				<h3 class="home_content_h2"><a  class="home_title_anchor" href="https://xkcd.com/">XKCD</a> Randall Monroe is a genius and my hero.</h3>
				<div class="home_sub_content">
					<div id="comic" >
							<?php
								echo explode("</div>", explode("<div id=\"comic\">", file_get_contents("https://xkcd.com"), 2) [1] ) [0];
							?>
							
						</div>
						<script>
							if ((document.getElementById("comic").clientHeight / document.getElementById("comic").clientWidth) >  1.0) {
								console.log((document.getElementById("comic").clientHeight / document.getElementById("comic").clientWidth));
								document.getElementById("comic").style="width:60%";
							}
						</script>
					</div>
				</div>
			</div>
			<!-- <div class="home_sub">
				<h2 class="home_content_h2">Websites I Frequent</h2>
				<div class="home_sub_content">
					
				</div>
			</div>			 -->
		</div>

<?php


	//echo "hi";

// 	// Get Campaign Podcast
// 	$html = file_get_contents("http://oneshotpodcast.com/category/campaign/campaign-podcast/");
//     $dom->loadHTML($html);

//     $links = $dom->getElementsByTagName("a");
//     foreach ($links as $link) {
// 		if (strcmp((string) $link->getAttribute("rel"), "bookmark") == 0) {
// 			$campaign_title = $link->textContent;
// 			break;
// 	 	} 
// 	}
//     $links = $dom->getElementsByTagName("div");
// 	foreach ($links as $link) {
// 		if (strcmp((string) $link->getAttribute("class"), "powerpress_player") == 0) {
// 			$campaign_podcast = $link->ownerDocument->saveHTML($link);
// 			break;
// 	 	} 
// 	}

// 	// Get Up First podcast
// 	$html = file_get_contents("https://www.npr.org/podcasts/510318/up-first");
//    	$dom->loadHTML($html);

//    	$links = $dom->getElementsByTagName("input");
//    	foreach ($links as $link) {
// 		if (strcmp((string) $link->getAttribute("class"), "embed-url embed-url-no-touch") == 0) {
// 			$up_first = $link->getAttribute("value");
// 			break;
// 	 	} 
// 	}
	
// 	$up_first = explode("290", $up_first);
// 	$up_first[0] = $up_first[0] . "210";
// 	$up_first = join($up_first);
	
// 	// // Get Fictional podcast
// 	// $html_fictional = file_get_contents("http://fictional.libsyn.com/rss");
// 	// //echo $html;
// 	// $dom->loadHTML($html_fictional);
// 	// $links = $dom->getElementsByTagName('enclosure');
// 	// foreach( $links as $link) {
//     //  	$fictional_src = $link->getAttribute("url");
//     //  	break;
// 	// }

// 	//echo $fictional_src;
// 	//$html_fictional = file_get_contents($fictional_src);
// 	//echo $html_fictional;

// 	// Restore error level
// 	// libxml_use_internal_errors($internalErrors);

// 	// 	// Site truly begins 
//     //     $links = array(
//     //         "Home" => "/Main/home.php",
//     //         "Blog" => "/new_web/blog_reader.php",
//     //         "Projects" => "/Main/projects.php",
//     //         "Resume" => "/resources/CramerSmithResume.pdf"
//     //         );
//     //     $desc = "Welcome to my website my name is Cramer Smith. 
//     //         I am currently studying applied computer science at Oregon State University with a focus in Security.";

//     //     top_part($links, $desc);

    