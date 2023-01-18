<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <style>
        *{ background-color: grey;
            font-family: DFKai-sb;
        }
        /*使登入框框置中*/
        .login{
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px; 
        }
        button{
           cursor: pointer;
       }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script language="JavaScript">

        //登入帳號密碼檢核
        //正確進入主畫面
        //錯誤跳出訊息視窗
        function identify()
        {
            localStorage.clear();
            var accountInput = document.getElementById("accountInput").value;
            var passwordInput = document.getElementById('passwordInput').value;
            if (window.XMLHttpRequest)
            {
                // IE7+, Firefox, Chrome, Opera, Safari 瀏覽器執行碼(建立物件)
                xmlhttp = new XMLHttpRequest();
            }
            else
            {
                // IE6, IE5 瀏覽器執行碼(建立物件)
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            //'onreadystatechange'是XMLHttpRequest物件的屬性，只要'readyState'屬性發生更改，就會調用該屬性。 我們將其分配給下一個要宣告的函數。
            xmlhttp.onreadystatechange=function()
            {
                //檢查'readyState'屬性的值是否為4，以及結果代碼200表明對請求的響應是成功的。。
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    var accountInfo = xmlhttp.responseText;
                    //帳號,姓名,密碼,班級,角色
                    var accountTemp = accountInfo.substr(2);
                    var accountInfoArray = accountTemp.split(",");
                    var accountPassword = accountInfoArray[2];
                    if(accountPassword!=null&&accountPassword!=""){
                        if(accountPassword==passwordInput){
                            localStorage.setItem("nowUser",accountTemp);
                            location.href="Main.php";
                        }else{
                            window.alert("incorrect password!!!");
                        }
                    }else{
                        window.alert("incorrect account!!!");
                    }
                }
            }
            //此方法傳遞了三個參數。 'GET'確定httprequest的類型。 'ajax.php'設置後端文件，並設置第三個參數'true'表示異步處理請求。
            xmlhttp.open("GET", "Login_Ajax.php?name="+accountInput, true);
            xmlhttp.send();
        }

        

    </script>

</head>
<body onload="">
    <!--由上而下為:返回按鈕、一個有外框的div、帳號密碼輸入框、登入按鈕-->
    <button type="button" onclick="javascript:location.href='Main.php'" ><img src="title.jpg" style="height: 50px; width: 300px;"></button>
    <h1 style="color: white; text-align: center;">~~登入系統~~</h1>
    <div class="login" style="border: 10px solid; color: white; padding: 40px; width: 500px; height: 100px;" >
        <br/>
        <span style="margin-left: 125px; ">帳號:</span> <span><input id="accountInput"></span>
        <br/>
        <span style="margin-left: 125px; ">密碼:</span> <span><input id="passwordInput" type="password"></span>
        <br/>
    <button style="width: 100px; height: 30px; font-size: 20px; color: darkkhaki; background-color: black; 
    margin-left: 235px;" onclick="identify()">登入</button>
    </div>
    </div>
    
</body>
</html>