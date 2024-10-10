<?php
require_once(__DIR__.'/../../init.php');

$pswfile=PATH_TO_ADDONDIR."/tipp/".$tipp_tippauthtxt;
$users = file($pswfile);
array_unshift($users,'');

$mail=$_GET['verify'];

if ($mail != "") {
  $gef=0;
  for($i=1;$i<count($users) && $gef==0;$i++){
    $tipp_tipperdaten = explode('|',$users[$i]);
    if($mail==$tipp_tipperdaten[4]){ 
      $gef=1;
      $save=$i;
      $tipp_tipperdaten[2] = 5;
      $users[$save] =$tipp_tipperdaten[0]."|".$tipp_tipperdaten[1]."|".$tipp_tipperdaten[2]."|".$tipp_tipperdaten[3]."|".$tipp_tipperdaten[4]."|";
      $users[$save].=$tipp_tipperdaten[5]."|".$tipp_tipperdaten[6]."|".$tipp_tipperdaten[7]."|".$tipp_tipperdaten[8]."|".$tipp_tipperdaten[9]."|";
      $users[$save].=$tipp_tipperdaten[10]."|EOL";
      require(PATH_TO_ADDONDIR."/tipp/lmo-tippsaveauth.php");
    }
  }
}
?>