<?php ## Ôóíêöèÿ äëÿ çàïğåòà êıøèğîâàíèÿ ñòğàíèöû áğàóçåğîì, 
function nocache() { 
Header("Expires: Thu, 19 Feb 1998 13:24:18 GMT"); 
Header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
Header("Cache-Control: no-cache, must-revalidate"); 
Header("Cache-Control: post-check=0,pre-check=0"); 
Header("Cache-Control: max-age=0"); 
Header("Pragma: no-cache"); 

}
////////////////////////////////////////////////////
 ## Ïîëó÷åíèå çàãîëîâêîâ çàïğîñà. 
# Ğàáîòàåò òîëüêî, åñëè ĞÍĞ óñòàíîâëåí â âèäå ìîäóëÿ Apache! 
$headers = getallheaders(); 
Header("Content-type: text/plain"); 
print_r($headers) ; 


//////////////////////////////////////////////
## Ñ÷åò÷èê ïîñåùåíèÿ ñòğàíèöû îäíèì ïîëüçîâàòåëåì. 
$counter = isset($_COOKIE['counter'])? $_COOKIE['counter'] : 0; 
$counter++; 
setcookie("counter", $counter, 0x7FFFFFFF) ; 
# Âíèìàíèå! $_COOKIE['counter'] ıòîò âûçîâ íå îáíîâëÿåò! 
# Íîâîå çíà÷åíèå áóäåò äîñòóïíî òîëüêî ïğè ñëåäóşùåì ïîñåùåíèè, 
echo "Âû çàïóñòèëè ıòîò ñöåíàğèé $counter ğàç(à)."; 

////////////////////////////////////////////////////////////
/* İòîò ïğèìåğ ïğèâåäåò ê îøèáêå. Îáğàòèòå âíèìàíèå
 * íà òıã ââåğõó, êîòîğûé áóäåò âûâåäåí äî âûçîâà header() */
header('Location: http://www.example.com/');
exit;

/////////////////////////////////////////////////////////////////
// Åñëè íå áûëî îòïğàâëåíî íè îäíîãî çàãîëîâêà, òî îòïğàâèòü îäèí
if (!headers_sent()) {
    header('Location: http://www.example.com/');
    exit;
}

// Ïğèìåğ èñïîëüçîâàíèÿ íåîáÿçàòåëüíûõ ïàğàìåòğîâ file è line, êàê â PHP 4.3.0
// íåîáõîäèìî îòìåòèòü, ÷òî $filename è $linenum ïåğåäàşòñÿ äëÿ äàëüíåéøåãî èñïîëüçîâàíèÿ.
// Íå íàçíà÷àéòå èõ çíà÷åíèÿ çàğàíåå.
if (!headers_sent($filename, $linenum)) {
    header('Location: http://www.example.com/');
    exit;

// Ñêîğåå âñåãî, îøèáêà áóäåò ïğîèñõîäèò çäåñü.
} else {

    echo "Çâãîëîâêè óæå áûëè îòïğàâëåíû â $filename â ñòğîêå $linenum\n" .
          "Íåâîçìîæíî ïåğåíàïğàâèòü, ïîæàëóéñòà, ïåğåäèòå ïî ıòîé <a " .
          "href=\"http://www.example.com\">link</a> ññûëêå\n";
    exit;
}
/////////////////////////////////////////////////////////////////////


?>
