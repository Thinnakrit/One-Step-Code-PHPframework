API Library

การเลือกตารางข้อมูล และนำข้อมูลมาแสดง	
- สร้างตัวแปรรับค่า 1 ตัวเพื่อรับค่า

ชุดคำสั่ง

$db_query->getData($table,$select,$where,$order,$limit);

อธิบาย

$table คือ ชื่อตาราง
$select คือ ข้อมูลที่ต้องการ หากต้องการจข้อมูลทั้งหมดปล่อยว่าง 
$where คือ เงื่อนไขในการเรียกข้อมูล
$order คือ รูปแบบการเรียงลำดับ
$limit คือ จำนวนข้อมูลที่ต้องการจำกัด

ตัวอย่างการใช้งาน

$studen_array = $db_query->getData("student"," student_name ","student_id='2'","","");
foreach($studen_array as $key => $row_student){
        echo $row_student['student_name'];
}

การเพิ่มข้อมูล	- สร้างชุดอาเรย์ 1 ชุด

ชุดคำสั่ง

$db_query->insert($table, $data=array());

อธิบาย

$table คือ ชื่อตาราง
$data คือ ค่าที่ต้องการเพิ่มสู่ฐานข้อมูล

ตัวอย่างการใช้งาน

$data=array();
$data['student_name'] = "One";
$data['student_age'] = "14"; 
$data['student_province'] = "Bangkok"; 
$db_query->insert("student", $data);

การอัพเดทข้อมูล	
- สร้างชุดอาเรย์ 1 ชุด

ชุดคำสั่ง

$db_query->($table, $data=array(), $update_id_field , $update_id_value)

อธิบาย

$table คือ ชื่อตาราง
$data คือ ค่าที่ต้องการอัพเดทข้อมูล
$update_id_field คือ ชื่อแถวที่ต้องการอัพเดท
$update_id_value คือ ค่า/ลำดับ แถวที่ต้องการอัพเดท

ตัวอย่างการใช้งาน

$data=array();
$data['student_name'] = "Two";
$data['student_age'] = "15"; 
$data['student_province'] = "Nontaburi"; 
$db_query->update("student", $data, "student_id","2");


การลบข้อมูล	ชุดคำสั่ง

$db_query->delete($table, $delete_id_field , $delete_id_value)

อธิบาย

$table คือ ชื่อตาราง
$delete_id_field คือ ชื่อแถวที่ต้องการลบ
$delete_id_value คือ ค่า/ลำดับ แถวที่ต้องการลบ

ตัวอย่างการใช้งาน

$db_query->delete("student","student_id","2");
