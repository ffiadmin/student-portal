<?php
//Include the necessary scripts
	$essentials->includeCSS("styles/main.css");
	$essentials->includeJS("//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js");
	$essentials->includeJS("scripts/main.superpackage.min.js");
	$essentials->includePluginClass("APIs/Cloudinary");
	
//Render the splash section of the page
	$count = 0;
	$splash = $wpdb->get_results("SELECT * FROM `ffi_sp_splash` ORDER BY `Order` ASC");
	
	echo "<section id=\"splash\">
<h2>Main Splash</h2>

<div class=\"ad-container\">
<div class=\"ad-contents\">
<ul>";

//Print out each of the splash items
	foreach ($splash as $item) {
		++$count;
				
		echo "
<li" . ($count == 1 ? " class=\"active\"" : "") . ">
<h3>" . $item->Title . "</h3>
";
		
		if ($item->ColumnOne == "") {
			echo "<div>
<h3>" . $item->Title . "</h3>
" . $item->ColumnTwo . "
</div>";
		} elseif ($item->ColumnTwo == "") {
			echo "<div>
<h3>" . $item->Title . "</h3>
" . $item->ColumnOne . "
</div>";
		} else {
			echo "<div class=\"splash-left\">
<h3>" . $item->Title . "</h3>
" . $item->ColumnOne . "
</div>
<div class=\"splash-right\">
" . $item->ColumnTwo . "
</div>";
		}
		
		echo "
</li>
";
	}
	
	$count = 0;

	echo "</ul>
</div>
</div>
    
<span class=\"nav left\">&#171;</span>
<span class=\"nav right\">&#187;</span>

<div class=\"button\">
<button>Show More</button>
</div>

<ul class=\"jewels\">";

//Print out each of the splash item jewels
	foreach ($splash as $item) {
		++$count;
		
		echo "
<li" . ($count == 1 ? " class=\"active\"" : "") . " data-background=\"" . htmlentities($item->BackgroundURL) . "\" style=\"background-image: url(" . htmlentities($item->IconURL) . ");\">Book Exchange</li>
";
	}
	
	echo "</ul>
</section>

";

//Render the social media section of the page
	echo "<article class=\"center content\" id=\"social\">
<header>
<h2>On campus, Twitter, and Facebook</h2>
<p>SGA is the primary communication link between students, faculty, and administration at Grove City College. We support the mission of the College by reviewing and commenting on College policy, directing College initiatives, supporting student activities, and hosting our own events for students.</p>
</header>

<article class=\"twitter-post\">
<h3>Recent Twitter Posts</h3>
<p>Nothing to display...</p>
</article>

<div class=\"center wrapper\">
<a class=\"page facebook\" href=\"https://www.facebook.com/pages/Student-Government-Association-at-Grove-City-College/149828851728032\" target=\"_blank\"></a>
<a class=\"page twitter\" href=\"https://twitter.com/sgaatgcc\" target=\"_blank\"></a>
</div>
</article>

";

//Render the organization events section of the page
	$count = 0;
	$events = $wpdb->get_results("SELECT * FROM `ffi_sp_events` WHERE `Time` > NOW() ORDER BY `Time` ASC");
	$formatter = new DateTime();

	echo "<article class=\"center content even\" id=\"calendar\">
<header>
<h2>SGA Calendar &amp; Events</h2>
</header>

<ul class=\"event-details\">";

	foreach ($events as $item) {
		++$count;
		$formatter = DateTime::createFromFormat("Y-m-d H:i:s", $item->Time);
		
		echo "
<li" . ($count == 1 ? " class=\"active\"" : "") . ">
<h3>" . $item->Title . "</h3>
<ul class=\"event-overview\">
<li class=\"date\"><time datetime=\"" . substr($item->Time, 0, -9) . "\">" . $formatter->format("F jS, Y") . "</time></li>
<li class=\"time\"><time datetime=\"" . $item->Time . "\">" . $formatter->format("g:i A") . "</time></li>
<li class=\"location\">" . $item->Location . "</li>
</ul>

