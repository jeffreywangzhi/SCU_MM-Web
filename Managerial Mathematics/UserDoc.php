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
</head>

<body>

    <button type="button" onclick="javascript:location.href='Main.php'" ><img src="sIcon.png" style="height: 50px; width: 300px;"></button>
    <div>
        <h2><span style="font-family:Calibri; font-weight:normal; font-style:normal">登入畫面</span></h2>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>預設帳號:學號</span></p>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>預設密碼:學號</span></p>
        <div>
            <hr size="2" align="left" style="width:100%" />
        </div>
        <p style="font-size:10pt"><span class="InlineCode">登入後即可看到以下三大區塊</span></p>
        <h2><span style="font-family:Calibri; font-weight:normal; font-style:normal">功能</span><span
                style="font-weight:normal; font-style:normal">1-</span><span
                style="font-family:Calibri; font-weight:normal; font-style:normal">每周課後意見討論區</span></h2>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>點擊進入，會顯示目前</span><span style="font-weight:bold">已發布之貼文</span><span></span></p>
        <ul type="circle" style="margin:0pt; padding-left:0pt">
            <li
                style="margin-left:65.6pt; padding-left:6.4pt; font-family:serif; -aw-font-family:'Courier New'; -aw-font-weight:normal; -aw-number-format:'o'">
                <span style="font-family:Calibri">貼文點擊後進入該貼文留言區，可以看到其他使用者的留言</span></li>
            <li
                style="margin-left:65.6pt; padding-left:6.4pt; font-family:serif; -aw-font-family:'Courier New'; -aw-font-weight:normal; -aw-number-format:'o'">
                <span style="font-family:Calibri">下方文字方塊能夠輸入想留言的內容，完成後點擊送出</span></li>
        </ul>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>點擊標題旁的</span><span style="font-weight:bold">新增問題</span><span>即可發問</span></p>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>點擊左上角的</span><span style="font-weight:bold">管理數學按鈕</span><span>可返回主畫面</span></p>
        <div>
            <hr size="2" align="left" style="width:100%" />
        </div>
        <h2><span style="font-family:Calibri; font-weight:normal; font-style:normal">功能</span><span
                style="font-weight:normal; font-style:normal">2-</span><span
                style="font-family:Calibri; font-weight:normal; font-style:normal">相關網站</span></h2>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>提供同學常用的平台或網站連結</span></p>
        <ul type="circle" style="margin:0pt; padding-left:0pt">
            <li
                style="margin-left:65.6pt; padding-left:6.4pt; font-family:serif; -aw-font-family:'Courier New'; -aw-font-weight:normal; -aw-number-format:'o'">
                <span style="font-family:Calibri">Moodle</span></li>
            <li
                style="margin-left:65.6pt; padding-left:6.4pt; font-family:serif; -aw-font-family:'Courier New'; -aw-font-weight:normal; -aw-number-format:'o'">
                <span style="font-family:Calibri">東吳校務系統</span></li>
            <li
                style="margin-left:65.6pt; padding-left:6.4pt; font-family:serif; -aw-font-family:'Courier New'; -aw-font-weight:normal; -aw-number-format:'o'">
                <span style="font-family:Calibri">東吳</span><span
                    style="font-family:Calibri; font-weight:bold">新</span><span style="font-family:Calibri">校務系統</span>
            </li>
            <li
                style="margin-left:65.6pt; padding-left:6.4pt; font-family:serif; -aw-font-family:'Courier New'; -aw-font-weight:normal; -aw-number-format:'o'">
                <span style="font-family:Calibri">二下行事曆</span></li>
        </ul>
        <div>
            <hr size="2" align="left" style="width:100%" />
        </div>
        <h2><span style="font-family:Calibri; font-weight:normal; font-style:normal">功能</span><span
                style="font-weight:normal; font-style:normal">3-</span><span
                style="font-family:Calibri; font-weight:normal; font-style:normal">密碼修改</span></h2>
        <p
            style="margin-left:36pt; text-indent:-18pt; -aw-import:list-item; -aw-list-level-number:0; -aw-list-number-format:'+'; -aw-list-number-styles:'bullet'; -aw-list-padding-sml:11.4pt">
            <span style="-aw-import:ignore"><span><span style="font-family:'Courier New'">+</span></span><span
                    style="width:11.4pt; font:7pt 'Times New Roman'; display:inline-block; -aw-import:spaces">&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
                </span></span><span>修改密碼功能</span></p>
    </div>
</body>

</html>