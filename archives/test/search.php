<!DOCTYPE html>
<html>
<head>
<meta name="description" content="" />
 <meta charset="utf-8">
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/dark-hive/jquery-ui.min.css" id="theme">

 <script src="http://www.atarimuseum.com/archives/test/javascriptheader.js" type="text/javascript"></script> 
 <script src="http://www.atarimuseum.com/archives/test/jquery/bootstrapdropdown.min.js" type="text/javascript"></script> 
 <link rel="stylesheet" href="http://www.atarimuseum.com/archives/test/schemas/bootstrap_darkly.min.css" type="text/css" />
 <link rel="stylesheet" href="http://www.atarimuseum.com/archives/test/schemas/bootstrapdark.min.css" type="text/css" />
 
<script type="text/javascript">
//<![CDATA[

jQuery(document).ready(function() {

$("[name=countrysearch]").change(function() { wsn_updatestate($(this).val()); });
if($("[name=statesearch]").attr("selectedIndex") == 0) wsn_updatestate($("[name=countrysearch]").val());

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
        
        $("#loginsubmit").click(function(e){ e.preventDefault(); wsn_modallogin("http://www.atarimuseum.com/archives/test/search.php", e); });        
   
$(".datepicker").datepicker({ dateFormat: "yy/mm/dd", dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], firstDay: 0 });
$(".submenus").hide(0);
 wsn_closeboxes(); 

        if ($("#searchauto").length) { $("#searchauto").autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=searchauto" }); }
        else if ($("[name=searchauto]").length) { $("[name=searchauto]").autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=searchauto" }); }

        if ($("#namesearch").length) sel = "#namesearch"; else sel = "[name=namesearch]";
        $(sel).autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=tablesearch&tablename=categories&field=name" });

        if ($("#citysearch").length) sel = "#citysearch"; else sel = "[name=citysearch]";
        $(sel).autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=tablesearch&tablename=links&field=city" });

        if ($("#titlesearch").length) sel = "#titlesearch"; else sel = "[name=titlesearch]";
        $(sel).autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=tablesearch&tablename=links&field=title" });

        if ($("#posternamesearch").length) sel = "#posternamesearch"; else sel = "[name=posternamesearch]";
        $(sel).autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=tablesearch&tablename=comments&field=postername" });

        if ($("#locationsearch").length) sel = "#locationsearch"; else sel = "[name=locationsearch]";
        $(sel).autocomplete({ source: "/archives/test/ajax.php?type=autocomplete&action=tablesearch&tablename=members&field=location" });

$('a.ajaxlink').click(function(e) { wsn_doajaxlink(e, this.href); });
$('a.ajaxdelete').click(function(e) { wsn_doajaxdelete(e, this.href, this.id); });
 
});

function showsearchurl()
{
 $("[name=searchurl]").css("display", "block").select();
}


function wsn_updatestate(country)
{
 if (country == "United States") 
 {
  $("[name=statesearch]").empty().append("<option value=\"\"></option><option value=\"Alabama\">Alabama</option><option value=\"Alaska\">Alaska</option><option value=\"American Samoa\">American Samoa</option><option value=\"Arizona\">Arizona</option><option value=\"Arkansas\">Arkansas</option><option value=\"California\">California</option><option value=\"Colorado\">Colorado</option><option value=\"Connecticut\">Connecticut</option><option value=\"Delaware\">Delaware</option><option value=\"District Of Columbia\">District Of Columbia</option><option value=\"Federated States Of Micronesia\">Federated States Of Micronesia</option><option value=\"Florida\">Florida</option><option value=\"Georgia\">Georgia</option><option value=\"Guam\">Guam</option><option value=\"Hawaii\">Hawaii</option><option value=\"Idaho\">Idaho</option><option value=\"Illinois\">Illinois</option><option value=\"Indiana\">Indiana</option><option value=\"Iowa\">Iowa</option><option value=\"Kansas\">Kansas</option><option value=\"Kentucky\">Kentucky</option><option value=\"Louisiana\">Louisiana</option><option value=\"Maine\">Maine</option><option value=\"Marshall Islands\">Marshall Islands</option><option value=\"Maryland\">Maryland</option><option value=\"Massachusetts\">Massachusetts</option><option value=\"Michigan\">Michigan</option><option value=\"Minnesota\">Minnesota</option><option value=\"Mississippi\">Mississippi</option><option value=\"Missouri\">Missouri</option><option value=\"Montana\">Montana</option><option value=\"Nebraska\">Nebraska</option><option value=\"Nevada\">Nevada</option><option value=\"New Hampshire\">New Hampshire</option><option value=\"New Jersey\">New Jersey</option><option value=\"New Mexico\">New Mexico</option><option value=\"New York\">New York</option><option value=\"North Carolina\">North Carolina</option><option value=\"North Dakota\">North Dakota</option><option value=\"Northern Mariana Islands\">Northern Mariana Islands</option><option value=\"Ohio\">Ohio</option><option value=\"Oklahoma\">Oklahoma</option><option value=\"Oregon\">Oregon</option><option value=\"Palau\">Palau</option><option value=\"Pennsylvania\">Pennsylvania</option><option value=\"Puerto Rico\">Puerto Rico</option><option value=\"Rhode Island\">Rhode Island</option><option value=\"South Carolina\">South Carolina</option><option value=\"South Dakota\">South Dakota</option><option value=\"Tennessee\">Tennessee</option><option value=\"Texas\">Texas</option><option value=\"Utah\">Utah</option><option value=\"Vermont\">Vermont</option><option value=\"Virgin Islands\">Virgin Islands</option><option value=\"Virginia\">Virginia</option><option value=\"Washington\">Washington</option><option value=\"West Virginia\">West Virginia</option><option value=\"Wisconsin\">Wisconsin</option><option value=\"Wyoming\">Wyoming</option>");
  $("#americanstate").show();
  $("#foreignstate").hide();
 }
 else
 {
  $("#americanstate").hide();
  $("#foreignstate").show();
 }
}

//]]>
</script>
<title>Atari Museum Archives Database: Search</title>

<link rel="stylesheet" href="http://www.atarimuseum.com/archives/test/templates/styles/production/default.css" type="text/css" />
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
<div class="logo"><a href="http://www.atarimuseum.com/archives/test"><img src="http://www.atarimuseum.com/archives/test/templates/images_default/newlogo.png" alt="Atari Archival Database" /></a></div>
</div>

<div class="floatleft quicksearch largescreens">
<form action="search.php?filled=1&amp;condition=like&amp;whichtype=links" name="quicksearchform" method="post">
<span id="searchbox" class="searchboxcontainer">
<input type="search" name="search" size="25" id="searchauto" class="searchbox" placeholder="search listings" />
        <button class="btn btn-default btn-sm gobutton searchboxbutton" type="submit">Go</button>
<br><a href="search.php" id="currenttab">+ Advanced Search</a>
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

<li class="active">Search</li>
</ol>
</div>

<div class="box panel panel-default">
<div class="boxtitle panel-heading" onclick="wsn_minmax('quickbox')"><h3 class="panel-title">Quick Search</h3></div>
<div id="quickbox" class="boxbody panel-body">
<form action="search.php" method="GET">
<input type="hidden" name="condition" value="like">
<input type="hidden" name="filled" value="1">
<input type="search" name="search" class="standardinput" />

<select name="whichtype">
 <option value="links">search listings</option>
 <option value="all">search all</option>
</select>
<button type="submit" class="gobutton btn btn-default btn-sm">Search</button>
</form>
</div>
</div>

<p><span class="labels">Advanced Search</span></p>

<p>Leave fields blank where you don't wish to filter by that field.</p>

<div class="box panel panel-default">
<div class="boxtitle panel-heading" onclick="wsn_minmax('linksbox')"><h3 class="panel-title">Find Listings</h3></div>
<div id="linksbox" class="boxbody panel-body">
<form action="search.php" method="GET">
<input type="hidden" name="action" value="filter">
<input type="hidden" name="filled" value="1">
<input type="hidden" name="whichtype" value="links">
<div class="searchleftcol">
Find listings where
<table>


<tr id="search_title">
 <td>Title</td>
 <td>
<select name="titlecondition">
 <option value="like">contains</option>
 <option value="or">has any of the words</option>
 <option value="and">has all of the words</option>

 <option value="=">is exactly</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select>

 </td>
 <td>
<input type="text" class="standardinput" name="titlesearch" />
 </td>
</tr>



<tr id="search_description">
 <td>Description</td>
 <td>
<select name="descriptioncondition">
 <option value="like">contains</option>
 <option value="or">has any of the words</option>
 <option value="and">has all of the words</option>

 <option value="=">is exactly</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select>

 </td>
 <td>
<input type="text" class="standardinput" name="descriptionsearch" />
 </td>
</tr>



<tr id="search_program_os_support">
 <td>Operating System Support</td>
 <td>
<input type="hidden" name="program_os_supportcondition" value="like">
contains

 </td>
 <td>
<select name="program_os_supportsearch"><option value=""></option><optgroup label="Atari 8bits">
<option value="400/800">400/800</option>
<option value="XL">XL</option>
<option value="XE">XE</option>
</optgroup>
<optgroup label="Atari ST">
<option value="520/1040ST">520/1040ST</option>
<option value="Mega ST">Mega ST</option>
<option value="STE">STE</option>
<option value="TT030">TT030</option>
<option value="Falcon030">Falcon030</option>
</optgroup></select>

 </td>
</tr>



<tr id="search_program_system_requirements">
 <td>System Requirements</td>
 <td>
<select name="program_system_requirementscondition">
 <option value="like">contains</option>
 <option value="or">has any of the words</option>
 <option value="and">has all of the words</option>

 <option value="=">is exactly</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select>

 </td>
 <td>
<input type="text" class="standardinput" name="program_system_requirementssearch" />
 </td>
</tr>



<tr id="search_program_type">
 <td>Program Type</td>
 <td>
<input type="hidden" name="program_typecondition" value="=">
is

 </td>
 <td>
<select name="program_typesearch"><option value=""></option>
   <option value="Freeware">Freeware</option>
   <option value="Demo">Demo</option>
   <option value="Commercial">Commercial</option>
   <option value="Manual">Manual</option></select>

 </td>
</tr>



<tr id="search_program_language">
 <td>Program Languages</td>
 <td>
<select name="program_languagecondition">
 <option value="like">contains</option>
 <option value="or">has any of the words</option>
 <option value="and">has all of the words</option>

 <option value="=">is exactly</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select>

 </td>
 <td>
<input type="text" class="standardinput" name="program_languagesearch" />
 </td>
</tr>



<tr id="search_hitsin">
 <td>Incoming Clicks</td>
 <td>
<select name="hitsincondition">
 <option value="&gt;">is greater than</option>
 <option value="&lt;">is less than</option>

 <option value="=">is exactly</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select>

 </td>
 <td>
<input type="text" class="standardinput" name="hitsinsearch" />
 </td>
</tr>




</table>
</div>
<div class="searchrightcol">
If you would like to limit results to particular categories, select the categories you want to see results from:
<br /><select multiple="multiple" name="incatid[]" size="8"><option value="172"> Business</option><option value="184">- Accounting & Finance</option><option value="173">- Calculators & Converters</option><option value="181">- Calendars</option><option value="174">- Databases & Tools</option><option value="176">- Inventory & Barcoding</option><option value="177">- Investment Tools</option><option value="178">- Math & Scientific Tools</option><option value="180">- Spreadsheets</option><option value="179">- Wordprocessors</option><option value="4"> Communications</option><option value="45">- BBS Programs</option><option value="41">- E-Mail Clients</option><option value="50">- Modems & Dialup</option><option value="15"> DIsk Operating Systems</option><option value="170">- Atari DOS</option><option value="162">- DOS XL</option><option value="161">- MyDOS</option><option value="165">- Other DOS</option><option value="163">- RDOS OSS DOS</option><option value="164">- SpartaDOS</option><option value="7"> Education</option><option value="85">- Computer</option><option value="76">- Dictionaries</option><option value="77">- Geography</option><option value="78">- Kids</option><option value="79">- Languages</option><option value="80">- Mathematics</option><option value="81">- Other</option><option value="82">- Reference Tools</option><option value="83">- Science</option><option value="84">- Teaching & Training Tools</option><option value="8"> Games & Entertainment</option><option value="99">- Action</option><option value="86">- Adventure & Roleplay</option><option value="87">- Arcade</option><option value="88">- Board</option><option value="89">- Card</option><option value="90">- Casino & Gambling</option><option value="91">- Kids</option><option value="92">- Online Gaming</option><option value="93">- Other</option><option value="94">- Puzzle & Word Games</option><option value="95">- Simulation</option><option value="96">- Sports</option><option value="97">- Strategy & War Games</option><option value="98">- Tools & Editors</option><option value="9"> Graphic Apps</option><option value="109">- Animation Tools</option><option value="100">- CAD</option><option value="101">- Converters & Optimizers</option><option value="102">- Editors</option><option value="103">- Font Tools</option><option value="104">- Gallery & Cataloging Tools</option><option value="105">- Icon Tools</option><option value="106">- Other</option><option value="107">- Screen Capture</option><option value="108">- Viewers</option><option value="10"> Home & Hobby</option><option value="120">- Astrology/Biorhythms/Mystic</option><option value="110">- Astronomy</option><option value="111">- Cataloging</option><option value="112">- Food & Drink</option><option value="113">- Genealogy</option><option value="114">- Health & Nutrition</option><option value="117">- Personal Interest</option><option value="118">- Recreation</option><option value="119">- Religion</option><option value="11"> Network & Internet</option><option value="122">- Browsers</option><option value="125">- FTP Clients</option><option value="127">- Other</option><option value="5"> Productivity</option><option value="54">- Artwork & Painting</option><option value="63">- Clocks & Alarms</option><option value="52">- Desktop Publishing</option><option value="51">- Fonts & Graphics</option><option value="197">- Manuals</option><option value="55">- Screen Savers: Cartoons</option><option value="56">- Screen Savers: Nature</option><option value="57">- Screen Savers: Other</option><option value="58">- Screen Savers: People</option><option value="59">- Screen Savers: Science</option><option value="60">- Screen Savers: Seasonal</option><option value="61">- Screen Savers: Vehicles</option><option value="62">- Themes & Wallpaper</option><option value="171"> Programming Languages</option><option value="14"> System Utilities</option><option value="148">- Backup & Restore</option><option value="151">- File & Disk Management</option><option value="152">- File Compression</option><option value="155">- Printer</option></select>

<br /><br />Only show results where the submission date 
<br />
<select name="timecondition"><option value="&gt;">is greater than</option><option value="&lt;">is less than</option><option value="between" selected="selected">is between</option></select> 
<br />
<input type="text" name="timesearch" size="11" class="datepicker" /> <span id="datebetween">and <input type="text" name="timesearchmax" size="11" class="datepicker" /></span>
</div>
<div class="clear"></div>
<button type="submit" class="bigbutton btn btn-default btn-lg">Search</button>
</form>
</div>
</div>





<div class="box panel panel-default">
<div class="boxtitle panel-heading" onclick="wsn_minmax('catsbox')"><h3 class="panel-title">Find Categories</h3></div>
<div id="catsbox" class="boxbody panel-body">
<form action="search.php" method="GET">
<input type="hidden" name="action" value="filter">
<input type="hidden" name="filled" value="1">
<input type="hidden" name="whichtype" value="categories">
Find categories where
<table>
<tr>
 <td>Name</td>
 <td><select name="namecondition">
 <option value="like">contains</option>
 <option value="=">is exactly</option>
 <option value="or">has any of the words</option>
 <option value="and">has all of the words</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select></td>
 <td><input type="text" class="standardinput" name="namesearch" /></td>
</tr>
<tr>
 <td>Description</td>
 <td><select name="descriptioncondition">
 <option value="like">contains</option>
 <option value="=">is exactly</option>
 <option value="or">has any of the words</option>
 <option value="and">has all of the words</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select></td>
 <td><input type="text" class="standardinput" name="descriptionsearch" /></td>
</tr>
<tr>
 <td>Parent Names</td>
 <td><select name="parentnamescondition">
 <option value="like">contains</option>
 <option value="=">is exactly</option>
 <option value="or">has any of the words</option>
 <option value="and">has all of the words</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select></td>
 <td><input type="text" class="standardinput" name="parentnamessearch" /></td>
</tr>
<tr>
 <td>Total Listings</td>
 <td><select name="numlinkscondition">
 <option value="=">is exactly</option>
 <option value="&gt;">is greater than</option>
 <option value="&lt;">is less than</option>
 <option value="between">is between</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select></td>
 <td><input type="text" name="numlinkssearch" size="5" /></td>
</tr>
<tr>
 <td>Total Subcategories</td>
 <td><select name="numsubcondition">
 <option value="=">is exactly</option>
 <option value="&gt;">is greater than</option>
 <option value="&lt;">is less than</option>
 <option value="between">is between</option>
 <option value="!=">is not</option>
 <option value="bool">boolean</option>
</select></td>
 <td><input type="text" name="numsubsearch" size="5" /></td>
</tr>

</table>
<button type="submit" class="bigbutton btn btn-default btn-lg">Search</button>
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

<li><a href="contactform.php">Contact the Admin</a></li>

<li><a href="sitemap.php">Site Map</a></li>

</ul>




<p></p>

<div id="cookienotice" class="alert alert-info cookienotice">This website uses cookies to enhance your experience. Read our <a href="index.php?action=privacy">privacy policy</a> for details.</span> <a id="dismisscookienotice" class="dismisscookienotice">X</a>
</div>

</footer>
</body>
</html>