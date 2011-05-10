<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Test bbcode - tworzenie zajawki</title>
	<link href="styl.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="all">
<h1>Test skracania tekstu</h1>
<?php

function getmicrotime()
{ 
	list($usec, $sec) = explode(" ",microtime()); 
	return ((float)$usec + (float)$sec); 
}
require_once 'Bbcode/BbCode.php';

$bb=new BbCode();
$length = 22;
$text='[ul]
[li]Internet Explorer,[/li]
[li]Firefox,[/li]
[li]Google Chrome 4.0,[/li]
[li]Safari 3.0.[/li]
[/ul]';

echo '<fieldset class="pre"><legend>Oryginalny tekst</legend>'.$text.'</fieldset>';
$bb->parse($text, false);

$cutText = $bb->cutText($length);
echo '<fieldset><legend>Skrócona wersja do '.$length.' znaków </legend>'.$cutText.'</fieldset>';
echo '<fieldset><legend>Skrócona wersja do '.$length.' znaków (tagi)</legend>'.$bb->cutText($length, true).'</fieldset>';

?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-4996808-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>

</html>