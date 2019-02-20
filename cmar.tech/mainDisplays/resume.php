<?php 

	include("../../resources/config.php");
	$filePath = $config['resume'];
	$fileServerPath = $config['resumeRootPath'];
?>

<h2 class="ContentHeader"> Resume </h2>

<div id=resumePDFArea>
	
	<embed src="<?=$filePath?>" width="800px" height="1100px" />
	<br>
	Last Updated: <span class=infoDate><?=date ("F d Y H:i:s.", filectime($fileServerPath))?></span>
	<a href="<?=$filePath?>">Download</a>
</div>

