<?php

  $languages = array(
    'da' => 'da',
	'de' => 'de',
    'en' => 'en',
	'es' => 'es',
    'fi' => 'fi',
    'nl' => 'nl',
    'no' => 'no',
	'pl' => 'pl',
    'sv' => 'sv'
  );

  if (array_key_exists($_GET['lang'], $languages)) {
    $lang = $languages[$_GET['lang']];
  }
  else {
    $lang = 'en';
  }
  
function translate($txt) {
	global $lang;
	if ($txt=="flashVars") {
		switch ($lang) {
			case 'da':	return "sTrans=sekund&mTrans=minut&hTrans=time&dTrans=dage&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
			case 'de':	return "sTrans=Sekunden&mTrans=Minuten&hTrans=Stunden&dTrans=Tag&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
			case 'fi':	return "sTrans=sekunit&mTrans=minuutit&hTrans=Tunnit&dTrans=Päivät&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
			case 'nl':	return "sTrans=seconden&mTrans=MINUTEN&hTrans=uur&dTrans=dagen&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
			case 'no':	return "sTrans=sekunder&mTrans=minutter&hTrans=timer&dTrans=dager&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
			case 'pl':	return "sTrans=drugi&mTrans=minut&hTrans=godziny&dTrans=days&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
			case 'sv':	return "sTrans=sekunder&mTrans=minuter&hTrans=timmar&dTrans=dagar&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
			default:	return "sTrans=Seconds&mTrans=Minutes&hTrans=Hours&dTrans=Days&now=".date("Y-m-d H:i:s")."&countdownTo=2011-08-11 23:59:00";
		}
	}
	else if ($txt=='Leaderboard') {
		switch ($lang) {
			case 'da':	return 'Leaderboard';
			case 'de':	return 'Leader Board';
			case 'fi':	return 'Pistetilasto';
			case 'nl':	return 'Leidersbord';
			case 'no':	return 'Poengtavle';
			case 'pl':	return 'liderów';
			case 'sv':	return 'Poängtavle';
			default:	return 'Leaderboard';
		}
	}
	else if ($txt=='Points') {
		switch ($lang) {
			case 'da':	return 'punkter';
			case 'de':	return 'Punkte';
			case 'fi':	return 'Pisteet';
			case 'nl':	return 'punten';
			case 'no':	return 'Poeng';
			case 'pl':	return 'punktów';
			case 'sv':	return 'Poäng';
			default:	return 'Points';
		}
	}
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leaderboard</title>
<style type="text/css">
* {
	margin:0;
	padding:0;
}

html, body {
	width:100%;
	height:100%;
}

body {
	background-image:url(leaderboard_<? echo $lang; ?>.jpg);
	background-repeat:no-repeat;
}

#countdown {
	position:absolute;
	left:560px;
	top:155px;
}

#leaderboard {
	background-image:url(leaderboardtable.jpg);
	position:absolute;
	left:570px;
	top:270px;
	width:361px;
	height:318px;
	font-family:Verdana,Arial,sans-serif;
	font-size:14px;
	font-weight:bold;
	color:#fff;
}

#l_title, #l_points {
	position:absolute;
	top:10px;
}

#l_title {
	left:20px;
}

#l_points {
	left:270px;
}

