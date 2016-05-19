<?php
#  THINNAKRIT  #
# CLASS TO USE #
/*
Example
$getData = DB::getData($table,$select,$where,$order,$limit);
*/
################

$dblink = mysqli_connect(db_host,db_user,db_pass,db_name);
$dblink->query("set names utf8");
global $dblink;
class DB
{
	public static function getValue($table,$select,$where){$data=DB::getData($table,$select,$where,'','');return $data[0][$select];}
	public static function getData($table,$select,$where,$order,$limit)
	{
		$where_start="";
		if($where!=""){$where_start=" and ";}
		if($select==""){$select	=	" * ";}
		if($limit!=""){$limit	=	" LIMIT ".$limit;
		}else{$limit = "";}
		$sql="SELECT ".$select." FROM ".$table." WHERE 1 ".$where_start." ".$where." ".$order." ".$limit;
		$Result = array();
		if ($query = QR::SQLi($sql))
		{while($dataResult = mysqli_fetch_assoc($query)){$Result[] = $dataResult;}return $Result;
		}else{return false;}
	}
	public static function update($table, $data=array(), $update_id_field , $update_id_value){
		if ($table == "" || count($data)==0 || $update_id_field=="" || $update_id_value=="") {return false;}
		$str_update_merge_value 	= "";
		foreach($data as $key => $value){$str_update_merge_value .= $key."='".$value."', ";}
		$sql ="UPDATE ".$table." SET ".substr($str_update_merge_value,0,strlen($str_update_merge_value)-2)." WHERE ".$update_id_field." = '".$update_id_value."'";
		if(QR::SQLi($sql)){return true;
		}else{return false;}
	}	
	public static function insert($table, $data=array()){
		$str_insert_field = "";
		$str_insert_value = "";
		foreach($data as $key => $value){$str_insert_field .= $key.",";$str_insert_value .= '"'.$value.'",';}
		$sql = "INSERT INTO ".$table." (".substr($str_insert_field,0,strlen($str_insert_field)-1).") VALUES (".substr($str_insert_value,0,strlen($str_insert_value)-1).")";
		if(QR::SQLi($sql)){return true;}else{return false;}
	}
	public static function delete($table, $delete_id_field , $delete_id_value) {
		global $dblink;
		if($table=="" || $delete_id_field=="" || $delete_id_value==""){return false;}
		$sql = "DELETE FROM ".$table." WHERE ".$delete_id_field." = '".$delete_id_value."'";
		if (QR::SQLi($sql)) {
			mysqli_query($dblink,"OPTIMIZE TABLE ".$table);
			return true;
		} else {
			return false;
		}
	}
}
$db_query	=	new DB();
class QR
{
	public static function SQLi($sql){
		global $dblink;
		return $qr = mysqli_query($dblink,$sql);
	}
}
class Tools
{
	function getIP(){  
    	if(!empty($_SERVER['HTTP_CLIENT_IP'])){  
      		$ip=$_SERVER['HTTP_CLIENT_IP'];  
   	 	}else{  
      		$ip=$_SERVER['REMOTE_ADDR'];  
    	}  
    	return $ip;  
	} 
	function genNumber($length){
      $chars = '0123456789';
      $genNumber = '';
      for ( $i = 0; $i < $length; $i++ )
         $genNumber .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
      return $genNumber;
	} 
	function genText($length) {
      $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $genText = '';
      for ( $i = 0; $i < $length; $i++ )
         $genText .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
      return $genText;
	} 
	function genTextNumber($length) {
      $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $genTextNumber = '';
      for ( $i = 0; $i < $length; $i++ )
         $genTextNumber .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
      return $genTextNumber;
	} 
	function getWebUrl(){
		if($_SERVER['HTTP_HOST']=="localhost"){
			$url	=	$_SERVER['HTTP_HOST']."/cast";
		}else{
			$url	=	$_SERVER['HTTP_HOST'];
		}
		return 'http://'.$url.'/';
	}
}
$tools	=	new Tools();
class Validate
{
	protected $__EMAIL	=	'^[a-zA-Z0$this$this-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$';
	protected $__NUMBER	=	'^[0-9][0-9]*$';
	protected $__URL	=	'/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
	protected $__URL__FACEBOOK	=	'(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?
';
	protected $__URL__TWITTER	=	'/http:\/\/twitter\.com\/(#!\/)?[a-zA-Z0-9_]+/';
	/*var $__NUMBER	=	'';
	var $__NUMBER	=	'';
	var $__NUMBER	=	'';
	var $__NUMBER	=	'';*/
	public function email($email){return eregi(Validate::$__EMAIL,$email);}
	public function number($number){return eregi(Validate::$__NUMBER,$number);}
	public function url($url){return eregi(Validate::$__URL,$url);}
	public function url_fb($url){return eregi(Validate::$__URL__FACEBOOK,$url);}
	public function url_tw($url){return eregi(Validate::$__URL__TWITTER,$url);}
	public function pictype($pic_type){global $regex_pic;return eregi($regex_pic,$pic_type);}
}
$validate	=	new Validate();
class USER
{
	public static  $table ='';
	public static  $select ='';
	public static  $where ='';
	public static  $order ='';
	public static  $limit ='';
	
	public function select($data=array()){
		USER::$table = $data[table];
		USER::$select = $data[select];
		USER::$where = $data[where];
		USER::$order = $data[order];
		USER::$limit = $data[limit];
	}
	public function login($idname,$name,$idpass,$pass){
		$table	=	USER::$table;
		$where	=	" ".$idname."='".$name."' and ".$idpass."='".$pass."' ";
		return DB::getData($table,$select,$where,$order,$limit);
	}
}
class UI
{
	public function GET($name,$page,$direct,$code){
		if($name==$page){
			include('view/'.$direct.'/'.$code.'.php');
		}
	}
	public function INC($dir,$code){include('view/main/'.$code.'.php');}
}
class UX
{
	public static $dir_p ='';
	public function SDIR($dir){UX::$dir_p = $dir;}
	public static function DIR(){return UX::$dir_p;}
}

?>