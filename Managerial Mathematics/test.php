<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>AJAX-站內搜尋</title>
<style>
  h1, h2, h3, h4{ font-family: '微軟正黑體';}
  table {
    border-collapse: collapse;
    text-align: center;
    margin: 20px 0 0 0px; /*外距:上右下左*/
    box-shadow: 0px 15px 22px rgba(0, 0, 0, 0.2);
    width: 100%;
  }
  th {
    background-color: #f7c24a;
    border : 2px solid black;
    padding: 5px;
  }
  td {
    color: #5b3202;
    border : 3px solid black;
    padding: 5px;
  }
  .section-1 {
  padding-top:  50px;
  }
  .box1{
    height: 400px;
    width: 100%;
    position: absolute; /*絕對位置*/
    border: 4px solid #ab0303;
    border-radius: 5px;
  }
  .panel1{
    background-color: #fffebd;
    padding-top: 120px;
  }
  .panel2{
    padding-top: 30px;
  }
</style>
<script>
function showSite(str)
{
    if (str == "")
    {
        //收集輸入字段的值，其id為“txtHint”。
        document.getElementById("txtHint").innerHTML="";
        return;
    }
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
            //設置要在div中顯示的字符串的值，其id為'txtHint'，作為XMLHttpRequest物件的'responseText'屬性。 'responseText'是對文本請求的響應。
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    //此方法傳遞了三個參數。 'GET'確定httprequest的類型。 'ajax.php'設置後端文件，並設置第三個參數'true'表示異步處理請求。
    xmlhttp.open("GET", "ajax.php?name="+str, true);
    xmlhttp.send();
}
</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body align="center">
<section class="section-1">
  <div class="container alert text-center">
    <div class="row box1">
      <div class="col-md-5 col-sm-12 panel1">
        <h4 style="color:black;">AJAX-站內搜尋</h4>
          <input name="name" onkeyup="showSite(this.value)">
          <p>請輸入您要查詢的名字</p>
      </div>
      <div class="col-md-7 col-sm-12 panel2">
        <div class="text-center">
          <div id="txtHint">
            <img src="https://4.bp.blogspot.com/-jdGreROMIPs/XEKoh9IsHUI/AAAAAAAAHwU/z-85iqyPyfkxud0Uov1tsFI1fK9zuHVSQCK4BGAYYCw/s1600/%25E8%25B3%25BD%25E4%25BA%259E%25E4%25BA%25BA%25E5%2598%259F%25E5%2598%25B4.jpg">
            <br>
            <b>查詢結果會秀出在這邊呦~~棧友們</b>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>