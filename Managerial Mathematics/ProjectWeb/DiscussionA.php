<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問題討論區</title>
    <style>
         button{
           cursor: pointer;
       }
    </style>
    <script language="JavaScript">

        function showRight(){
            //帳號,姓名,密碼,班級,角色
            var nowUser = (localStorage.getItem("nowUser")).split(",");

            var nowUserName = nowUser[1];
            var nowUserID = nowUser[0];
            var userClass = nowUser[3];

            if(userClass!="A"&&userClass!="S"){
                window.alert("You don't have the right to access this website, please contact the system admin.");
                location.href="Main.php";
            }else showPost(1);
        }
        //從DB撈出貼文資料並顯示在下方區塊
        //作者,內容,ID,日期
        function showPost(page)
        {
            //偵測上一頁/下一頁
            if(page==1){
                localStorage.setItem("page",1);
                document.getElementById("priPage").disabled=true;
            }else if(page=="+"){
                localStorage.setItem("page",parseInt(localStorage.getItem("page"))+1);
                document.getElementById("priPage").disabled=false;
            }else if(page=="-"){
                localStorage.setItem("page",parseInt(localStorage.getItem("page"))-1);
                document.getElementById("nextPage").disabled=false;
            }

            if(localStorage.getItem("pageLimitUp")==localStorage.getItem("page")){
                document.getElementById("nextPage").disabled=true;
            }else if(localStorage.getItem("page")==1){
                document.getElementById("priPage").disabled=true;
            }

            var endPost = parseInt(localStorage.getItem("page"))*10;
            var startPost = endPost-10;

            var accountInput = "123";
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
                    var accountInfoArray = accountTemp.split(";");
                    var postTemp = accountInfoArray[0].split(",");
                    var postCount = postTemp[2];
                    localStorage.setItem("postCount",postCount);

                    if(postCount<endPost){
                        endPost = postCount;
                    }

                    var num = 1;
                    var nowDataList = [];
                    var tempValue = 0;
                    
                    //列出貼文和顯示隱藏區塊
                    for(var i = startPost ; i < endPost ; i ++){

                        var pointerStr = "post";
                        var pointerDiv = "div";
                        var pointerDa = "d";
                        var pointerNum = String(num);
                        var pointerNumD = String(num+1);
                        var pointer = pointerStr+pointerNum;
                        var pointerD = pointerDiv+pointerNum;
                        var pointerD2 = pointerDiv+pointerNumD;
                        var pointerDate = pointerDa+pointerNum;
                    
                        //ID,NAME,POSTID,CONTENT,DATE
                        var postContentTemp = accountInfoArray[i].split(",");
                        var postAuthor = postContentTemp[1];
                        var postContentAd = postContentTemp[3];
                        if(postContentTemp[0]==""){
                            break;
                        }
                        var postContentMonth = postContentTemp[4].substr(5,2);
                        var postContentDay = postContentTemp[4].substr(8,2);
                        var postContentDate = postContentMonth+"/"+postContentDay;

                        var inputContent = postContentAd+" by..."+postAuthor;
                        // nowDataList.push(inputContent);
                        if(pointerNum<11){
                            document.getElementById(pointer).innerHTML = inputContent;
                            document.getElementById(pointerD).style.display = 'block';
                            document.getElementById(pointer).style.display = 'block';
                            document.getElementById(pointerD2).style.display = 'block';
                            document.getElementById(pointerDate).innerHTML = postContentDate;
                            document.getElementById(pointerDate).style.display = 'block';
                        }
                        num++;
                    }

                    if(endPost%10!=0){
                        for(var i = endPost%10+1;i<11;i++){

                            var pointerStr = "post";
                            var pointerDiv = "div";
                            var pointerDa = "d";
                            var pointerNum = String(i);
                            var pointerNumD = String(i+1);
                            var pointer = pointerStr+pointerNum;
                            var pointerD = pointerDiv+pointerNum;
                            var pointerD2 = pointerDiv+pointerNumD;
                            var pointerDate = pointerDa+pointerNum;
                            document.getElementById(pointerD).style.display = 'none';
                            document.getElementById(pointer).style.display = 'none';
                            document.getElementById(pointerD2).style.display = 'none';
                            document.getElementById(pointerDate).style.display = 'none';
                        }
                    }
                    var tempStr = "div"+String(endPost%10+1);
                    document.getElementById(tempStr).style.display = 'block';
                    localStorage.setItem("pageLimitUp",Math.ceil(postCount/10));
                    localStorage.setItem("pageLimitDown",1);
                }
                
            }
            //此方法傳遞了三個參數。 'GET'確定httprequest的類型。 'ajax.php'設置後端文件，並設置第三個參數'true'表示異步處理請求。
            xmlhttp.open("GET", "DiscussionA_Ajax.php?name="+accountInput, true);
            xmlhttp.send();
            
            
        }
        
        //點擊貼文後連結留言
        function linkPost(id){
            xmlhttp.abort();
            var array = id.split("t");
            var numOfOrder = parseInt(array[1]);
            var nowPage = parseInt(localStorage.getItem("page"));
            var postCount = parseInt(localStorage.getItem("postCount"));

            var linkId = postCount-(((nowPage-1)*10)+numOfOrder-1);
            localStorage.setItem("linkId",linkId);
        }
    </script>
