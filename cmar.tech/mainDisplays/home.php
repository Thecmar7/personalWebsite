<?php
	include_once("../../resources/config.php");

	function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
            else return FALSE;
    }

	// XKCD
	$currentXKCD = json_decode(curl_get_file_contents("https://xkcd.com/info.0.json"));

	// sketch daily

	$sketchDailyObject = json_decode(curl_get_file_contents("https://www.reddit.com/r/SketchDaily.json"));
	$todaysSketch = $sketchDailyObject->data->children[1]->data;
	$sketchSmallSelfText = ucfirst(explode("alt theme:", strtolower($todaysSketch->selftext))[0]);

	// Hacker News
	$context = stream_context_create(array('http' => array('header'=>'Connection: close\r\n')));
	$hackerNewsData = curl_get_file_contents("https://news.ycombinator.com/");
	$doc = new DOMDocument();
	$doc->loadHTML(explode('</table>', explode('<table border="0" cellpadding="0" cellspacing="0" class="itemlist">', $hackerNewsData)[1])[0]);
	$childNodeList = $doc->getElementsByTagName('td');
	$className = "title";
	$hackerNewsTop = "<ol>";
	$hackerAmount = 5;
	for($i = 0; $i < count($childNodeList); $i++) {
		$temp = $childNodeList->item($i);
		if (stripos($temp->getAttribute('class'), $className) !== false) {
			if ($temp->firstChild->nodeName == 'a') {
				$title = ($temp->firstChild->textContent);
				$title = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $title);
				$URL = $temp->firstChild->getAttribute('href');
				
				$hackerNewsTop .= "<li><a href='" . $URL . "' target='_blank'>" . $title .  "</a></li>";
				$hackerAmount --;
				if ($hackerAmount == 0) {
					break;
				}
			}
		}
	}
	$hackerNewsTop.="</ol>";

	// daily programming
	$dailyChallengeData = json_decode(curl_get_file_contents("https://www.reddit.com/r/dailyprogrammer.json"));
	$todaysChallenge = $dailyChallengeData->data->children[0]->data;
	$todaysChallendeLink = "<a href='" . $todaysChallenge->url . "'>" . $todaysChallenge->title ."</a>"; 

	// TODO: Grab a podcast from an RSS feed
	//  

?>

<h2 class="ContentHeader">Home</h2>

	<div id=hackerNews class=homeContentSection>
		<h3>
			<a href='https://news.ycombinator.com/'>Hacker News</a>   
		</h3>
		<p>The current top 5 articles</p>
		<div id=hackerNewsDisplay class="homeContentDiplay">
			<?=$hackerNewsTop?>
		</div>
	</div>

	<div id=XKCDContainer class=homeContentSection>
		<h3>
			<a href='http://xkcd.com'>XKCD</a> 
		</h3>
		<div id=XKCD class="homeContentDiplay">
			<p> Randal Monroe is one of my heros</p>
			<div>
				<span><?=$currentXKCD->safe_title?>: <span class="infoDate"><?=$currentXKCD->month."/".$currentXKCD->day."/".$currentXKCD->year?></span></span>
				<img src=<?=$currentXKCD->img?> alt='<?echo($currentXKCD->alt)?>'/>
				<br><h4>Alt Text:</h4><span><?echo($currentXKCD->alt)?></span>
			</div>
		</div>
	</div>

	<div id=dailyProgrammerContainter class=homeContentSection>
		<h3>
			<a href="https://www.reddit.com/r/dailyprogrammer">Daily Programmer Challenge</a>
		</h3>
		<div id=dailyProgrammer class="homeContentDiplay">
			<span><?=$todaysChallendeLink?></span>
		</div>
	</div>

	<div id=sketchDailyContainter class=homeContentSection>
		<h3 id=sketchDailyHeader>Sketch Daily: <a id=sketchDailyLinkHeader href="<?=$todaysSketch->url?>"><h3><?=$todaysSketch->title?></h3></a></h3>
		<div id=sketchDaily class="homeContentDiplay">
			<span><?=$sketchSmallSelfText?></span>
		</div>
	</div>
</div>

