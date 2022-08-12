<!-- 用程式產生資料 寫進資料庫 -->

<?php
include_once "base.php";
$movie=['院線片1','院線片2','院線片3','院線片4'];
$session=[
'1'=>"14:00~16:00",
'2'=>"16:00~18:00",
'3'=>"18:00~20:00",
'4'=>"20:00~22:00",
'5'=>"22:00~24:00"];
for($i=0;$i<10;$i++)
// <!-- 讓他跑10次 -->
{
$data=[];
// 陣列
$data['no']=date("Ymd") . sprintf("%04d",($Order->math('max','id')+1));
$data['movie']=$movie[rand(0,3)];
// 利用rand找出 rand出來的數值去$movie找

$data['date']=date("Y-m-d",strtotime("+".rand(0,3)." days"));

$data['session']=$session[rand(1,5)];
// 請幫我找一個隨機的場次

$data['qt']=rand(1,4);
// 產生座位
$seats=[];
// 座位數
// /  用迴圈 產生一個不重複內容的陣列
while(count($seats)<$data['qt']){
   $s=rand(0,19); 
   if(!in_array($s,$seats)){
    $seats[]=$s;
   }
}

$data['seats']=serialize($seats);
$Order->save($data);
// dd($data);
}
