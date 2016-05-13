<?
//include "connect.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Framework One Step Code</title>
</head>
<body>

<h3 align="center">API Library</h3>
<style>
table{
	border:1px solid rgba(0,0,0,1);
	margin-left:auto;
	margin-right:auto;
	display:block;
}
td{
	padding:10px;
}
</style>
<table width="806" border="1">
  <tr>
    <td width="196">การเลือกตารางข้อมูล และนำข้อมูลมาแสดง</td>
    <td width="600"><p>- สร้างตัวแปรรับค่า 1 ตัวเพื่อรับค่า<br>
      <br>
      ชุดคำสั่ง<br>
      <br>
      $db_query-&gt;getData($table,$select,$where,$order,$limit);<br>
      <br>
      อธิบาย<br>
      <br>
      $table คือ ชื่อตาราง<br>
      $select คือ ข้อมูลที่ต้องการ หากต้องการจข้อมูลทั้งหมดปล่อยว่าง
      <br>
      $where คือ เงื่อนไขในการเรียกข้อมูล<br>
      $order คือ รูปแบบการเรียงลำดับ<br>
      $limit คือ จำนวนข้อมูลที่ต้องการจำกัด<br>
      <br>
      ตัวอย่างการใช้งาน<br>
      <br>
      $studen_array = 
      $db_query-&gt;getData(&quot;student&quot;,&quot; student_name &quot;,&quot;student_id='2'&quot;,&quot;&quot;,&quot;&quot;);<br>
        foreach($studen_array as $key =&gt; $row_student){<br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo $row_student['student_name'];<br>
        }<br>
        <br>
    </p></td>
  </tr>
  <tr>
    <td>การเพิ่มข้อมูล</td>
    <td>- สร้างชุดอาเรย์ 1 ชุด<br>
    <br>
    ชุดคำสั่ง<br>
    <br>
    $db_query-&gt;insert($table, $data=array());<br>
    <br>
    อธิบาย<br>
    <br>
    $table คือ ชื่อตาราง<br>
    $data คือ ค่าที่ต้องการเพิ่มสู่ฐานข้อมูล<br>
    <br>
    ตัวอย่างการใช้งาน<br>
    <br>
    $data=array();<br>
    $data['student_name'] = &quot;One&quot;;<br>
    $data['student_age'] = &quot;14&quot;; <br>
    $data['student_province'] = &quot;Bangkok&quot;; <br>
$db_query-&gt;insert(&quot;student&quot;, $data);<br>
<br></td>
  </tr>
  <tr>
    <td>การอัพเดทข้อมูล</td>
    <td><p>- สร้างชุดอาเรย์ 1 ชุด<br>
      <br>
      ชุดคำสั่ง<br>
  <br>
      $db_query-&gt;($table, $data=array(), $update_id_field , $update_id_value)<br>
  <br>
      อธิบาย<br>
  <br>
      $table คือ ชื่อตาราง<br>
      $data คือ ค่าที่ต้องการอัพเดทข้อมูล<br>
  $update_id_field คือ ชื่อแถวที่ต้องการอัพเดท<br>
  $update_id_value คือ ค่า/ลำดับ แถวที่ต้องการอัพเดท<br>
  <br>
      ตัวอย่างการใช้งาน<br>
  <br>
      $data=array();<br>
      $data['student_name'] = &quot;Two&quot;;<br>
      $data['student_age'] = &quot;15&quot;; <br>
      $data['student_province'] = &quot;Nontaburi&quot;; <br>
      $db_query-&gt;update(&quot;student&quot;, $data, &quot;student_id&quot;,&quot;2&quot;);</p>
      <p><br>
    </p></td>
  </tr>
  <tr>
    <td>การลบข้อมูล</td>
    <td>ชุดคำสั่ง<br>
<br>
$db_query-&gt;delete($table, $delete_id_field , $delete_id_value)<br>
<br>
อธิบาย<br>
<br>
$table คือ ชื่อตาราง<br>
$delete_id_field คือ ชื่อแถวที่ต้องการลบ<br>
$delete_id_value คือ ค่า/ลำดับ แถวที่ต้องการลบ<br>
<br>
ตัวอย่างการใช้งาน<br>
<br>
$db_query-&gt;delete(&quot;student&quot;,&quot;student_id&quot;,&quot;2&quot;);</td>
  </tr>
</table>



</body>
</html>