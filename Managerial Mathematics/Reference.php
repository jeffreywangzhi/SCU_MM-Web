<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>相關網站</title>
    <style>
    /*當鼠標移動至按鈕上方，使其變成手指*/
   button{
           cursor: pointer;
       }
    </style>
</head>
<body>
    <!--返回主畫面按鈕，並放sIcon.png在上面-->
    <button type="button" onclick="javascript:location.href='Main.php'" ><img src="sIcon.png" style="height: 50px; width: 300px;"></button>
    <h1><i>學生相關網站</i></h1>
    <ul>
        <!--三個相關網址連結-->
        <li><a href="http://isee.scu.edu.tw/">Moodle</a></li>
        <li><a href="https://api.sys.scu.edu.tw/academic/">新校務系統</a></li>
        <li><a href="http://www.scu.edu.tw/regcurr/courseselection/mastertimetable.pdf">選課日程表</a></li>
    </ul>
</body>
</html>