#l_table {
	position:absolute;
	left:6px;
	top:40px;
}
</style>
<script language="JavaScript" type="text/javascript">
<!--
//v1.7
// Flash Player Version Detection
// Detect Client Browser type
// Copyright 2005-2008 Adobe Systems Incorporated.  All rights reserved.
var isIE  = (navigator.appVersion.indexOf("MSIE") != -1) ? true : false;
var isWin = (navigator.appVersion.toLowerCase().indexOf("win") != -1) ? true : false;
var isOpera = (navigator.userAgent.indexOf("Opera") != -1) ? true : false;
function ControlVersion()
{
	var version;
	var axo;
	var e;
	// NOTE : new ActiveXObject(strFoo) throws an exception if strFoo isn't in the registry
	try {
		// version will be set for 7.X or greater players
		axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");
		version = axo.GetVariable("$version");
	} catch (e) {
	}
	if (!version)
	{
		try {
			// version will be set for 6.X players only
			axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");
			
			// installed player is some revision of 6.0
			// GetVariable("$version") crashes for versions 6.0.22 through 6.0.29,
			// so we have to be careful. 
			
			// default to the first public version
			version = "WIN 6,0,21,0";
			// throws if AllowScripAccess does not exist (introduced in 6.0r47)		
			axo.AllowScriptAccess = "always";
			// safe to call for 6.0r47 or greater
			version = axo.GetVariable("$version");
		} catch (e) {
		}
	}
	if (!version)
	{
		try {
			// version will be set for 4.X or 5.X player
			axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.3");
			version = axo.GetVariable("$version");
		} catch (e) {
		}
	}
	if (!version)
	{
		try {
			// version will be set for 3.X player
			axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.3");
			version = "WIN 3,0,18,0";
		} catch (e) {
		}
	}
	if (!version)
	{
		try {
			// version will be set for 2.X player
			axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
			version = "WIN 2,0,0,11";
		} catch (e) {
			version = -1;
		}
	}
	
	return version;
}
// JavaScript helper required to detect Flash Player PlugIn version information
function GetSwfVer(){
	// NS/Opera version >= 3 check for Flash plugin in plugin array
	var flashVer = -1;
	
	if (navigator.plugins != null && navigator.plugins.length > 0) {
		if (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]) {
			var swVer2 = navigator.plugins["Shockwave Flash 2.0"] ? " 2.0" : "";
			var flashDescription = navigator.plugins["Shockwave Flash" + swVer2].description;
			var descArray = flashDescription.split(" ");
			var tempArrayMajor = descArray[2].split(".");			
			var versionMajor = tempArrayMajor[0];
			var versionMinor = tempArrayMajor[1];
			var versionRevision = descArray[3];
			if (versionRevision == "") {
				versionRevision = descArray[4];
			}
			if (versionRevision[0] == "d") {
				versionRevision = versionRevision.substring(1);
			} else if (versionRevision[0] == "r") {
				versionRevision = versionRevision.substring(1);
				if (versionRevision.indexOf("d") > 0) {
					versionRevision = versionRevision.substring(0, versionRevision.indexOf("d"));
				}
			}
			var flashVer = versionMajor + "." + versionMinor + "." + versionRevision;
		}
	}
	// MSN/WebTV 2.6 supports Flash 4
	else if (navigator.userAgent.toLowerCase().indexOf("webtv/2.6") != -1) flashVer = 4;
	// WebTV 2.5 supports Flash 3
	else if (navigator.userAgent.toLowerCase().indexOf("webtv/2.5") != -1) flashVer = 3;
	// older WebTV supports Flash 2
	else if (navigator.userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 2;
	else if ( isIE && isWin && !isOpera ) {
		flashVer = ControlVersion();
	}	
	return flashVer;
}
// When called with reqMajorVer, reqMinorVer, reqRevision returns true if that version or greater is available
function DetectFlashVer(reqMajorVer, reqMinorVer, reqRevision)
{
	versionStr = GetSwfVer();
	if (versionStr == -1 ) {
		return false;
	} else if (versionStr != 0) {
		if(isIE && isWin && !isOpera) {
			// Given "WIN 2,0,0,11"
			tempArray         = versionStr.split(" "); 	// ["WIN", "2,0,0,11"]
			tempString        = tempArray[1];			// "2,0,0,11"
			versionArray      = tempString.split(",");	// ['2', '0', '0', '11']
		} else {
			versionArray      = versionStr.split(".");
		}
		var versionMajor      = versionArray[0];
		var versionMinor      = versionArray[1];
		var versionRevision   = versionArray[2];
        	// is the major.revision >= requested major.revision AND the minor version >= requested minor
		if (versionMajor > parseFloat(reqMajorVer)) {
			return true;
		} else if (versionMajor == parseFloat(reqMajorVer)) {
			if (versionMinor > parseFloat(reqMinorVer))
				return true;
			else if (versionMinor == parseFloat(reqMinorVer)) {
				if (versionRevision >= parseFloat(reqRevision))
					return true;
			}
		}
		return false;
	}
}
function AC_AddExtension(src, ext)
{
  if (src.indexOf('?') != -1)
    return src.replace(/\?/, ext+'?'); 
  else
    return src + ext;
}
function AC_Generateobj(objAttrs, params, embedAttrs) 
{ 
  var str = '';
  if (isIE && isWin && !isOpera)
  {
    str += '<object ';
    for (var i in objAttrs)
    {
      str += i + '="' + objAttrs[i] + '" ';
    }
    str += '>';
    for (var i in params)
    {
      str += '<param name="' + i + '" value="' + params[i] + '" /> ';
    }
    str += '</object>';
  }
  else
  {
    str += '<embed ';
    for (var i in embedAttrs)
    {
      str += i + '="' + embedAttrs[i] + '" ';
    }
    str += '> </embed>';
  }
  document.write(str);
}
function AC_FL_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".swf", "movie", "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
     , "application/x-shockwave-flash"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}
