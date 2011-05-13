<?php
// To jest test skracania tekstu
$news = 'W czwartek 21 kwietnia br. odbyło się pierwsze spotkanie z rodzicami zawodników  rodzicami zawodników  rodzicami zawodników  rodzicami zawodników z rocznika 2000 uczestniczących w zajęciach prowadzonych w ramach Akademii Piłkarskiej. W zebraniu uczestniczyli: prezes Klubu Sportowego Górnik Wesoła Ryszard Jedyk, przedstawiciel sponsora głównego Przemyslaw Byzdra – Dyrektor Generalny, Dyrektor ds. Rozwoju Akademii Piłkarskiej Mariusz Kaletka i trener koordynator Radosław Gabiga. Omówione zostały sprawy organizacyjne i regulaminowe szkółki oraz planowany program zajęć.';
require('Bbcode/BbCode.php');
$bbcode = new BbCode();
$bbcode->getSettings()->trustText = true;
$bbcode->parse($news);
$cutText = $bbcode->cutText(260); 
echo mb_strlen($cutText, 'utf-8');
?>