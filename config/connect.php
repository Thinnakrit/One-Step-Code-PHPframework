<?
@session_start();
# USER CONNECT #
define(db_host,'localhost');
define(db_user,'root');
define(db_pass,'mysql');
define(db_name,'itdix');

# OST CLASS #
define('WEB_ROOTDIR', realpath(dirname(__FILE__) . '/..'));
define(__CLASS__,'../class/ost');
$regex_pic = 'gif|jpg|jpeg|png|bmp';
global $regex_pic;
include(__CLASS__.'_class.php');
UX::SDIR($dir_path);

define(view,'module/view/');
?>