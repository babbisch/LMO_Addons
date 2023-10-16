<?php
require(dirname(__FILE__).'/../../init.php');
require_once(PATH_TO_ADDONDIR."/stats/ini.php");
require_once(PATH_TO_ADDONDIR."/classlib/classes.php");

if (!isset($cfgarray))$cfgarray=array();
	$multi1=PATH_TO_CONFIGDIR.'/stats/'.$multi.'.stats';            
	if (file_exists($multi1)) {                                     
  		$multi_cfgarray=parse_ini_file($multi1);         		
  		$multi_cfgarray+=$main_cfgarray;                              
  		extract ($multi_cfgarray);                       		 
	}else{                                                           
  die("Konfigurationsdatei: $multi1 nicht gefunden!");           
}                                                                
$i=1; $output=""; $fav_liga[]=array();
	while (isset($multi_cfgarray['liga'.$i])) {
		$fav_liga[$i]=$multi_cfgarray['liga'.$i];
 		$i++;
	}
$anzahl_ligen=--$i;
$a=$_GET["a"];
$b=$_GET["b"];  
$template_file=$multi_cfgarray['template'];
$template = new HTML_Template_IT( PATH_TO_TEMPLATEDIR.'/stats' );       
$template->loadTemplatefile($template_file.'.tpl.php');                  

include(PATH_TO_ADDONDIR."/stats/stats_view.php");

$template->show();
?>