function AC_SW_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".dcr", "src", "clsid:166B1BCA-3F9C-11CF-8075-444553540000"
     , null
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}
function AC_GetArgs(args, ext, srcParamName, classid, mimeType){
  var ret = new Object();
  ret.embedAttrs = new Object();
  ret.params = new Object();
  ret.objAttrs = new Object();
  for (var i=0; i < args.length; i=i+2){
    var currArg = args[i].toLowerCase();    
    switch (currArg){	
      case "classid":
        break;
      case "pluginspage":
        ret.embedAttrs[args[i]] = args[i+1];
        break;
      case "src":
      case "movie":	
        args[i+1] = AC_AddExtension(args[i+1], ext);
        ret.embedAttrs["src"] = args[i+1];
        ret.params[srcParamName] = args[i+1];
        break;
      case "onafterupdate":
      case "onbeforeupdate":
      case "onblur":
      case "oncellchange":
      case "onclick":
      case "ondblclick":
      case "ondrag":
      case "ondragend":
      case "ondragenter":
      case "ondragleave":
      case "ondragover":
      case "ondrop":
      case "onfinish":
      case "onfocus":
      case "onhelp":
      case "onmousedown":
      case "onmouseup":
      case "onmouseover":
      case "onmousemove":
      case "onmouseout":
      case "onkeypress":
      case "onkeydown":
      case "onkeyup":
      case "onload":
      case "onlosecapture":
      case "onpropertychange":
      case "onreadystatechange":
      case "onrowsdelete":
      case "onrowenter":
      case "onrowexit":
      case "onrowsinserted":
      case "onstart":
      case "onscroll":
      case "onbeforeeditfocus":
      case "onactivate":
      case "onbeforedeactivate":
      case "ondeactivate":
      case "type":
      case "codebase":
      case "id":
        ret.objAttrs[args[i]] = args[i+1];
        break;
      case "width":
      case "height":
      case "align":
      case "vspace": 
      case "hspace":
      case "class":
      case "title":
      case "accesskey":
      case "name":
      case "tabindex":
        ret.embedAttrs[args[i]] = ret.objAttrs[args[i]] = args[i+1];
        break;
      default:
        ret.embedAttrs[args[i]] = ret.params[args[i]] = args[i+1];
    }
  }
  ret.objAttrs["classid"] = classid;
  if (mimeType) ret.embedAttrs["type"] = mimeType;
  return ret;
}
// -->
</script>
</head>

<body>
<div id="countdown">
<script language="JavaScript" type="text/javascript">
	AC_FL_RunContent(
		'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0',
		'width', '370',
		'height', '90',
		'src', 'countdown_maria',
		'quality', 'high',
		'pluginspage', 'http://www.adobe.com/go/getflashplayer',
		'align', 'middle',
		'play', 'true',
		'loop', 'true',
		'scale', 'showall',
		'wmode', 'window',
		'devicefont', 'false',
		'id', 'countdown_maria',
		'bgcolor', '#ffffff',
		'name', 'countdown_maria',
		'menu', 'true',
		'allowFullScreen', 'false',
		'allowScriptAccess','sameDomain',
		'movie', 'countdown_maria',
		'salign', '',
		'flashVars', '<?php echo translate("flashVars"); ?>'
		); //end AC code
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="370" height="90" id="countdown_maria" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
    <param name="flashVars" value="<?php echo translate("flashVars"); ?>" />
	<param name="movie" value="countdown_maria.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="countdown_maria.swf" quality="high" bgcolor="#ffffff" width="370" height="90" name="countdown_maria" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" flashVars="<?php echo translate("flashVars"); ?>" />
	</object>
</noscript>
</div>
<div id="leaderboard">
	<div id="l_title"><? echo translate('Leaderboard'); ?></div>
    <div id="l_points"><? echo translate('Points'); ?></div>
	<iframe id="l_table" width="348" height="270" src="leaderboard_table.html" frameborder="0"></iframe>
</div>
</body>
</html>
