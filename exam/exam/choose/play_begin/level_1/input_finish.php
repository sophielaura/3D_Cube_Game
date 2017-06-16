<!--  -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$name = $_POST['name'];
$second = $_POST['second'];
$times = $_POST['times'];

//$second = "22";
//$times = "22";

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if(1)//$name != null && $second != null && $times != null)
{
        //新增資料進資料庫語法
        $sql = "insert into level1 (ID, NAME, SECOND,TIMES) values ('', '$name','$second','$times')";
        if(mysql_query($sql))
        {
                echo '新增成功!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '新增失敗!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
        echo '輸入資料錯誤!';
        //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>