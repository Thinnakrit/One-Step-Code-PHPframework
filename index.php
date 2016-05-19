<?
$dir_path	=	$_GET['dir_path'];
global $dir_path;
$page_go	=	$_GET['page_go'];
$page_id_1	=	$_GET['page_id_1'];
$page_id_2	=	$_GET['page_id_2'];
$page_id_3	=	$_GET['page_id_3'];
$page_id_4	=	$_GET['page_id_4'];

include('config/connect.php');


if($page_go==''){
	include(view.'main.php');
}else
if($page_go=='live'){
	include(view.'live/main.php');
}

?>