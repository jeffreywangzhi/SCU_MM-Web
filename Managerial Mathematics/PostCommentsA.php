<?php header("content-type:text/html;charset=utf-8"); //設定編碼 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>某則留言</title>
    <style>
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

        //顯示貼文
        function showPost(){

            var postID = localStorage.getItem("linkId");

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
                    var accountTemp = accountInfo.substr(2);
                    var accountInfoArray = accountTemp.split(";");

                    //ID,NAME,POSTID,CONTENT,DATE
                    var postTemp = accountInfoArray[0].split(",");
                    var authorID = postTemp[0];
                    var authorName = postTemp[1];
                    var postContent = postTemp[3];
                    var postDateTemp = postTemp[4];
                    var postContentMonth = postDateTemp.substr(5,2);
                    var postContentDay = postDateTemp.substr(8,2);
                    var postContentDate = postContentMonth+"/"+postContentDay;

                    document.getElementById("postContent").innerHTML = postContent;
                    document.getElementById("postAuthor").innerHTML = authorName;
                    document.getElementById("postDate").innerHTML = "  ||  發布日期: "+postContentDate;
                    document.getElementById("myComment").value = "";

                    var commentCount = accountInfoArray[1];
                    localStorage.setItem("commentCount",commentCount);
                    var commentsArr = accountInfoArray.slice(2);

                    for(var i = 0 ; i<commentsArr.length;i++){
                        if(commentsArr[i]!=""){
                            var pointerStr = "c";
                            var pointerH = "h";
                            var pointerNum = String(i+1);
                            var pointer = pointerStr+pointerNum;
                            var pointer2 = pointerH+pointerNum;
                            document.getElementById(pointer).innerHTML = String(commentsArr[i]);
                            document.getElementById(pointer).style.display = 'block';
                            document.getElementById(pointer2).style.display = 'block';
                        }else break;
                    }
                }
            }
            //此方法傳遞了三個參數。 'GET'確定httprequest的類型。 'ajax.php'設置後端文件，並設置第三個參數'true'表示異步處理請求。
            xmlhttp.open("GET", encodeURI(encodeURI("PostCommentsShowA_Ajax.php?name="+postID)), true);
            xmlhttp.send();
        }

        //留言功能
        function comment(){

            var postID = localStorage.getItem("linkId");
            var commentCount = localStorage.getItem("commentCount");
            var newCommentContent = document.getElementById('myComment').value;

            //id,count,comment
            var PostInfo = String(postID)+","+String(commentCount)+","+String(newCommentContent);

            if(commentCount == 20){
                window.alert("留言數量已到達上限");                        
                location.href="PostCommentsA.php";
            }else if(newCommentContent.indexOf(",")!=-1){
                window.alert("請調整留言內容");
            }else if(newCommentContent != ""&&newCommentContent.length<=50){
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
                        location.href="PostCommentsA.php";
                    }
                }
                //此方法傳遞了三個參數。 'GET'確定httprequest的類型。 'ajax.php'設置後端文件，並設置第三個參數'true'表示異步處理請求。
                xmlhttp.open("GET", encodeURI(encodeURI("PostCommentsA_Ajax.php?name="+PostInfo)), true);
                xmlhttp.send();
            }else{
                window.alert("請輸入貼文內容！");
            }
            
            // postView = JSON.parse(localStorage.getItem("postView"));
            // postID = parseInt(postView[2]);
            // commentData = JSON.parse(localStorage.getItem("commentData"));
            // selectCD = commentData[postID-1];

            // newCommentContent = document.getElementById('myComment').value;

            // newCommentContent != ""){

            // selectCD=selectCD+","+newCommentContent;
            // commentData[postID-1] = selectCD;
            // localStorage.setItem("commentData",JSON.stringify(commentData));
            // onload();
            // e{
            // ow.alert("請輸入留言內容！");
        }
            
    </script>
</head>

<body onload="showPost()">
    <button type="button" onclick="javascript:location.href='Main.php'" ><img src="sIcon.png" style="height: 50px; width: 300px;"></button>
    <br/>

    <div style="border:5px rgb(2, 27, 73) double ; margin-top: 20px; padding: 20px; background-color: rgb(255, 253, 234);">
        <b><span id="postContent" style="font-size: 25px;"></span></b>
        <b><span style="padding-left: 60px; font-size: 17px;" >發布人:</span></b>
        <b><span id="postAuthor" style="font-size: 17px;"></span></b>
        <b><span id="postDate" style="font-size: 17px;">|| 發布日期:</span></b>

        <h3 style="padding-left: 5px;">-------留言-------</h3>
        <hr id="h1" style="display:none"/>
        <p id="c1" style="display:none">留言1</p>
        <hr id="h2" style="display:none"/>
        <p id="c2" style="display:none">留言2</p>
        <hr id="h3" style="display:none"/>
        <p id="c3" style="display:none">留言3</p>
        <hr id="h4" style="display:none"/>
        <p id="c4" style="display:none">留言4</p>
        <hr id="h5" style="display:none"/>
        <p id="c5" style="display:none">留言5</p>
        <hr id="h6" style="display:none"/>
        <p id="c6" style="display:none">留言6</p>
        <hr id="h7" style="display:none"/>
        <p id="c7" style="display:none">留言7</p>
        <hr id="h8" style="display:none"/>
        <p id="c8" style="display:none">留言8</p>
        <hr id="h9" style="display:none"/>
        <p id="c9" style="display:none">留言9</p>
        <hr id="h10" style="display:none"/>
        <p id="c10" style="display:none">留言10</p>
        <hr id="h11" style="display:none"/>
        <p id="c11" style="display:none">留言11</p>
        <hr id="h12" style="display:none"/>
        <p id="c12" style="display:none">留言12</p>
        <hr id="h13" style="display:none"/>
        <p id="c13" style="display:none">留言13</p>
        <hr id="h14" style="display:none"/>
        <p id="c14" style="display:none">留言14</p>
        <hr id="h15" style="display:none"/>
        <p id="c15" style="display:none">留言15</p>
        <hr id="h16" style="display:none"/>
        <p id="c16" style="display:none">留言16</p>
        <hr id="h17" style="display:none"/>
        <p id="c17" style="display:none">留言17</p>
        <hr id="h18" style="display:none"/>
        <p id="c18" style="display:none">留言18</p>
        <hr id="h19" style="display:none"/>
        <p id="c19" style="display:none">留言19</p>
        <hr id="h20" style="display:none"/>
        <p id="c20" style="display:none">留言20</p>
        <hr/>
        <h4 style="border: 10px rgba(167, 167, 167, 0.932) solid; 
        margin-left:-20px; margin-right:-20px;"></h4>

        <textarea id="myComment" rows="5" cols="55" placeholder="請輸入您想留的話~"></textarea>
        <button style="width: 70px; height: 25px; font-size: 15px; color: white; 
        background-color: grey;" onclick="comment()">送出</button>
    </div>
    <p style="font-size:10pt"><span class="InlineCode">留言內容請使用中文全形逗號"，"禁止使用半形逗號","</span></p>
    <p style="font-size:10pt"><span class="InlineCode">留言字數上限為50字元</span></p>



</body>
</html>