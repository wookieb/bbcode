<?php
$news = 'W czwartek 21 kwietnia br. odbylo sie pierwsze spotkanie z rodzicami zawodników  rodzicami zawodników  rodzicami zawo zawodników  rodzicami zawodników z rocznika 2000 uczestniczacych w zajeciach prowadzonych w ramach Akademii Pilkarskiej. W zebraniu uczestniczyli: prezes Klubu Sportowego Górnik Wesola Ryszard Jedyk, przedstawiciel sponsora glównego Przemyslaw Byzdra – Dyrektor Generalny, Dyrektor ds. Rozwoju Akademii Pilkarskiej Mariusz Kaletka i trener koordynator Radoslaw Gabiga. Omówione zostaly sprawy organizacyjne i regulaminowe szkólki oraz planowany program zajec.';
require('Bbcode/BbCode.php');
$bbcode = new BbCode();
$bbcode->getSettings()->trustText = true;
$bbcode->parse($news);
$cutText = $bbcode->cutText(260); 
echo mb_strlen($cutText, 'utf-8');