<?php
  function getmicrotime()
  {
      list($usec, $sec) = explode(" ", microtime());
      return((float)$usec + (float)$sec);
  }
  $mymulti = substr($multi, 0, strripos($multi, '/'));
  $time_start = getmicrotime();
  $aspiele = 0;
  $asieg = 0;
  $aunentschieden = 0;
  $aniederlage = 0;
  $aspieleh = 0;
  $asiegh = 0;
  $aunentschiedenh = 0;
  $aniederlageh = 0;
  $aspielea = 0;
  $asiega = 0;
  $aunentschiedena = 0;
  $aniederlagea = 0;
  $aptoreh = 0;
  $amtoreh = 0;
  $aptorea = 0;
  $amtoreh = 0;
  $amtorea = 0;
  $Spielm = $multi_cfgarray['spieltageminus'];
  $Spielp = $multi_cfgarray['spieltageplus'];
  
  $tabstat = "";
  $tabstat .= "div class='container'>\n";
  $tabstat .= "<div class='row'>\n";
  $tabstat .= "<div class='col'>" . $text['stats'][30] . "</div>\n";
  $tabstat .= "</div>\n";
  $tabstat .= "<div class='row'>\n";
  $tabstat .= "<div class='col-3 text-start'><b>" . $text['stats'][21] . "</b></div>\n";
  $tabstat .= "<div class='col-1'><b>" . $text['stats'][22] . "</b></div>\n";
  $tabstat .= "<div class='col-1'><b>" . $text['stats'][23] . "</b></div>\n";
  $tabstat .= "<div class='col-1'><b>" . $text['stats'][24] . "</b></div>\n";
  $tabstat .= "<div class='col-1'><b>" . $text['stats'][25] . "</b></div>\n";
  $tabstat .= "<div class='col-1'><b>" . $text['stats'][26] . "</b></div>\n";
  $tabstat .= "<div class='col-1'><b>" . $text['stats'][37] . "</b></div>\n";
  $tabstat .= "</div>\n";
  
  $spielstat = "";
  $spielstat .= "<div class='container'>\n";
  $spielstat .= "<div class='row'>\n";
  $spielstat .= "<div class='col'>" . $text['stats'][50] . " " . $a . "</div>\n";
  $spielstat .= "</div>\n";
  $spielstat .= "<div class='row'>\n";
  $spielstat .= "<div class='col-2 text-start'><b>" . $text['stats'][51] . "</b></div>\n";
  $spielstat .= "<div class='col-3'><b>" . $text['stats'][52] . "</b></div>\n";
  $spielstat .= "<div class='col-3'><b>" . $text['stats'][53] . "</b></div>\n";
  $spielstat .= "</div>\n";
  
  $spielbstat = "";
  $spielbstat .= "<div class='container'>\n";
  $spielbstat .= "<div class='row'>\n";
  $spielbstat .= "<div class='col'>" . $text['stats'][50] . " " . $b . "</div>\n";
  $spielbstat .= "</div>\n";
  $spielbstat .= "<div class='row'>\n";
  $spielbstat .= "<div class='col-2 text-start'><b>" . $text['stats'][51] . "</b></div>\n";
  $spielbstat .= "<div class='col-3'><b>" . $text['stats'][52] . "</b></div>\n";
  $spielbstat .= "<div class='col-3'><b>" . $text['stats'][53] . "</b></div>\n";
  $spielbstat .= "</div>\n";
  
  for ($i = 1; $i <= 1; $i++) {
      $akt_liga = new liga();
      //if ($akt_liga->loadFile(PATH_TO_LMO.'/'.$dirliga.$fav_liga[$i]) == FALSE) {   
      if ($akt_liga->loadFile(PATH_TO_LMO . '/' . $dirliga . $mymulti . '/' . $fav_liga[$i]) == FALSE) {
          echo "<font color=\"red\">" . $text['stats'][12] . " ($fav_liga[$i])</font>";
      } else {
          $spTag = "";
          $table = $akt_liga->calcTable($spTag);
          $keys = array_keys($table[0]);
          $pos = 1;
          foreach ($table as $tableRow) {
              $tabTableRow = array();
              foreach ($keys as $key) {
                  $tabTableRow[$key] = $key == 'team' ? $tableRow[$key]->name : $tableRow[$key];
              }
              $tabTableRow['pos'] = $pos++;
              $tabTable[] = $tabTableRow;
              if (($tabTableRow['team'] == $a)) {
                  $tabstat .= "<div class='row'>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[pos]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[team]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[spiele]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[s]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[u]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[n]</div>\n";
                  $tabstat .= "<div class='col-2'>$tabTableRow[pTor]:$tabTableRow[mTor]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[pPkt]</div>\n";
                  $tabstat .= "</div>\n";
              } elseif ($tabTableRow['team'] == $b) {
                  $tabstat .= "<div class='row'>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[pos]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[team]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[spiele]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[s]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[u]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[n]</div>\n";
                  $tabstat .= "<div class='col-2'>$tabTableRow[pTor]:$tabTableRow[mTor]</div>\n";
                  $tabstat .= "<div class='col-1'>$tabTableRow[pPkt]</div>\n";
                  $tabstat .= "</div>\n";
                  $sptest = $akt_liga->aktuellerSpieltag();
                  $aktueller_spieltag = $sptest->nr;
                  $start = $aktueller_spieltag - intval($Spielm);
                  $ende = $aktueller_spieltag + intval($Spielp) - 1;
                  if ($ende < $akt_liga->spieltageCount()) {
                      $ende = $akt_liga->spieltageCount();
                  }
                  if ($start < 1)
                      $start = 1;
                  for ($spieltag = $start; $spieltag <= $ende; $spieltag++) {
                      $akt_spieltag = $akt_liga->spieltagForNumber($spieltag);
                      foreach ($akt_spieltag->partien as $yPartie) {
                          if (($yPartie->heim->name == $a) or ($yPartie->gast->name == $a)) {
                              $Datum = $yPartie->datumString($leer = '__.__.____');
                              $Zeit = $yPartie->zeitString($leer = '__:__ ') . " Uhr";
                              $Heim = $yPartie->heim->name;
                              $Gast = $yPartie->gast->name;
                              $Tore = ($yPartie->hToreString() . " : " . $yPartie->gToreString());
                              if ($Heim == $a) {
                                  $spielstat .= "<div class='row' id='1'>\n";
                                  $spielstat .= "<div class='col-2 text-start'>" . $Datum . " " . $Zeit . "</div>\n";
                                  $spielstat .= "<div class='col-3'>" . $Gast . $text['stats'][28] . "</strong></div>\n";
                                  $spielstat .= "<div class='col-1'>" . $Tore . "</div>\n";
                                  $spielstat .= "</div>\n";
                              } elseif ($Gast == $a) {
                                  $spielstat .= "<div class='row'>\n";
                                  $spielstat .= "<div class='col-2 text-start'>" . $Datum . " " . $Zeit . "</div>\n";
                                  $spielstat .= "<div class='col-3'>" . $Heim . $text['stats'][29] . "</div>\n";
                                  $spielstat .= "<div class='col-1'>" . $Tore . "</div>\n";
                                  $spielstat .= "</div>\n";
                              }
                          }
                          if (($yPartie->heim->name == $b) or ($yPartie->gast->name == $b)) {
                              $Datumb = $yPartie->datumString($leer = '__.__.____');
                              $Zeitb = $yPartie->zeitString($leer = '__:__ ') . " Uhr";
                              $Heimb = $yPartie->heim->name;
                              $Gastb = $yPartie->gast->name;
                              $Toreb = ($yPartie->hToreString() . " : " . $yPartie->gToreString());
                              if ($Heimb == $b) {
                                  $spielbstat .= "<div class='row'>\n";
                                  $spielbstat .= "<div class='col-2 text-start'>" . $Datumb . " " . $Zeitb . "</div>\n";
                                  $spielbstat .= "<div class='col-3'>" . $Gastb . $text['stats'][28] . "</strong></div>\n";
                                  $spielbstat .= "<div class='col-1'>" . $Toreb . "</div>\n";
                                  $spielbstat .= "</div>\n";
                              } elseif ($Gastb == $b) {
                                  $spielbstat .= "<div class='row'>\n";
                                  $spielbstat .= "<div class='col-2 text-start'>" . $Datumb . " " . $Zeitb . "</div>\n";
                                  $spielbstat .= "<div class='col-3'>" . $Heimb . $text['stats'][29] . "</div>\n";
                                  $spielbstat .= "<div class='col-1'>" . $Toreb . "</div>\n";
                                  $spielbstat .= "</div>\n";
                              }
                          }
                      }
                  }
              }
          }
          $spielstat .= "</div>\n";
          $spielbstat .= "</div>\n";
          $tabstat .= "</div>\n";
      }
  }
  $template->setVariable("Spiela", $spielstat);
  $template->setVariable("Spielb", $spielbstat);
  $template->setVariable("Tabelle", $tabstat);
  for ($i = 1; $i <= $anzahl_ligen; $i++) {
      $akt_liga = new liga();
      if (($akt_liga->loadFile(PATH_TO_LMO . '/' . $dirliga . $fav_liga[$i]) == FALSE) && ($i > 1)) {
      //if ($akt_liga->loadFile(PATH_TO_LMO . '/' . $dirliga . $mymulti . '/' . $fav_liga[$i]) == FALSE) {
          echo "<font color=\"red\">" . $text['stats'][12] . " ($fav_liga[$i])</font>";
      } else {
          $template->setCurrentBlock("Liga");
          
          $template->setVariable("Teama", $a);
          $template->setVariable("Teamb", $b);
          $template->setCurrentBlock("Inhalt");
          foreach ($akt_liga->partien as $yPartie) {
              if (($yPartie->heim->name == $a) and ($yPartie->gast->name == $b)) {
                  $template->setVariable("Datum", $yPartie->datumString($leer = '__.__.____'));
                  $template->setVariable("Uhr", $yPartie->zeitString($leer = '__:__ ') . " Uhr");
                  $template->setVariable("Liganame", $akt_liga->name);
                  $template->setVariable("Ligaicon", HTML_smallLigaIcon($akt_liga->options->keyValues['Icon'], "alt='' width='24'"));
                  $template->setVariable("Heim", $yPartie->heim->name);
                  $template->setVariable("HeimMittel", $yPartie->heim->mittel);
                  $template->setVariable("Gast", $yPartie->gast->name);
                  $template->setVariable("GastMittel", $yPartie->gast->mittel);
                  $template->setVariable("Iconheim", HTML_smallTeamIcon($yPartie->heim->name, "alt='$a' width='24'"));
                  $template->setVariable("Iconhbig", HTML_bigTeamIcon($yPartie->heim->name, "alt='$a' width='48'"));
                  $template->setVariable("Icongast", HTML_smallTeamIcon($yPartie->gast->name, "alt='$b' width='24'"));
                  $template->setVariable("Icongbig", HTML_bigTeamIcon($yPartie->gast->name, "alt='$b' width='48'"));
                  $template->setVariable("Tore", $yPartie->hToreString() . " : " . $yPartie->gToreString());
		  $template->setVariable("SpielEnde",$yPartie->spielEndeString($text));
                  $SpBer_link = $yPartie->reportUrl;
                  if ($SpBer_link != "") {
                      if ($multi_cfgarray['spielberichte_verlinken'] == '1') {
                          $tlink = "<a href='" . URL_TO_LMO_SHORT . $SpBer_link . "' target='_blank' title='" . $text['stats'][10] . " (" . $text['stats'][11] . ")'><i class='material-icons text-danger'>launch</i></i></a>";
                      } else {
                          $tlink = "&nbsp;";
                      }
                      $template->setVariable("Spielbericht", $tlink);
                  }
                  if (chop($yPartie->notiz) != "") {
                      $ntext = '<a class="info" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="'.$yPartie->notiz.'"><i class="material-icons text-primary">report</i></a>';
                      $template->setVariable("Notiz", $ntext);
                  }
                  if ($yPartie->hToreString() > $yPartie->gToreString()) {
                      $asiegh = $asiegh + 1;
                  }
                  if ($yPartie->hToreString() == $yPartie->gToreString()) {
                      if ($yPartie->hToreString() != $tordummy) {
                          $aunentschiedenh = $aunentschiedenh + 1;
                      }
                  }
                  if ($yPartie->hToreString() < $yPartie->gToreString()) {
                      $aniederlageh = $aniederlageh + 1;
                  }
                  $aptoreh = $aptoreh + intval($yPartie->hToreString());
                  $amtoreh = $amtoreh + intval($yPartie->gToreString());
              } else {
                  if (($yPartie->heim->name == $b) and ($yPartie->gast->name  == $a)) {
                      $template->setVariable("Datum", $yPartie->datumString($leer = '__.__.____'));
                      $template->setVariable("Uhr", $yPartie->zeitString($leer = '__:__ ') . " Uhr");
                      $template->setVariable("Liganame", $akt_liga->name);
                      $template->setVariable("Ligaicon", HTML_smallLigaIcon($akt_liga->options->keyValues['Icon'], "alt='' width='24'"));
                      $template->setVariable("Heim", $yPartie->heim->name);
                      $template->setVariable("HeimMittel", $yPartie->heim->mittel);
                      $template->setVariable("Gast", $yPartie->gast->name);
                      $template->setVariable("GastMittel", $yPartie->gast->mittel);
                      $template->setVariable("Tore", $yPartie->hToreString() . " : " . $yPartie->gToreString());
		      $template->setVariable("SpielEnde",$yPartie->spielEndeString($text));
                      $SpBer_link = $yPartie->reportUrl;
                      if ($SpBer_link != "") {
                          if ($multi_cfgarray['spielberichte_verlinken'] == '1') {
                              $tlink = "<a href='" . URL_TO_LMO_SHORT . $SpBer_link . "' target='_blank' title='" . $text['stats'][10] . " (" . $text['stats'][11] . ")'><i class='material-icons text-danger'>launch</i></a>";
                          } elseif ($multi_cfgarray['spielberichte_verlinken'] == '0') {
                              $tlink = "&nbsp;";
                          }
                          $template->setVariable("Spielbericht", $tlink);
                      }
                      if (chop($yPartie->notiz) != "") {
                          $ntext = '<a class="info" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="'.$yPartie->notiz.'"><i class="material-icons text-primary">report</i></a>';
                          $template->setVariable("Notiz", $ntext);
                      }
                      if ($yPartie->hToreString() > $yPartie->gToreString()) {
                          $aniederlagea = $aniederlagea + 1;
                      }
                      if ($yPartie->hToreString() == $yPartie->gToreString()) {
                          if ($yPartie->hToreString() != $tordummy) {
                              $aunentschiedena = $aunentschiedena + 1;
                          }
                      }
                      if ($yPartie->hToreString() < $yPartie->gToreString()) {
                          $asiega = $asiega + 1;
                      }
                      $aptorea = $aptorea + intval($yPartie->gToreString());
                      $amtorea = $amtorea + intval($yPartie->hToreString());
                  }
              }
              $template->parseCurrentBlock();
          }
          $template->parse("Liga");
          $asieg = $asiega + $asiegh;
          $aunentschieden = $aunentschiedena + $aunentschiedenh;
          $aniederlage = $aniederlagea + $aniederlageh;
          $aptore = $aptorea + $aptoreh;
          $amtore = $amtorea + $amtoreh;
          $aspiele = $asieg + $aunentschieden + $aniederlage;
          $aspieleh = $asiegh + $aunentschiedenh + $aniederlageh;
          $aspielea = $asiega + $aunentschiedena + $aniederlagea;
          
          $teamstat = "";
          $teamstat_short = "";
          $teamstat_long = "";
          $teamstat .= "<div class='container'>\n";
          $teamstat .= "<div class='row bg-dark shadow mb-3 mt-5'>\n";
          $teamstat .= "<div class='col text-light'><h5>" . $text['stats'][20] . "</h5></div>\n";
          $teamstat .= "</div>\n";
          $teamstat .= "<div class='row'>\n";
          $teamstat .= "<div class='col-5'><b>" . $text['stats'][21] . "</b></div>\n";
          $teamstat .= "<div class='col-1'><b>" . $text['stats'][22] . "</b></div>\n";
          $teamstat .= "<div class='col-1'><b>" . $text['stats'][23] . "</b></div>\n";
          $teamstat .= "<div class='col-1'><b>" . $text['stats'][24] . "</b></div>\n";
          $teamstat .= "<div class='col-1'><b>" . $text['stats'][25] . "</b></div>\n";
          $teamstat .= "<div class='col-2'><b>" . $text['stats'][26] . "</b></div>\n";
          $teamstat .= "</div>\n";
          $teamstat .= "<div class='row'>\n";
          $teamstat .= "<div class='col-5'>" . $a . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aspiele . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $asieg . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aunentschieden . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aniederlage . "</div>\n";
          $teamstat .= "<div class='col-2'>" . $aptore . " : " . $amtore . "</div>\n";
          $teamstat .= "</div>\n";
          $teamstat_short .= $teamstat;
          $teamstat .= "<div class='row'>\n";
          $teamstat .= "<div class='col-1'>" . $text['stats'][27] . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aspieleh . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $asiegh . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aunentschiedenh . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aniederlageh . "</div>\n";
          $teamstat .= "<div class='col-2'>" . $aptoreh . " : " . $amtoreh . "</div>\n";
          $teamstat .= "</div>\n";
          $teamstat .= "<div class='row'>\n";
          $teamstat .= "<div class='col-1'>" . $text['stats'][28] . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aspielea . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $asiega . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aunentschiedena . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aniederlagea . "</div>\n";
          $teamstat .= "<div class='col-2'>" . $aptorea . " : " . $amtorea . "</div>\n";
          $teamstat .= "</div>\n";
          $teamstat_long .= "<div class='row'>\n";
          $teamstat_long .= "<div class='col-5'>" . $b . "</div>\n";
          $teamstat_long .= "<div class='col-1'>" . $aspiele . "</div>\n";
          $teamstat_long .= "<div class='col-1'>" . $aniederlage . "</div>\n";
          $teamstat_long .= "<div class='col-1'>" . $aunentschieden . "</div>\n";
          $teamstat_long .= "<div class='col-1'>" . $asieg . "</div>";
          $teamstat_long .= "<div class='col-2'>" . $amtore . " : " . $aptore . "</div>\n";
          $teamstat_long .= "</div>\n";
          $teamstat_short .= $teamstat_long;
          $teamstat_short .= "</div>\n";
          $teamstat .= $teamstat_long;
          $teamstat .= "<div class='row'>";
          $teamstat .= "<div class='col-1'>" . $text['stats'][27] . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aspielea . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aniederlagea . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aunentschiedena . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $asiega . "</div>\n";
          $teamstat .= "<div class='col-2'>" . $amtorea . " : " . $aptorea . "</div>\n";
          $teamstat .= "</div>\n";
          $teamstat .= "<div class='row'>\n";
          $teamstat .= "<div class='col-1'>" . $text['stats'][28] . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aspieleh . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aniederlageh . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $aunentschiedenh . "</div>\n";
          $teamstat .= "<div class='col-1'>" . $asiegh . "</div>\n";
          $teamstat .= "<div class='col-2'>" . $amtoreh . " : " . $aptoreh . "</div>\n";
          $teamstat .= "</div>\n";
          $teamstat .= "</div>\n";
          $template->setVariable("Statistik", $teamstat);
          $template->setVariable("StatistikShort", $teamstat_short);
          $template->setVariable("Text", $text['stats'][4]);
          $template->setVariable("Text1", $text['stats'][5]);
          $template->setVariable("Text2", $text['stats'][6]);
          $template->setVariable("VERSION", TEAM_VERGLEICH);
          $template->setVariable("VERSIONa", VERSIONA);
      }
  }
  $time_end = getmicrotime();
  $time = round($time_end - $time_start, 4);
  $template->setVariable("Dauer", $text['stats'][13] . ": " . $time);
?>