ดูเพิ่มเติมที่ https://www.nowvlog.com/basic/index.html

เชื่อมต่อฐานข้อมูล เปิดไฟล์ /config/connect.php

# USER CONNECT #
 
define(db_host,'localhost');
define(db_user,'root');
define(db_pass,'password');
define(db_name,'database');
เชื่อมโยงหน้าเพจต่างๆ ของเว็บไซต์ เปิดไฟล์ index.php 

รายละเอียดโค้ด
$page_go คือ ชื่อเงื่อนไข ที่ต้องการอ้างถึง
include(view.'....ชื่อไฟล์ที่ต้องการให้แสดง...'); 

ตัวอย่างโค้ด

if($page_go=='index'){
    include(view.'index/main.php');
}

หน้าที่ต่างๆ ของแต่ละโฟลเดอร์

โฟลเดอร์ view ทำหน้าที่ในการเก็บไฟล์สำหรับแสดงผลหน้าเพจเว็บไซต์
โฟลเดอร์ model ทำหน้าที่เก็บส่วนที่เชื่อมกับฐานข้อมูลที่จะนำมาใช้ร่วมกับ view
โฟลเดอร์ controller ทำหน้าที่เก็บไฟล์ประมวลผล ที่ได้จากการส่งข้อมูลจากฟอร์ม หรือการประมวลผลอื่นๆ ใช้ร่วมกับ Javascript และแสดงผลในส่วน view


การเพิ่มข้อมูล
ตัวอย่างโค้ด

$table = "member";
$data = array();
$data['member_name'] = "Nowvlog";
$insertStatus = DB::insert($table,$data);
การแก้ไข/อัพเดทข้อมูล
ตัวอย่างโค้ด

$table = "member";
$update_field = "member_id";
$update_value = "1";
$data = array();
$data['member_name'] = "Thinnakrit";
$updateStatus = DB::update($table,$data,$update_field,$update_value);
การลบข้อมูล
ตัวอย่างโค้ด

$table = "member";
$delete_field = "member_id";
$delete_value = "1";
$deleteStatus = DB::delete($table,$delete_field,$delete_value);
เรียกข้อมูลตามเงื่อนไข
ตัวอย่างโค้ด

$table = "member";
$select = " * ";
$where = "member_name='%n%'";
$order = "ORDER BY member_id DESC";
$limit = "3";
$result = DB::getData($table,$select,$where,$order,$limit);

การแสดงข้อมูลหลังจากเรียกใช้

foreach($result as $key => $row){
    echo $row['member_name']."<br>";
}
เรียกข้อมูล 1 ค่า
ตัวอย่างโค้ด

$table = "member";
$select = "member_name";
$where = "member_id='1'";
$member_name = DB::getValue($table,$select,$where);
 
echo $member_name;
IP ของผู้ใช้งาน
ตัวอย่างโค้ด

$IP = Tools::getIP();
 
echo $IP;
สุ่มตัวเลข 0-9
ตัวอย่างโค้ด

$length = '5'; //จำนวน
$value = Tools::genNumber($length);
 
echo $value;
สุ่มตัวอักษร a-Z
ตัวอย่างโค้ด

$length = '5'; //จำนวน
$value = Tools::genText($length);
 
echo $value;
สุ่มตัวอักษรและตัวเลข
ตัวอย่างโค้ด

$length = '5'; //จำนวน
$value = Tools::genTextNumber($length);
 
echo $value;
เรียกที่อยู่เว็บไซต์ปัจจุบัน
ตัวอย่างโค้ด

$value = Tools::getWebUrl();
 
echo $value;
ตรวจสอบ Email
ตัวอย่างโค้ด

$email = "example@gmail.com";
$result = Tools::Validate::email($email);
//Result : true or false
ตรวจสอบตัวเลข
ตัวอย่างโค้ด

$number = "19";
$result = Tools::Validate::number($number);
//Result : true or false
ตรวจสอบที่อยู่เว็บไซต์
ตัวอย่างโค้ด

$url = "http://www.nowvlog.com";
$result = Tools::Validate::url($url);
//Result : true or false
ตรวจสอบนามสกุลไฟล์ภาพ
ตัวอย่างโค้ด

$pictype = "png";
$result = Tools::Validate::pictype($pictype);
//Result : true or false