" . $item->Description . "
";
	}
	
	$count = 0;

	echo "</ul>
	
<ul class=\"event-list\">";

	foreach ($events as $item) {
		++$count;
		
		echo "
<li" . ($count == 1 ? " class=\"active\"" : "") . ">
<p>" . $item->Title . "</p>
<time datetime=\"" . substr($item->Time, 0, -9) . "\">" . $formatter->format("F jS, Y") . "</time>	
</li>
";
	}

	echo "</ul>
	
<span class=\"nav left\">&#171;</span>
<span class=\"nav right\">&#187;</span>
</article>

";

//Render the help campus websites section of the page
	$links = $wpdb->get_results("SELECT * FROM `ffi_sp_links`");

	echo "<article class=\"center content\" id=\"links\">
<header>
<h2>Helpful Campus Websites</h2>
</header>

<h3>Student Life</h3>
<ul>
<li class=\"cafeteria-menu\">
<a href=\"" . $links[0]->CafeteriaMenu . "\" target=\"_blank\">
<p class=\"category\">Student Life</p>
<p class=\"title\">Cafeteria Menu</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->CafeteriaMenu, PHP_URL_SCHEME) . "://", "", $links[0]->CafeteriaMenu), "/") . "</p>
</a>
</li>

<li class=\"academic-calendar\">
<a href=\"" . $links[0]->AcademicCalendar . "\" target=\"_blank\">
<p class=\"category\">Student Life</p>
<p class=\"title\">Academic Calendar</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->AcademicCalendar, PHP_URL_SCHEME) . "://", "", $links[0]->AcademicCalendar), "/") . "</p>
</a>
</li>
    
<li class=\"organizations\">
<a href=\"" . $links[0]->CampusOrganizations . "\" target=\"_blank\">
<p class=\"category\">Student Life</p>
<p class=\"title\">Campus Organizations</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->CampusOrganizations, PHP_URL_SCHEME) . "://", "", $links[0]->CampusOrganizations), "/") . "</p>
</a>
</li>
    
<li class=\"organization-websites\">
<a href=\"" . $links[0]->OrganizationWebsites . "\" target=\"_blank\">
<p class=\"category\">Student Life</p>
<p class=\"title\">Organization Websites</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->OrganizationWebsites, PHP_URL_SCHEME) . "://", "", $links[0]->OrganizationWebsites), "/") . "</p>
</a>
</li>
    
<li class=\"student-directory\">
<a href=\"" . $links[0]->StudentDirectory . "\" target=\"_blank\">
<p class=\"category\">Student Life</p>
<p class=\"title\">Student Directory</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->StudentDirectory, PHP_URL_SCHEME) . "://", "", $links[0]->StudentDirectory), "/") . "</p>
</a>
</li>
    
<li class=\"campus-contact\">
<a href=\"" . $links[0]->CampusContact . "\" target=\"_blank\">
<p class=\"category\">Student Life</p>
<p class=\"title\">Campus Contact Information</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->CampusContact, PHP_URL_SCHEME) . "://", "", $links[0]->CampusContact), "/") . "</p>
</a>
</li>
</ul>
    
<h3>Academics</h3>
<ul>
<li class=\"office-hours\">
<a href=\"" . $links[0]->OfficeHours . "\" target=\"_blank\">
<p class=\"category\">Academics</p>
<p class=\"title\">Professor Office Hours</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->OfficeHours, PHP_URL_SCHEME) . "://", "", $links[0]->OfficeHours), "/") . "</p>
</a>
</li>
    
<li class=\"building-hours\">
<a href=\"" . $links[0]->BuildingHours . "\" target=\"_blank\">
<p class=\"category\">Academics</p>
<p class=\"title\">Building Operation Hours</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->BuildingHours, PHP_URL_SCHEME) . "://", "", $links[0]->BuildingHours), "/") . "</p>
</a>
</li>
    
