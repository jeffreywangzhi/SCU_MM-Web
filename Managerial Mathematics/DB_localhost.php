<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<?php
$host = '127.0.0.1';
$dbuser ='root';
$dbpassword = '0212';
$dbname = 'scu';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    // mysqli_query($link,'select * from student;');
    echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}
?>