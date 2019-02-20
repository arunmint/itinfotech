<?php
$time = strtotime(date("Y-m-d")); // 20091030
$day = 60*60*24*10;
for($i = 0; $i<14; $i++)
{
$the_time = $time+($day*$i);
$date = date('Y-m-d',$the_time)."<br>";
}
?>