<li class=\"department-websites\">
<a href=\"" . $links[0]->DepartmentWebsites . "\" target=\"_blank\">
<p class=\"category\">Academics</p>
<p class=\"title\">Department Websites</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->DepartmentWebsites, PHP_URL_SCHEME) . "://", "", $links[0]->DepartmentWebsites), "/") . "</p>
</a>
</li>
</ul>

<h3>Chapel</h3>
<ul>
<li class=\"chapel-schedule\">
<a href=\"" . $links[0]->ChapelSchedule . "\" target=\"_blank\">
<p class=\"category\">Chapel</p>
<p class=\"title\">Chapel Schedule</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->ChapelSchedule, PHP_URL_SCHEME) . "://", "", $links[0]->ChapelSchedule), "/") . "</p>
</a>
</li>

<li class=\"chapel-recordings\">
<a href=\"" . $links[0]->ChapelRecordings . "\" target=\"_blank\">
<p class=\"category\">Chapel</p>
<p class=\"title\">Chapel Recordings</p>
<p class=\"link\">" . rtrim(str_replace(parse_url($links[0]->ChapelRecordings, PHP_URL_SCHEME) . "://", "", $links[0]->ChapelRecordings), "/") . "</p>
</a>
</li>
</ul>
</article>

";

//Render the about us section
	$committee = "";
	$people = $wpdb->get_results("SELECT `Name`, `Committee`, `Title`, `ImageID` FROM `ffi_sp_people` LEFT JOIN `ffi_sp_committees` ON ffi_sp_people.CommitteeID = ffi_sp_committees.CommitteeID ORDER BY ffi_sp_committees.Position ASC, ffi_sp_people.Position ASC");
	$total = count($people);

	echo "<article class=\"center content even\" id=\"about\">
<header>
<h2>A Little Bit About Us</h2>
<p>We in the Student Government of Grove City College are here to be representatives for you, the Student Body. If you need to contact SGA for anything, feel free to e-mail us at <a href=\"mailto:sga@gcc.edu\">sga@gcc.edu</a>. Our main goals lie in supporting the mission of the College, serve as the primary communication link, act responsively to student needs, and achieve visible results.</p>
<p>We hope to be a representative government that strives for intellectual, moral, spiritual, and social development of the student body. SGA upholds the mission of the College, which is committed to Christian Truth, morals and freedom. We also provide an opportunity for direct effective student interaction with students, faculty and administration in matters relating to the college.</p>
</header>

<article class=\"snapshot\">
<h3>Facts</h3>

<ul>
<li>
<h4>1924</h4>
<p>Founded early in this history of Grove City College, SGA has been serving since 1924</p>
</li>

<li>
<h4>" . $total . "</h4>
<p>Through the years, SGA has grown to a team of " . $total . " highly-skilled " . ($total == 1 ? "mind" : "minds") . "</p>
</li>

<li>
<h4>Tuesday</h4>
<p>Our weekly senate meetings in HAL 310 are open to the public each Tuesday at 6:30 PM</p>
</li>
</ul>
</article>
";

	foreach($people as $person) {
		if ($person->Committee != $committee) {
			if ($committee != "") {
				echo "</ul>
";
			}
			
			echo "
<h3>" . $person->Committee . "</h3>
<ul class=\"people\">";
		}
		
		echo "
<li>
<img alt=\"" . htmlentities($person->Name) . "\" src=\"" . FFI\SP\Cloudinary::profile($person->ImageID) . "\">
<div>
<span class=\"name\">" . $person->Name . "</span>
<span class=\"position\">" . $person->Title . "</span>
</div>
</li>
";

		$committee = $person->Committee;
	}
	
	if ($committee != "") {
		echo "</ul>
";
	}
	
	echo "</article>";
?>