<?php
// project.php
include("common.php");

$list = array(
	"Home" => "http://web.engr.oregonstate.edu/~smithcr/php/home.php",
    "Blog" => "http://web.engr.oregonstate.edu/~smithcr/new_web/blog_reader.php",
	"Projects" => "http://web.engr.oregonstate.edu/~smithcr/php/projects.php"
	);
$desc = "These are some projects that I have worked on. If you think this list is small you can also look at my GitHub. There you can find projects beyond just my web projects.";
header_part("Projects");
top_part($list, $desc);

?>
<body>
<div class="mid">
	<div id="web_dev">
	    <h2> Web Developement Projects</h2>
	        <a href="http://web.engr.oregonstate.edu/~smithcr/chores_app/chores.php">Chores</a>
	        <p>
	            Me and my roommates were dividing up chores, and we wanted a way to remind each other of 
	            the chores that needed to be done without going and finding the person. So I decided to 
	            make a little web application that would my roommates could go onto and they would be able 
	            to press a button with a particular chore label and a text would be sent to the person that 
	            is currently responsible for that chore this week.
	        </p>

	        <a href="http://web.engr.oregonstate.edu/~smithcr/cs_290/assignment4/gistList.html">gister lister</a>
	        <p>
	            This is a project that I had for CS 290 (web developement). It uses the git API to grab 
	            a lists of gists and parse them into a nice readable list. It also used the chache memory 
	            so that users can save their favorite ones.
	        </p>

	        <a href="http://web.engr.oregonstate.edu/~smithcr/cs_290/Final-Project-S15/src/login.php">CS 290 final project</a>
	        <p>
	            For the CS 290 final we could do whatever we wanted it just had to have a way for users to sign up
	            and use ajax to access databases. My teammates and I came up with a site where you could go and save
	            all your important sites. It was kind of a lame idea, but it works.
	        </p>

	        <a href="http://web.engr.oregonstate.edu/~smithcr/cs_290/How-to-Guide/page.html">Short Ruby on Rails overview</a>
	        <p>
	            We had to look at a web base frame work. My teammates and I decided to look at Ruby on Rails. It was really 
	            hard to summarize all of Ruby on Rails does in a week. I wrote all of the code parts. It was a 
	            good excercise.
	        </p>

	        <a href="http://web.engr.oregonstate.edu/~smithcr/cs_290/assignment6/src/video.php">Horizonatl Video</a>
	        <p>
	        	This was our database assignment. It was supposed to be a movie rental store management site. Now I sometimes use it to save my favorite movies. The CSS is tragic, but it is fun to see how 'far' I have come. 
	        </p>
	</div>
</div> 
<?php
	//bottom_part();
?>
</body>
