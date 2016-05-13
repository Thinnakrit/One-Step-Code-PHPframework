<?
define(db_host,'localhost');
define(db_user,'root');
define(db_pass,'password');
define(db_name,'database');

$dblink = mysqli_connect(db_host,db_user,db_pass,db_name);
$dblink->query("set names utf8");
global $dblink;

class DatabaseSystem
{
	function getValue($table,$select,$where){
		$data	=	$this->getData($table,$select,$where,'','');
		return $data[0][$select];
	}
	function getData($table,$select,$where,$order,$limit)
	{
		global $dblink;
		$where_start="";
		if($where!=""){
			$where_start=" and ";
		}
		if($select==""){
			$select	=	" * ";
		}
		if($limit!=""){
			$limit	=	" LIMIT ".$limit;
		}else{
			$limit = "";
		}
		$sql="SELECT 
				".$select."
				FROM 
				".$table." 
				WHERE 1 ".$where_start." ".$where."
				".$order." ".$limit;
		$returnResult = array();
		if ($queryResult = mysqli_query($dblink ,$sql)/* or die (mysqli_error())*/)
		{
			while($dataResult = mysqli_fetch_assoc($queryResult))
			{
				$returnResult[] = $dataResult;
			}
			return $returnResult;
		} else {
			return false;
		}
	}
	function update($table, $data=array(), $update_id_field , $update_id_value){
		global $dblink;
		if ($table == "" || count($data)==0 || $update_id_field=="" || $update_id_value=="") {
			return false;
		}
		$str_update_merge_value 	= "";
		foreach($data as $key => $value){		
			$str_update_merge_value .= $key."='".$value."', ";
		}
		$sql ="UPDATE ".$table." SET ".substr($str_update_merge_value,0,strlen($str_update_merge_value)-2)." WHERE ".$update_id_field." = '".$update_id_value."'";
		if(mysqli_query($dblink,$sql) /*or die (mysqlii_error())*/) {
			return true;
		}else{
			return false;
		}
	}	
	function insert($table, $data=array()){
		global $dblink;
		$str_insert_field = "";
		$str_insert_value = "";
		foreach($data as $key => $value){
			$str_insert_field .= $key.",";
			$str_insert_value .= '"'.$value.'",';
		}
		$sql = "INSERT INTO ".$table." (".substr($str_insert_field,0,strlen($str_insert_field)-1).") VALUES (".substr($str_insert_value,0,strlen($str_insert_value)-1).")";
		//echo $sql;
		if(mysqli_query($dblink,$sql)/* or die (mysqli_error($dblink))*/) {
			return true;
		}else{
			return false;
		}
	}
	function delete($table, $delete_id_field , $delete_id_value) {
		global $dblink;
		if($table=="" || $delete_id_field=="" || $delete_id_value=="") {
			return false;
		}
		$deleteQuery = "DELETE FROM ".$table." WHERE ".$delete_id_field." = '".$delete_id_value."'";
		if (mysqli_query($dblink,$deleteQuery) /*or die (mysqlii_error())*/) {
			mysqli_query($dblink,"OPTIMIZE TABLE ".$table);
			return true;
		} else {
			return false;
		}
	}
	
}
$db_query	=	new DatabaseSystem();
?>