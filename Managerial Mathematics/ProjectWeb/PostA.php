<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問題範例</title>
    <style>
        *{
            background-color: rgb(255, 255, 255);
        }
        button{
           cursor: pointer;
       }
       span.InlineCode {
            font-family: Consolas;
            font-size: 10pt;
            color: #c7254e;
            background-color: #f9f2f4
        }
    </style>

    <script language="JavaScript">
        //發布日期顯示
        function ShowTime(){
            var NowDate=new Date();
            var y=NowDate.getFullYear();
            var m=NowDate.getMonth()+1;
            var d=NowDate.getDate();
            var h=NowDate.getHours();
            var mm=NowDate.getMinutes();
            document.getElementById('showbox').innerHTML = "發布日期: "+y+" 年 "+m+" 月 "+d+" 日 "+h+" 點 "+mm+" 分 ";
        }
        //發布人顯示
        function ShowUser(){
            //帳號,姓名,密碼,班級,角色
            var nowUser = (localStorage.getItem("nowUser")).split(",");
            var nowUserName = nowUser[1];
            var nowUserID = nowUser[0];
            document.getElementById('showboxUser').innerHTML = "發佈人: "+nowUserID+" "+nowUserName;
        }
        function post()
        {
            //帳號,姓名,密碼,班級,角色
            var nowUser = (localStorage.getItem("nowUser")).split(",");
            var nowUserName = nowUser[1];
            var nowUserID = nowUser[0];
            var newPostContent = document.getElementById('newPostContent').value;
            
            if(newPostContent.indexOf(",")==-1){
                
                var NowDate=new Date();
                var y=NowDate.getFullYear();
                var m=NowDate.getMonth()+1;
                var d=NowDate.getDate();
                var h=NowDate.getHours();
                var mm=NowDate.getMinutes();
                
                var getDate = y+"-"+m+"-"+d+" "+h+":"+mm;
                var PostInfo = nowUserID+","+nowUserName+","+newPostContent+","+getDate;

                if(newPostContent != ""&&newPostContent.length<100){

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
                        location.href="DiscussionA.php";
                    }
                }
                //此方法傳遞了三個參數。 'GET'確定httprequest的類型。 'ajax.php'設置後端文件，並設置第三個參數'true'表示異步處理請求。
                xmlhttp.open("GET", encodeURI(encodeURI("PostA_Ajax.php?name="+PostInfo)), true);
                xmlhttp.send();
                }else{
                window.alert("請輸入貼文內容！");
                }
            }else window.alert("請調整貼文內容!");
            
        }
    </script>
</head>
<body onload="ShowTime(),ShowUser()">
    <button type="button" onclick="javascript:location.href='Main.php'" ><img src="sIcon.png" style="height: 50px; width: 300px;"></button>
    <h1>問題簡述</h1>
    <div style="border:5px rgb(2, 27, 73) double ; margin-top: 20px; padding: 20px; background-color: rgb(255, 253, 234);">
        <!--貼文內容輸入欄-->
        <textarea id="newPostContent" name="myComment" rows="8" cols="55" placeholder="請輸入您想留的話~"></textarea>
        <!--發布POST按鈕-->
        <button style="width: 70px; height: 25px; font-size: 15px; color: white; 
        background-color: grey;"   onclick="post()">POST</button>
        <!--發布日期/發布人顯示-->
        
        <div id="showbox" style="background-color:  rgb(255, 253, 234);"></div>
        <div id="showboxUser" style="background-color:  rgb(255, 253, 234);"></div>
        
    
    </div> 
    <p style="font-size:10pt"><span class="InlineCode">貼文內容請使用中文全形逗號"，"禁止使用半形逗號","</span></p>
    <p style="font-size:10pt"><span class="InlineCode">貼文字數上限為100字元</span></p>

</body>
</html>