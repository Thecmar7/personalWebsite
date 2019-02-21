<?php
	include_once("../../resources/config.php");

	function DOMinnerHTML(DOMNode $element) 
	{ 
		$innerHTML = ""; 
		$children  = $element->childNodes;

		foreach ($children as $child) 
		{ 
			$innerHTML .= $element->ownerDocument->saveHTML($child);
		}

		return $innerHTML; 
	}

	// XKCD
	$currentXKCD = json_decode(file_get_contents("https://xkcd.com/info.0.json"));
	
	// sketch daily
	$sketchDailyObject = json_decode(file_get_contents("https://www.reddit.com/r/SketchDaily.json"));
	$todaysSketch = $sketchDailyObject->data->children[1]->data;
	$sketchSmallSelfText = ucfirst(explode("alt theme:", strtolower($todaysSketch->selftext))[0]);

	// Hacker News
	$hackerNewsData = file_get_contents("https://news.ycombinator.com/");
	$dom = new DOMDocument();
	$dom->loadHTML(explode('</table>', explode('<table border="0" cellpadding="0" cellspacing="0" class="itemlist">', $hackerNewsData)[1])[0]);
	$childNodeList = $dom->getElementsByTagName('td');
	$className = "title";
	$hackerNewsTop = "<ol>";
	$hackerAmount = 5;
	for($i = 0; $i < count($childNodeList); $i++) {
		$temp = $childNodeList->item($i);
		if (stripos($temp->getAttribute('class'), $className) !== false) {
			if ($temp->firstChild->nodeName == 'a') {
				$hackerNewsTop .= "<li><a href='" . $temp->firstChild->getAttribute('href'). "'>" . $temp->firstChild->textContent .  "</a></li>";
				$hackerAmount --;
				if ($hackerAmount == 0) {
					break;
				}
			}
		}
	}
	$hackerNewsTop.="</ol>";

	// daily programming
	$dailyChallengeData = json_decode(file_get_contents("https://www.reddit.com/r/dailyprogrammer.json"));
	$todaysChallenge = $dailyChallengeData->data->children[0]->data;
	$todaysChallendeLink = "<a href='" . $todaysChallenge->url . "'>" . $todaysChallenge->title ."</a>"; 


?>

<h2 class="ContentHeader">Home</h2>

<div id=mainContentContainer>
	<div id=hackerNews class=homeContentSection>
		 <a href='https://news.ycombinator.com/'><h3>Haker News</h3></a>   
		<p>The current top 5 articles</p>
		<div id=hackerNewsDisplay class="homeContentDiplay">
			<?=$hackerNewsTop?>
		</div>
	</div>

	<div id=XKCDContainer class=homeContentSection>
		 <a href='http://xkcd.com'><h3>XKCD</h3></a> 
		<p> Randal Monroe is one of my heros</p>
		<div id=XKCD class="homeContentDiplay">
			<div>
				<span><?=$currentXKCD->safe_title?>: <span class="infoDate"><?=$currentXKCD->month."/".$currentXKCD->day."/".$currentXKCD->year?></span></span>
				<img src=<?=$currentXKCD->img?> alt='<?echo($currentXKCD->alt)?>'/>
			</div>
		</div>
	</div>

	<div id=dailyProgrammerContainter class=homeContentSection>
		<a href="https://www.reddit.com/r/dailyprogrammer"><h3> Daily Programmer Challenge</h3> </a>
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

