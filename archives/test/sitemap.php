<!DOCTYPE html>
<html>
<head>
<meta name="description" content="" />
 <meta charset="utf-8">
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/dark-hive/jquery-ui.min.css" id="theme">

 <script src="/archives/test/javascriptheader.js" type="text/javascript"></script> 
 <script src="/archives/test/jquery/bootstrapdropdown.min.js" type="text/javascript"></script> 
 <link rel="stylesheet" href="/archives/test/schemas/bootstrap_darkly.min.css" type="text/css" />
 <link rel="stylesheet" href="/archives/test/schemas/bootstrapdark.min.css" type="text/css" />
 
<script type="text/javascript">
//<![CDATA[

jQuery(document).ready(function() {

$("#mobilemenubutton").click(function(e) {
$(".menuitems").toggle(500);
if ($(".navbar-nav").length) $(".navbar-nav > li:not(:first-child)").toggle();
});
$(".memuitems a").click(function(e) { $(".menuitems").hide(500); });

 $("#dismisscookienotice").click(function() { $("#cookienotice").hide(); wsn_makecookie("dismisscookienotice", "true", 365, "/"); });
  $('.dropdown-toggle').dropdown(); 
        $("#login").click(function(e){
        e.preventDefault();
            $("#loginmodal").css("display", "block").dialog({
      height: 400,
      width: 500,
      modal: true,
      closeText: '' });
      
        });
        
        $("#loginsubmit").click(function(e){ e.preventDefault(); wsn_modallogin("/archives/test/sitemap.php", e); });        
   
$(".submenus").hide(0);
 wsn_closeboxes(); 

        if ($("#searchauto").length) { $("#searchauto").autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=searchauto" }); }
        else if ($("[name=searchauto]").length) { $("[name=searchauto]").autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=searchauto" }); }

$('a.ajaxlink').click(function(e) { wsn_doajaxlink(e, this.href); });
$('a.ajaxdelete').click(function(e) { wsn_doajaxdelete(e, this.href, this.id); });
 
});

//]]>
</script>
<title>Atari Museum Archives Database: Site Map</title>

<link rel="stylesheet" href="/archives/test/templates/styles/production/default.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
   .cke_editable { background-color: #000000; } 
  </style>
</head>
<body>

<header>

<div id="topcontainer" class="stickytop">

<div class="floatleft">
<div class="logobg"> </div>
<div class="logo"><a href="/archives/test"><img src="/archives/test/templates/images_default/newlogo.png" alt="Atari Archival Database" /></a></div>
</div>

<div class="floatleft quicksearch largescreens">
<form action="search.php?filled=1&amp;condition=like&amp;whichtype=links" name="quicksearchform" method="post">
<span id="searchbox" class="searchboxcontainer">
<input type="search" name="search" size="25" id="searchauto" class="searchbox" placeholder="search listings" />
        <button class="btn btn-default btn-sm gobutton searchboxbutton" type="submit">Go</button>
<br><a href="search.php">+ Advanced Search</a>
</span>
</form>
</div>




<div id="toprightad"></div>

</div>

<div class="clear"></div>

<nav class="navbutton navbar navbar-default">
<ul class="nav navbar-nav">
<li><a id="mobilemenubutton">&#9776; Options</a></li>

</ul>
</nav>

<div class="clear"></div>

<div class="bigpad" id="loginmodal" style="display: none;" title="Login">
<form action="index.php?action=userlogin&amp;filled=1&amp;bypassredirect=1" method="post">

<div class="warning text-danger" id="loginproblem"></div>
Username<br><input type="text" name="username" id="loginname" class="giantinput" /><br>
Password<br><input type="password" name="userpassword" id="loginpassword" class="giantinput" /><br>
<button type="submit" id="loginsubmit" class="btn btn-default btn-lg bigbutton halfwide">Login</button>
<a href="index.php?action=userlogin">Forgot your password?</a>
</form>
</div>


</header>

<div class="main">




<table class="leftmenusitecontainer">
<tr>
<td class="leftmenuleft">
<nav class="categoryleftmenu">
<div class="btn-group-vertical" role="group" aria-label="...">
<a href="/archives/test/index.php?action=displaycat&amp;catid=172" class="btn btn-default">Business </a>
<div id="submenu172"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=4" class="btn btn-default">Communications <span class="badge">2</span></a>
<div id="submenu4"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=15" class="btn btn-default">DIsk Operating Systems <span class="badge">2</span></a>
<div id="submenu15"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=7" class="btn btn-default">Education </a>
<div id="submenu7"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=8" class="btn btn-default">Games & Entertainment <span class="badge">1</span></a>
<div id="submenu8"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=9" class="btn btn-default">Graphic Apps </a>
<div id="submenu9"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=10" class="btn btn-default">Home & Hobby </a>
<div id="submenu10"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=11" class="btn btn-default">Network & Internet </a>
<div id="submenu11"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=5" class="btn btn-default">Productivity <span class="badge">8</span></a>
<div id="submenu5"></div>
<a href="/archives/test/index.php?action=displaycat&amp;catid=171" class="btn btn-default">Programming Languages <span class="badge">2</span></a>
<a href="/archives/test/index.php?action=displaycat&amp;catid=14" class="btn btn-default">System Utilities </a>
<div id="submenu14"></div>
</div>
</nav>
</td>
<td>


<div class="nav">
<ol class="breadcrumb">  
<li><a href="/archives/test">Atari Museum Archives Database</a> </li>

<li class="active">Site Map</li>
</ol>
</div>

<ul class="sitemap">

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=172">Business</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=184">Accounting & Finance</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=173">Calculators & Converters</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=181">Calendars</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=174">Databases & Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=176">Inventory & Barcoding</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=177">Investment Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=178">Math & Scientific Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=180">Spreadsheets</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=179">Wordprocessors</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=4">Communications</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=45">BBS Programs</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=41">E-Mail Clients</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=50">Modems & Dialup</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=15">DIsk Operating Systems</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=170">Atari DOS</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=162">DOS XL</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=161">MyDOS</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=165">Other DOS</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=163">RDOS OSS DOS</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=164">SpartaDOS</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=7">Education</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=85">Computer</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=76">Dictionaries</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=77">Geography</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=78">Kids</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=79">Languages</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=80">Mathematics</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=81">Other</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=82">Reference Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=83">Science</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=84">Teaching & Training Tools</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=8">Games & Entertainment</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=99">Action</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=86">Adventure & Roleplay</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=87">Arcade</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=88">Board</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=89">Card</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=90">Casino & Gambling</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=91">Kids</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=92">Online Gaming</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=93">Other</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=94">Puzzle & Word Games</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=95">Simulation</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=96">Sports</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=97">Strategy & War Games</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=98">Tools & Editors</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=9">Graphic Apps</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=109">Animation Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=100">CAD</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=101">Converters & Optimizers</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=102">Editors</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=103">Font Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=104">Gallery & Cataloging Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=105">Icon Tools</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=106">Other</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=107">Screen Capture</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=108">Viewers</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=10">Home & Hobby</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=120">Astrology/Biorhythms/Mystic</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=110">Astronomy</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=111">Cataloging</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=112">Food & Drink</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=113">Genealogy</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=114">Health & Nutrition</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=117">Personal Interest</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=118">Recreation</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=119">Religion</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=11">Network & Internet</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=122">Browsers</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=125">FTP Clients</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=127">Other</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=5">Productivity</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=54">Artwork & Painting</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=63">Clocks & Alarms</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=52">Desktop Publishing</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=51">Fonts & Graphics</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=197">Manuals</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=55">Screen Savers: Cartoons</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=56">Screen Savers: Nature</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=57">Screen Savers: Other</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=58">Screen Savers: People</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=59">Screen Savers: Science</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=60">Screen Savers: Seasonal</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=61">Screen Savers: Vehicles</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=62">Themes & Wallpaper</a></li>

</ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=171">Programming Languages</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=14">System Utilities</a></li>

<ul><li><a href="/archives/test/index.php?action=displaycat&amp;catid=148">Backup & Restore</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=151">File & Disk Management</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=152">File Compression</a></li>

<li><a href="/archives/test/index.php?action=displaycat&amp;catid=155">Printer</a></li>

</ul></ul>

</td></tr></table>

<div class="clear"></div>

</div>

<div class="push"></div>

<footer class="footer panel-footer text-muted">
<div id="bottomarea">
<div id="languageandtheme">

 
</div>
<div id="categoryjump">
<form action="index.php?action=redirecttourl" method="POST">
<select name="catid">
 <option value="0">Choose Category</option>
 <option value="172"> Business</option><option value="184">- Accounting & Finance</option><option value="173">- Calculators & Converters</option><option value="181">- Calendars</option><option value="174">- Databases & Tools</option><option value="176">- Inventory & Barcoding</option><option value="177">- Investment Tools</option><option value="178">- Math & Scientific Tools</option><option value="180">- Spreadsheets</option><option value="179">- Wordprocessors</option><option value="4"> Communications</option><option value="45">- BBS Programs</option><option value="41">- E-Mail Clients</option><option value="50">- Modems & Dialup</option><option value="15"> DIsk Operating Systems</option><option value="170">- Atari DOS</option><option value="162">- DOS XL</option><option value="161">- MyDOS</option><option value="165">- Other DOS</option><option value="163">- RDOS OSS DOS</option><option value="164">- SpartaDOS</option><option value="7"> Education</option><option value="85">- Computer</option><option value="76">- Dictionaries</option><option value="77">- Geography</option><option value="78">- Kids</option><option value="79">- Languages</option><option value="80">- Mathematics</option><option value="81">- Other</option><option value="82">- Reference Tools</option><option value="83">- Science</option><option value="84">- Teaching & Training Tools</option><option value="8"> Games & Entertainment</option><option value="99">- Action</option><option value="86">- Adventure & Roleplay</option><option value="87">- Arcade</option><option value="88">- Board</option><option value="89">- Card</option><option value="90">- Casino & Gambling</option><option value="91">- Kids</option><option value="92">- Online Gaming</option><option value="93">- Other</option><option value="94">- Puzzle & Word Games</option><option value="95">- Simulation</option><option value="96">- Sports</option><option value="97">- Strategy & War Games</option><option value="98">- Tools & Editors</option><option value="9"> Graphic Apps</option><option value="109">- Animation Tools</option><option value="100">- CAD</option><option value="101">- Converters & Optimizers</option><option value="102">- Editors</option><option value="103">- Font Tools</option><option value="104">- Gallery & Cataloging Tools</option><option value="105">- Icon Tools</option><option value="106">- Other</option><option value="107">- Screen Capture</option><option value="108">- Viewers</option><option value="10"> Home & Hobby</option><option value="120">- Astrology/Biorhythms/Mystic</option><option value="110">- Astronomy</option><option value="111">- Cataloging</option><option value="112">- Food & Drink</option><option value="113">- Genealogy</option><option value="114">- Health & Nutrition</option><option value="117">- Personal Interest</option><option value="118">- Recreation</option><option value="119">- Religion</option><option value="11"> Network & Internet</option><option value="122">- Browsers</option><option value="125">- FTP Clients</option><option value="127">- Other</option><option value="5"> Productivity</option><option value="54">- Artwork & Painting</option><option value="63">- Clocks & Alarms</option><option value="52">- Desktop Publishing</option><option value="51">- Fonts & Graphics</option><option value="197">- Manuals</option><option value="55">- Screen Savers: Cartoons</option><option value="56">- Screen Savers: Nature</option><option value="57">- Screen Savers: Other</option><option value="58">- Screen Savers: People</option><option value="59">- Screen Savers: Science</option><option value="60">- Screen Savers: Seasonal</option><option value="61">- Screen Savers: Vehicles</option><option value="62">- Themes & Wallpaper</option><option value="171"> Programming Languages</option><option value="14"> System Utilities</option><option value="148">- Backup & Restore</option><option value="151">- File & Disk Management</option><option value="152">- File Compression</option><option value="155">- Printer</option>
</select>
<button type="submit" class="gobutton btn btn-default btn-sm">Go &#9658;</button>
</form>
</div>

<div class="clear"></div>
</div>

<ul class="menubullets">

<li><a href="contactform.php">Contact the Admin</a></li>

<li><a href="sitemap.php" id="currenttab">Site Map</a></li>

</ul>




<p></p>

<div id="cookienotice" class="alert alert-info cookienotice">This website uses cookies to enhance your experience. Read our <a href="index.php?action=privacy">privacy policy</a> for details.</span> <a id="dismisscookienotice" class="dismisscookienotice">X</a>
</div>

</footer>
</body>
</html>