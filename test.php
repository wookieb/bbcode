<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Test bbcode</title>
		<link href="styl.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div id="all">
			<h1>Test BBCODE</h1>
			<?php

			function getmicrotime() {
				list($usec, $sec) = explode(" ", microtime());
				return ((float)$usec + (float)$sec);
			}
			include_once 'Bbcode/BbCode.php';

			$bb = new BbCode();

			$text = '
Pobrubienie:
	[b]Pogrubiony[/b]
Podkreślenie:
	[u]Podkreślony[/u]
Kursywa:
	[i]Kursywa[/i]
Przekreślenie:
	[s]Przekreślony[/s]
Kolorowanie:
	[color=#AF0D0D]Kolorowy tekst[/color]
	[color=blue]Kolorowy tekst 2[/color]
Linkowanie:
	[url]Link niepoprawny[/url]
	[url]http://wookieb.pl[/url]
	[url=http://wookieb.pl]Zapraszam ponownie![/url]
	[url][img]http://wookieb.pl/bbcode/site_logo_min.jpg[/img][/url]
	
Lista nieuporządkowana:
	[ul]
		[li]Element listy[/li]
		[li]Element listy 2[/li]
	[/ul]
	[ul]Niepoprawna lista[/ul]

Lista uporządkowana:
	[ol]
		[li]Element listy[/li]
		[li]Element listy2[/li]
	[/ol]

Cytowanie:
	[quote date="2009-09-01 12:00"]Cytat[quote] Cytat 2[/quote][/quote]

Obrazki:
	[img]http://wookieb.pl/bbcode/site_logo_min.jpg[/img]
	
Kod:
[code]Kod nie jest kolorowany. Zostawiam możliwość implementacji użytkownikowi. 
Wszystkie inne tagi w tym obszarze będą ignorowane [code][b][s][i][/code][/code]

Linkowanie filmów z youtube:
[youtube]-Fe4dk0Jtcw[/youtube]
';

			echo '<fieldset class="pre"><legend>Oryginalny tekst</legend>'.$text.'</fieldset>';

			$start = getmicrotime();
			$bb->parse($text, false);
			$time = round(getmicrotime() - $start, 5);

			echo '<fieldset><legend>Przeparsowany bbcode ('.$time.')</legend>'.$bb->getHtml().'</fieldset>';
			echo '<fieldset class="pre"><legend>Wersja bbcode ('.$time.')</legend>'.$bb->getBbcode().'</fieldset>';

			$tt = $bb->getBbcode();
			$bb->getSettings()->trustText = true;
			$start = getmicrotime();
			$bb->parse($tt, false);
			$time = round(getmicrotime() - $start, 5);

			echo '<fieldset><legend>Przeparsowany bbcode (zaufany) ('.$time.')</legend>'.$bb->getHtml().'</fieldset>';
			echo '<fieldset class="pre"><legend>Wersja bbcode (zaufany) ('.$time.')</legend>'.$bb->getBbcode().'</fieldset>';
			?>
	</body>
</html>