</head>
<body onload="showRight()">
    <button type="button" onclick="javascript:location.href='Main.php'">
        <img src="sIcon.png" style="height: 50px; width: 300px;"></button>
       
    <br/>
    <br/>
        <span style="font-size: 32px;"><i><b>課後意見討論區<b></i></span>
        <span style="padding-left:30px; "><button onclick="javascript:location.href='PostA.php'" 
            style="width: 90px; height: 35px; font-size: 15px; color: white; 
            background-color: grey; ">新增問題</button><button id="priPage" onclick="showPost('-')" 
            style="width: 90px; height: 35px; font-size: 15px; color: white; 
            background-color: grey; ">上一頁</button><button id="nextPage" onclick="showPost('+')" 
            style="width: 90px; height: 35px; font-size: 15px; color: white; 
            background-color: grey; ">下一頁</button></span>
    <ul>
        <hr id="div1" style="display:none"/>
        <br/>
        <div id="d1" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post1" onclick="linkPost(id)" style="display:none">問題1</div>
        </a>
        <br/>
        <hr id="div2" style="display:none"/>
        <br/>
        <div id="d2" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post2" onclick="linkPost(id)" style="display:none">問題2</div>
        </a>
        <br/>
        <hr id="div3" style="display:none"/>
        <br/>
        <div id="d3" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post3" onclick="linkPost(id)" style="display:none">問題3</div>
        </a>
        <br/>
        <hr id="div4" style="display:none"/>
        <br/>
        <div id="d4" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post4" onclick="linkPost(id)" style="display:none">問題4</div>
        </a>
        <br/>
        <hr id="div5" style="display:none"/>
        <br/>
        <div id="d5" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post5" onclick="linkPost(id)" style="display:none">問題5</div>
        </a>
        <br/>
        <hr id="div6" style="display:none"/>
        <br/>
        <div id="d6" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post6" onclick="linkPost(id)" style="display:none">問題6</div>
        </a>
        <br/>
        <hr id="div7" style="display:none"/>
        <br/>
        <div id="d7" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post7" onclick="linkPost(id)" style="display:none">問題7</div>
        </a>
        <br/>
        <hr id="div8" style="display:none"/>
        <br/>
        <div id="d8" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post8" onclick="linkPost(id)" style="display:none">問題8</div>
        </a>
        <br/>
        <hr id="div9" style="display:none"/>
        <br/>
        <div id="d9" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post9" onclick="linkPost(id)" style="display:none">問題9</div>
        </a>
        <br/>
        <hr id="div10" style="display:none"/>
        <br/>
        <div id="d10" style="display:none"></div>
        <a href="PostCommentsA.php">
            <div id="post10" onclick="linkPost(id)" style="display:none">問題10</div>
        </a>
        <br/>
        <hr id="div11" style="display:none"/>
    </ul>
    <!--學生新增問題的按鈕-->
    
</body>                                 
</html>