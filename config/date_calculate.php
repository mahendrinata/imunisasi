<?php
function dateCalculate($date,$day){
  $days      = substr($date,8,2)+$day;
  $newDays   = $days%30;
  if($newDays == 0){
    $newDays = 30;
  }
  $tmpMonths = substr($date,5,2)+floor($days/30);
  $newMonths = $tmpMonths%12;
  if($newMonths == 0){
    $newMonths = 12;
  }
  $newYears  = substr($date,0,4)+floor($tmpMonths/12);
  $datetime = date_create($newYears."-".$newMonths."-".$newDays);
  return date_format($datetime, 'Y-m-d');
}
?>
