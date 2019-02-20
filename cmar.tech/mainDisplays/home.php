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
	$sketchSmallSelfText = explode("Alt theme:", $todaysSketch->selftext)[0];

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
				$hackerNewsTop .= "<li>" . DOMinnerHTML($temp) . "</li>";
				$hackerAmount --;
				if ($hackerAmount == 0) {
					break;
				}
			}
		}
	}
	$hackerNewsTop.="<ol>";



?>
	
<h2 class="ContentHeader">Home</h2>

<div id=mainContentContainer>
	<div id=hackerNews class=homeContentSection>
		<h3> <a href='https://news.ycombinator.com/'>Haker News</a> </h3>  
		<p>The current top 5 articles</p>
		<div id=hackerNewsDisplay class="homeContentDiplay">
			<?=$hackerNewsTop?>
		</div>
	</div>

	<div id=XKCD class=homeContentSection>
		<h3> <a href='http://xkcd.com'>XKCD</a> </h3> 
		<p> Randal Monroe is one of my heros</p>
		<div id=XKCDDisplay class="homeContentDiplay">
			<div>
				<span><?=$currentXKCD->safe_title?>: <span class="infoDate"><?=$currentXKCD->month."/".$currentXKCD->day."/".$currentXKCD->year?></span></span>
				<img src=<?=$currentXKCD->img?> alt='<?echo($currentXKCD->alt)?>'/>
			</div>
		</div>
	</div>

	<div id=sketchDaily class=homeContentSection>
		<h3> Sketch Daily: <a href="<?=$todaysSketch->url?>"><?=$todaysSketch->title?></a> </h3>
		<div id=sketchDaily class="homeContentDiplay">
			<span><?=$sketchSmallSelfText?></span>
		</div>
	</div>
</div>

