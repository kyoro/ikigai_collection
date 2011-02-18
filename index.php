<html>
<head>
<meta name="viewport" content="width=320, user-scalable=no, maximum-scale=1"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>生きがいコレクション</title>
</head>
<body>
<?php
    ## config
    $my_page_url        = 'http://hakamastyle.net/ikigai/index.php';
    $taglet_endpoint    = 'http://nfc-taglet.com/request_tag.pl';
    $img_max = 38;

    $taglet_id = $_GET["taglet_id"];

    if(!$taglet_id){
        ## top menu
        $taglet_link = $taglet_endpoint . '?redirect_uri=' 
                       . mb_convert_encoding($my_page_url, 'UTF-8', 'auto') ;
        print "
            <a href='${taglet_link}'>
            <img src='img/logo.png' width='100%' />
            </a><br>
            あなたのカードに宿る「生きがいの天使」を診断します！画像をタッチして開始！
        ";
    }else{
        ## card view 
        $h = substr($taglet_id, 10, 2);
        $i =  hexdec($h);
        $num = $i % $img_max;
        $img_path = "img/item/$num.png";

        $love = hexdec(substr($taglet_id, 5, 2)) % 100;

        print "
            <center>
            <a href='${my_page_url}'>
            <img src='${img_path}' width='200' /><br />
            </a>
            </center>
            好感度 : ${love}%<br />
            画像をタッチしてメニューに戻るよ
        ";
    }
?>
</body>
</html>
