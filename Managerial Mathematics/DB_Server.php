<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<?php
$host = "163.14.18.161"; //本機端
$dbuser = "student"; //mysql帳號
$dbpassword = "0212";   //mysql密碼
$dbname = "scucsimmm"; //mysql資料庫
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    // mysqli_query($link,'select * from student;');
    echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}
?>