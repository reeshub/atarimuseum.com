<!DOCTYPE html>
<html>
<head>
<meta name="description" content="" />
 <meta charset="utf-8">
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/dark-hive/jquery-ui.min.css" id="theme">

 <script src="http://www.atarimuseum.com/archives/test/javascriptheader.js" type="text/javascript"></script> 
 <script src="http://www.atarimuseum.com/archives/test/jquery/bootstrapdropdown.min.js" type="text/javascript"></script> 
 <script src="https://www.google.com/recaptcha/api.js" type="text/javascript" async defer></script> 
 <link rel="stylesheet" href="http://www.atarimuseum.com/archives/test/schemas/bootstrap_darkly.min.css" type="text/css" />
 <link rel="stylesheet" href="http://www.atarimuseum.com/archives/test/schemas/bootstrapdark.min.css" type="text/css" />
 
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
        
        $("#loginsubmit").click(function(e){ e.preventDefault(); wsn_modallogin("http://www.atarimuseum.com/archives/test/contactform.php", e); });        
   
$(".submenus").hide(0);
 wsn_closeboxes(); 

        if ($("#searchauto").length) { $("#searchauto").autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=searchauto" }); }
        else if ($("[name=searchauto]").length) { $("[name=searchauto]").autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=searchauto" }); }

$('a.ajaxlink').click(function(e) { wsn_doajaxlink(e, this.href); });
$('a.ajaxdelete').click(function(e) { wsn_doajaxdelete(e, this.href, this.id); });
 
});

//]]>
</script>
<title>Atari Museum Archives Database: Contact Form</title>

<link rel="stylesheet" href="http://www.atarimuseum.com/archives/test/templates/styles/production/default.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://www.atarimuseum.com",
  "name": "Atari Archival Database"
}
</script>
<style type="text/css">
   .cke_editable { background-color: #000000; } 
  </style>
</head>
<body>

<header>

<div id="topcontainer" class="stickytop">

<div class="floatleft">
<div class="logobg"> </div>
<div class="logo"><a href="http://www.atarimuseum.com/archives/test"><img src="http://www.atarimuseum.com/archives/test/templates/images_default/newlogo.png" alt="Atari Archival Database" /></a></div>
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
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=172" class="btn btn-default">Business </a>
<div id="submenu172"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=4" class="btn btn-default">Communications <span class="badge">2</span></a>
<div id="submenu4"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=15" class="btn btn-default">DIsk Operating Systems <span class="badge">2</span></a>
<div id="submenu15"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=7" class="btn btn-default">Education </a>
<div id="submenu7"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=8" class="btn btn-default">Games & Entertainment <span class="badge">1</span></a>
<div id="submenu8"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=9" class="btn btn-default">Graphic Apps </a>
<div id="submenu9"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=10" class="btn btn-default">Home & Hobby </a>
<div id="submenu10"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=11" class="btn btn-default">Network & Internet </a>
<div id="submenu11"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=5" class="btn btn-default">Productivity <span class="badge">8</span></a>
<div id="submenu5"></div>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=171" class="btn btn-default">Programming Languages <span class="badge">2</span></a>
<a href="http://www.atarimuseum.com/archives/test/index.php?action=displaycat&amp;catid=14" class="btn btn-default">System Utilities </a>
<div id="submenu14"></div>
</div>
</nav>
</td>
<td>


<div class="nav">
<ol class="breadcrumb">  
<li><a href="http://www.atarimuseum.com/archives/test">Atari Museum Archives Database</a> </li>

<li class="active">Contact Form</li>
</ol>
</div>

<p>If you need to contact the website's <a href="index.php?action=leaders">administration</a>, you may submit this form to do so. An administrator will reply to you by email.</p>



<div class="panel panel-primary">
<div class="panel-heading tableheader"><h3 class="panel-title">Contact Form</h3></div>
<div class="panel-body">
<form action="contactform.php?filled=1" method="post" class="recaptchaform">
<table class="standardtable table">
<tr>
 <td class="labelscolumn"><span class="labels">Username (if applicable):</span></td> 
 <td class="optionscolumn"><input type="text" name="username" size="20" value="" /></td>
</tr>
<tr>
 <td class="labelscolumn"><span class="labels">Your E-Mail:</span></td>
 <td class="optionscolumn"><input type="email" name="email" size="20" value="" required /></td>
</tr>

<tr>
 <td class="labelscolumn"><span class="labels">Subject:</span></td>
 <td class="optionscolumn"><input type="text" name="title" size="50" value="" /></td>
</tr>
<tr>
 <td class="labelscolumn"><span class="labels">Your Message:</span></td>
 <td class="optionscolumn"><textarea name="message" rows="15" cols="75" class="posttextarea"></textarea></td>
</tr>
<tr>
 <td class="labelscolumn"><span class="labels">Spam Prevention:</span></td>
 <td class="optionscolumn">
<div class="g-recaptcha" data-sitekey="6Les3wsUAAAAAMUCz0WquwRO3aGmbC2KAPZ_HLwm"></div>
 </td>
</tr>


</table>
<button type="submit" class="bigbutton btn btn-lg btn-primary">Send E-Mail</button>
</form>
</div>
</div>

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

<li><a href="contactform.php" id="currenttab">Contact the Admin</a></li>

<li><a href="sitemap.php">Site Map</a></li>

</ul>




<p></p>

<div id="cookienotice" class="alert alert-info cookienotice">This website uses cookies to enhance your experience. Read our <a href="index.php?action=privacy">privacy policy</a> for details.</span> <a id="dismisscookienotice" class="dismisscookienotice">X</a>
</div>

</footer>
</body>
</html>