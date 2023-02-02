<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問題討論區</title>
    <style>
/*當鼠標移動至按鈕上方，使其變成手指*/
 button{
           cursor: pointer;
       }
    </style>
</head>
<body>
    <button type="button" onclick="javascript:location.href='Main.php'" ><img src="sIcon.png" style="height: 50px; width: 300px;"></button>
    <h1><i>重要事項</i></h1>
    <ul>
        <li>事項1</li>
        <br/>
        <hr/>
        <br/>
        <li>事項2</li>
        <br/>
        <hr/>
        <br />
        <li>事項3</li>
        <br />
        <hr/>
        <br/>
    </ul>

</body>
</html>