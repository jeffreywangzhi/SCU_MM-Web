<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<?php
$host = "163.14.18.161"; //本機端
$username = "student"; //mysql帳號
$passwd = "0212";   //mysql密碼
$database = "scucsimmm"; //mysql資料庫

// $host = '127.0.0.1';
// $username ='root';
// $passwd = '0212';
// $database = 'scu';

//建立資料庫物件
$kt_conn = new mysqli($host, $username, $passwd, $database);
if ($kt_conn -> connect_error){
  echo "連結mysql資料庫失敗";
}
else{
  $kt_conn -> query("SET NAMES 'utf8'");
  //echo "連結mysql資料庫成功，語系設為utf8";
}

//接收從前端傳來的內容，撈取資料後透過ajax丟回前端
if($_GET['name'] != "") {
  @$n = $_GET['name'];
  /*從score資料表，撈取所有欄位(用*米字號)，當所傳來的值是字首、中、尾有符合(LIKE)資料name欄位的名字，
    就會呼叫出來，並且透過id欄位來設定為升序(ASC是升序(小跑到大)、DESC是降序(大跑到小))*/
  $sql = "SELECT AUTHOR_ID,AUTHOR_NAME,POST_ID,POST_CONTENT,POST_DATE,COMMENT_COUNT,COMMENT1,COMMENT2,COMMENT3,COMMENT4,COMMENT5,COMMENT6,COMMENT7,COMMENT8,COMMENT9,COMMENT10,COMMENT11,COMMENT12,COMMENT13,COMMENT14,COMMENT15,COMMENT16,COMMENT17,COMMENT18,COMMENT19,COMMENT20 FROM POST_TABLE_CLASS_A WHERE POST_ID='$n';";
//   $sql = "SELECT USER_PASSWORD FROM USER_TABLE WHERE USER_ID = '$n'";
  $score_result = mysqli_query($kt_conn,$sql);
}
while($row = mysqli_fetch_array($score_result))
{
    echo $row[0];
    echo ",";
    echo $row[1];
    echo ",";
    echo $row[2];
    echo ",";
    echo $row[3];
    echo ",";
    echo $row[4];
    echo ";";
    echo $row[5];
    echo ";";
    echo $row[6];
    echo ";";
    echo $row[7];
    echo ";";
    echo $row[8];
    echo ";";
    echo $row[9];
    echo ";";
    echo $row[10];
    echo ";";
    echo $row[11];
    echo ";";
    echo $row[12];
    echo ";";
    echo $row[13];
    echo ";";
    echo $row[14];
    echo ";";
    echo $row[15];
    echo ";";
    echo $row[16];
    echo ";";
    echo $row[17];
    echo ";";
    echo $row[18];
    echo ";";
    echo $row[19];
    echo ";";
    echo $row[20];
    echo ";";
    echo $row[21];
    echo ";";
    echo $row[22];
    echo ";";
    echo $row[23];
    echo ";";
    echo $row[24];
    echo ";";
    echo $row[25];
}

//關閉資料庫
mysqli_close($kt_conn);
?>