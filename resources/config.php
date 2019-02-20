<?php
header("Access-Control-Allow-Origin: https://www.cmar.tech/");

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
ini_set("log_errors", 1);
ini_set("error_log", "../tmp/php_error.log");
error_reporting(E_ALL|E_STRCT);

ini_set('display_errors', 1);
 
$config = array(
    "db" => array(
        // Don't have any database usage as of yet.
    ),
    "urls" => array(
		"baseUrl" => "https://www.cmar.tech",
		"facebook" => "https://www.facebook.com/cramers",
		"linkedin" => "https://www.linkedin.com/in/cramer-smith-8b829187",
		"twitter" => "https://twitter.com/TheCmar7",
		"github" => "https://github.com/Thecmar7"
	),
    "paths" => array(
		"resources" => "./resources",
		"blog" => array(
			"logic" => "./resources/library/blog", 
			"posts" => "/resources/library/blog_posts",
		),
		"school" => "./resources/library/blog",
        "images" => array(
            "content" => "https://".$_SERVER["HTTP_HOST"]."/images/content",
            "layout" => "https://".$_SERVER["HTTP_HOST"]."/images/layout"
		),
		"stylesheets" => "https://".$_SERVER["HTTP_HOST"]."/style_sheets",
		"javascript" => "https://".$_SERVER["HTTP_HOST"]."/js"
	),
	'bio' => "https://".$_SERVER["HTTP_HOST"].'/mainDisplays/bio.php',
	'projects' => "https://".$_SERVER["HTTP_HOST"].'/mainDisplays/projects.php',
	'home' => "https://".$_SERVER["HTTP_HOST"].'/mainDisplays/home.php',
	'blog' => "https://".$_SERVER["HTTP_HOST"].'/mainDisplays/blog.php',
	'resumePage' => "https://".$_SERVER["HTTP_HOST"].'/mainDisplays/resume.php',
	"resume" => "https://".$_SERVER["HTTP_HOST"]."/Resume/CramerSmithResume.pdf",
	"resumeRootPath" =>  $_SERVER["DOCUMENT_ROOT"]."/Resume/CramerSmithResume.pdf",
);
 

defined("LIBRARY")
    or define("LIBRARY", realpath(dirname(__FILE__) . '/library'));
     
defined("TEMPLATES")
    or define("TEMPLATES", realpath(dirname(__FILE__) . '/templates'));
 
 
?>