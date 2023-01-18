<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style type="text/css">
        body {
            font-family: Calibri;
            font-size: 11pt
        }

        h2,
        p {
            margin: 0pt 0pt 8pt
        }

        li {
            margin-top: 0pt;
            margin-bottom: 8pt
        }

        h2 {
            margin-top: 12pt;
            margin-bottom: 3pt;
            page-break-after: avoid;
            font-family: Arial;
            font-size: 14pt;
            font-weight: bold;
            font-style: italic
        }

        span.InlineCode {
            font-family: Consolas;
            font-size: 10pt;
            color: #c7254e;
            background-color: #f9f2f4
        }
    </style>
    <script language="JavaScript">

        function showAccount(){
            var accountInfo = localStorage.getItem("nowUser");
            // //帳號,姓名,密碼,班級,角色
            // var accountTemp = accountInfo.substr(1);
            var accountInfoArray = accountInfo.split(",");
            var account = accountInfoArray[0];
            var name = accountInfoArray[1];

            document.getElementById('account').innerHTML = "目前帳號："+account+" "+name;
        }

        function edit(){

            //帳號,姓名,密碼,班級,角色
            var nowUser = (localStorage.getItem("nowUser")).split(",");
            var nowUserName = nowUser[1];
            var nowUserID = nowUser[0];
            var newPassword = document.getElementById('passwordInput').value;
            var PostInfo = nowUserID+","+newPassword;

            if(newPassword != ""&&newPassword.length<=10&&newPassword.indexOf(",")==-1){

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
                xmlhttp.onreadystatechange=function(){
                    //檢查'readyState'屬性的值是否為4，以及結果代碼200表明對請求的響應是成功的。。
                    if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    
                        var accountInfo = xmlhttp.responseText;
                        window.alert(accountInfo);
                        // window.alert("已發佈貼文");
                        location.href="Main.php";
                    }
                }
                //此方法傳遞了三個參數。 'GET'確定httprequest的類型。 'ajax.php'設置後端文件，並設置第三個參數'true'表示異步處理請求。
                xmlhttp.open("GET", encodeURI(encodeURI("ChangePassword_Ajax.php?name="+PostInfo)), true);
                xmlhttp.send();
            }else window.alert("密碼格式不正確");
        }
    </script>
</head>

<body onload="showAccount()">

    <button type="button" onclick="javascript:location.href='Main.php'" ><img src="sIcon.png" style="height: 50px; width: 300px;"></button>
    <div>
        
        <h2><span style="font-family:Calibri; font-weight:normal; font-style:normal">修改密碼</span></h2>
        <hr size="2" align="left" style="width:100%" />
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span id="account">目前帳號：</span></p>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>修改密碼：<span><input id="passwordInput" type="password"></span><button style="width: 70px; height: 25px; font-size: 15px; color: white; 
        background-color: grey;"   onclick="edit()">修改</button></span></p>
        <div>
            <hr size="2" align="left" style="width:100%" />
        </div>
        <p style="font-size:10pt"><span class="InlineCode">密碼分大小寫且限制10字元內英文數字之組合</span></p>
        
    </div>

</body>

</html>