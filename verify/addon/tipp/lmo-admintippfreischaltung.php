<?php 
/** Liga Manager Online 4
  *
  * http://lmo.sourceforge.net/
  *
  * This program is free software; you can redistribute it and/or
  * modify it under the terms of the GNU General Public License as
  * published by the Free Software Foundation; either version 2 of
  * the License, or (at your option) any later version.
  * 
  * This program is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
  * General Public License for more details.
  *
  * REMOVING OR CHANGING THE COPYRIGHT NOTICES IS NOT ALLOWED!
  *
  */
  

require_once(PATH_TO_ADDONDIR."/tipp/lmo-tipptest.php");
$prot = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https:" : "http:";
$tipp_mailtext = str_replace(array('\n','[nick]','[pass]'),array("\n",$xtippernick,$xtipperpass),$text['tipp'][298]);
tippsend($text['tipp'][77], $tipp_mailtext, $xtipperemail, $text['tipp'][0], $aadr);

?>