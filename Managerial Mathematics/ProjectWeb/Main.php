<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=devive-width, initial-scale=1.0"/>
    <title>管理數學學術討論區</title>
    <style>
       button{
           cursor: pointer;
       }
       *{
        font-family: Microsoft JhengHei;
       }
    </style>
    
    <script language="JavaScript">
        
        //顯示目前登入user
        function setUserID(){

            //帳號,姓名,密碼,班級,角色
            var nowUser = (localStorage.getItem("nowUser")).split(",");

            var nowUserName = nowUser[1];
            var nowUserID = nowUser[0];
            document.getElementById('showUserbox').innerHTML = "歡迎蒞臨: "+nowUserID+" "+nowUserName;
        }

        function logout(){
            localStorage.clear();
            location.href='Login.php';
        }
    </script>
</head>
<body onload="setUserID()">

    <img src="title.jpg" style="text-align: center;">   <!--封面圖片-->
    <span id="showUserbox" style="padding-left: 950px;"></span>    <!--顯示登入的使用者-->
    <!--登出鍵-->
    <span><button style="width: 100px; height: 40px; font-size: 20px; color: darkkhaki; 
    background-color: black;" onclick="logout()">登出</button></span>   

    <!--課後意見討論區-->
    <div>
        <span><img src="group_icon.png"></span>
        <h2><a href="DiscussionA.php">每週課後意見討論區_東吳資管A</a></h2>
    </div>
    <div>
        <span><img src="group_icon.png"></span>
        <h2><a href="DiscussionB.php">每週課後意見討論區_東吳資管B</a></h2>
    </div>
    <br/>
    <hr/>

    <!--相關網站-->
    <div>
        <span><img src="website_icon.png"></span>
        <h2><a href="Reference.php">相關網站</a></h2>
    </div>
    <br/>
    <hr/>

    <!--密碼修改-->
    <div>
        <span><img src="key.png"></span>
        <h2><a href="ChangePassword.php">密碼修改</a></h2>
    </div>
    <br/>
    <hr/>
    
    <!--系統使用者說明書-->
    <div>
        <span><img src="doc.png"></span>
        <h2><a href="UserDoc.php">系統使用者說明書</a></h2>
    </div>
    <br/>
    <hr/>

</body>
</html>

