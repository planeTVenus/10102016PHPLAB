<?php ## ������� ��� ������� ����������� �������� ���������, 
function nocache() { 
Header("Expires: Thu, 19 Feb 1998 13:24:18 GMT"); 
Header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
Header("Cache-Control: no-cache, must-revalidate"); 
Header("Cache-Control: post-check=0,pre-check=0"); 
Header("Cache-Control: max-age=0"); 
Header("Pragma: no-cache"); 

}
 ## ��������� ���������� �������. 
# �������� ������, ���� ��� ���������� � ���� ������ Apache! 
$headers = getallheaders(); 
Header("Content-type: text/plain"); 
print_r($headers) ; 

## ������� ��������� �������� ����� �������������. 
$counter = isset($_COOKIE['counter'])? $_COOKIE['counter'] : 0; 
$counter++; 
setcookie("counter", $counter, 0x7FFFFFFF) ; 
# ��������! $_COOKIE['counter'] ���� ����� �� ���������! 
# ����� �������� ����� �������� ������ ��� ��������� ���������, 
echo "�� ��������� ���� �������� $counter ���(�)."; 
?> 