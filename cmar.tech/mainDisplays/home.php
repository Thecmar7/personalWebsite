<?php
	include_once("../../resources/config.php");

	$currentXKCD = json_decode(file_get_contents("https://xkcd.com/info.0.json"));

?>

<h2 class="ContentHeader">Home</h2>

<div>
	<h3> <a href='http://xkcd.com'>XKCD</a> </h3>  randal Monroe is my hero
	<p><?=$currentXKCD->safe_title?>: <span class="infoDate"><?=$currentXKCD->month."/".$currentXKCD->day."/".$currentXKCD->year?></span></p>
	<img src=<?=$currentXKCD->img?> alt="<?echo($currentXKCD->alt)?>"/>
</div>

<div>

</div>