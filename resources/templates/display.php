<?php 


class Display 
{

	/**
	 * siteHeader
	 * 
	 * builds the site header for for all the pages
	 *
	 * @param string $title
	 *
	 * @return void
	 */
	private function htmlHeader(string $title) {
		global $config;
		?>
		<!DOCTYPE html>
		<html>

			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<title><?=$title?></title>
				<link type="text/css" rel="stylesheet" href="<?=$config['paths']['stylesheets']."/main.css"?>"/>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.3/dist/sweetalert2.all.min.js"></script>
				<script src="<?=$config['paths']['javascript']."/home.js"?>"></script>

				<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.5/styles/default.min.css">
				<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.5/highlight.min.js"></script>
				<script>
					hljs.initHighlightingOnLoad();
					hljs.configure({tabReplace: '  '});
				</script>
			</head>

			<body>
		<?php
	}

	/**
	 * mainHeader
	 *
	 * 	Displays the Header
	 * 
	 * @param string $title
	 * @param string $description
	 *
	 * @return void
	 */
	public function mainHeader(string $title, string $description = '') 
	{	
		global $config;
		$this->htmlHeader($title);
		?>
	
		<div id="mainHeader">
			<div id=headerImageContainer>
				<img id=headerMainImage src='<?=$config['paths']['images']['content'] . "/handome_young_man.jpg"?>' alt="Handsome Young Man">
			</div>
			<div id=headerTextContainer>
				<span><h1 id="headerTitle"><?=$title?></h1></span>
				
				<p id="headerDescription"> 
					<?=$description?>
				</p>

				<div class="header_social">
					<a class='socialLink' href=<?=$config['urls']['linkedin']?>> <img src=https://cmar.tech/images/layout/linkedinRecroppedLogo-5292ff.png alt="LinkedIn"></a>
					<a class='socialLink' href=<?=$config['urls']['github']?>><img src="https://cmar.tech/images/layout/GitHub-Mark-120px-plus-5292ff.png"></a>
					<a class='socialLink' href=<?=$config['urls']['twitter']?>><img src=https://cmar.tech/images/layout/twitter-5292ff.png alt="Twitter"></a>
				</div>

				<div id=navButtonsContainer>
					<nav>
						<button id=homeButton class='navigationButton' value=<?=$config['home']?>>Home</button>
						<button class='navigationButton' value=<?=$config['bio']?>>About Me</button>
						<button class='navigationButton' value=<?=$config['projects']?>>Projects</button>
						<button class='navigationButton' value=<?=$config['resumePage']?>>Resume</button>
						<button class='navigationButton' value=<?=$config['blog']?>>Blog</button>
					</nav>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php
	}
	




	/**
	 * mainView
	 *
	 * 	displays the main view.
	 * 
	 * @param DOMDocument $dom
	 * @param string $HTML
	 *
	 * @return void
	 */
	public function mainView(DOMDocument $dom = NULL, string $HTML = "") 
	{
		$displayed = '';
		if ($dom == NULL) {
			$displayed = $HTML;
		} else {
			$displayed = $dom->saveHTML();
		}

		?>
		<div id=mainContent>
			<?=$displayed?>
		</div>
		<?php
	}

	public function twitterFeed() {
		?>
		<a class="twitter-timeline" href="https://twitter.com/TheCmar7?ref_src=twsrc%5Etfw">Tweets by TheCmar7</a> 
		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<?php
	}




	/**
	 * projects
	 *
	 * @return void
	 */
	public function projects() {
		?>
			<table>
				<tbody>
					<tr>
						<td><a>Bible Reader</a></td>
						<td><p>Description </p></td>
						<td><a>GitHub</a></td>
					</tr>
					<tr>
						<td><a>Master Mind</a></td>
						<td><p>Description </p></td>
						<td><a>GitHub</a></td>
					</tr>
					<tr>
						<td><a>Bible Reader</a></td>
						<td><p>Description </p></td>
						<td><a>GitHub</a></td>
					</tr>
				</tbody>
			</table>
		<?php
	}


	/**
	 * footer
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function footer(string $filename) 
	{
		global $config;

		?>
			<div id=mainFooter>
				<div class="header_social">
					<a class='socialLink' href=<?=$config['urls']['linkedin']?>> <img src=https://cmar.tech/images/layout/linkedinRecroppedLogo-5292ff.png alt="LinkedIn"></a>
					<a class='socialLink' href=<?=$config['urls']['github']?>><img src="https://cmar.tech/images/layout/GitHub-Mark-120px-plus-5292ff.png"></a>
					<a class='socialLink' href=<?=$config['urls']['twitter']?>><img src=https://cmar.tech/images/layout/twitter-5292ff.png alt="Twitter"></a>
				</div>
				<div>
					<table id=contactTable>
						<tbody>
							<tr> 
								<td class="col1"> <h4>Email:</h4> </td>
								<td> cramer.s.smith [at] gmail.com </td>
							</tr>
							<!-- <tr>
								<td class="col1"> <h4>Phone:</h4> </td>	
								<td> 2 x 1801020163 </td>
							</tr> -->
						</tbody>
					</table>
				</div>

				<div id=apiList>
					<h4 id=footerAPISubheader>Tools Used:</h4>
					<nav id=footerAPILinks>
						<a class=footerAPILink href="https://highlightjs.org">HighLighter.js</a>
						<a class=footerAPILink href="https://www.google.com/analytics/">Google Analytics</a>
						<a class=footerAPILink href="https://jquery.com/">jQuery</a>
						<a class=footerAPILink href="https://sweetalert2.github.io/">SweetAlert2</a>
					</nav>
				</div>

				
				<div id=modifiedDateDisplay>
					Site Last Modified: <span class=infoDate> <?=date ("F d Y H:i:s.", filemtime($filename))?> </span>
				</div>
			</div>			
		</body>
		<?php
	}	
}

