<?php
function getmicrotime()
{
    list($usec, $sec) = explode(' ', microtime());
    return ((float) $usec + (float) $sec);
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
// $Spielm = $multi_cfgarray['spieltageminus'];
// $Spielp = $multi_cfgarray['spieltageplus'];
$Spielm = '';
$Spielp = '';
$tordummy = '';
$highwina = 1;
$highwinagoal = 0;
$highwinb = 1;
$highwinbgoal = 0;
$highawina = 1;
$highawinagoal = 0;
$highawinb = 1;
$highawinbgoal = 0;

$tabstat = '';
$tabstat .= "<div class='container'>\n";
$tabstat .= "<div class='row bg-dark shadow mb-3 mt-5'>\n";
$tabstat .= "<div class='col text-light'><h5>" . $text['stats'][30] . "</h5></div>\n";
$tabstat .= "</div>\n";
$tabstat .= "<div class='row'>\n";
$tabstat .= "<div class='col-1'></div>\n";
$tabstat .= "<div class='col-3 text-start'><b>" . $text['stats'][21] . "</b></div>\n";
$tabstat .= "<div class='col-1'><b>" . $text['stats'][22] . "</b></div>\n";
$tabstat .= "<div class='col-1'><b>" . $text['stats'][23] . "</b></div>\n";
$tabstat .= "<div class='col-1'><b>" . $text['stats'][24] . "</b></div>\n";
$tabstat .= "<div class='col-1'><b>" . $text['stats'][25] . "</b></div>\n";
$tabstat .= "<div class='col-1'><b>" . $text['stats'][26] . "</b></div>\n";
$tabstat .= "<div class='col-1'><b>" . $text['stats'][34] . "</b></div>\n";
$tabstat .= "</div>\n";

$spielastat = '';
$spielastat .= "<div class='container'>\n";
$spielastat .= "<div class='row bg-dark shadow mb-3 mt-5'>\n";
$spielastat .= "<div class='col text-light'><h5>" . $text['stats'][32] . ' ' . $a . "</h5></div>\n";
$spielastat .= "</div>\n";
$spielastat .= "<div class='row'>\n";
$spielastat .= "<div class='col-2 text-start'><b>" . $text['stats'][31] . "</b></div>\n";
$spielastat .= "<div class='col-3'><b>" . $text['stats'][21] . "</b></div>\n";
$spielastat .= "<div class='col-3'><b>" . $text['stats'][33] . "</b></div>\n";
$spielastat .= "</div>\n";

$spielbstat = '';
$spielbstat .= "<div class='container'>\n";
$spielbstat .= "<div class='row bg-dark shadow mb-3 mt-5'>\n";
$spielbstat .= "<div class='col text-light'><h5>" . $text['stats'][32] . ' ' . $b . "</h5></div>\n";
$spielbstat .= "</div>\n";
$spielbstat .= "<div class='row'>\n";
$spielbstat .= "<div class='col-2 text-start'><b>" . $text['stats'][31] . "</b></div>\n";
$spielbstat .= "<div class='col-3'><b>" . $text['stats'][21] . "</b></div>\n";
$spielbstat .= "<div class='col-3'><b>" . $text['stats'][33] . "</b></div>\n";
$spielbstat .= "</div>\n";

for ($i = 1; $i <= 1; $i++) {
    $akt_liga = new liga();
    if ($akt_liga->loadFile(PATH_TO_LMO . '/' . $dirliga . $fav_liga[$i]) == FALSE) {
        // if ($akt_liga->loadFile(PATH_TO_LMO.'/'. $dirliga.$mymulti.'/'.$fav_liga[$i]) == FALSE) {
        echo '<font color="red">' . $text['stats'][12] . " ($fav_liga[$i])</font>";
    } else {
        $spTag = '';
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
                $tabstat .= "<div class='col-1 text-end'>$tabTableRow[pos].</div>\n";
                $tabstat .= "<div class='col-3 text-start'>$tabTableRow[team]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[spiele]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[s]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[u]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[n]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[pTor]:$tabTableRow[mTor]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[pPkt]</div>\n";
                $tabstat .= "</div>\n";
            } elseif ($tabTableRow['team'] == $b) {
                $tabstat .= "<div class='row'>\n";
                $tabstat .= "<div class='col-1 text-end'>$tabTableRow[pos].</div>\n";
                $tabstat .= "<div class='col-3 text-start'>$tabTableRow[team]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[spiele]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[s]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[u]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[n]</div>\n";
                $tabstat .= "<div class='col-1'>$tabTableRow[pTor]:$tabTableRow[mTor]</div>\n";
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
                            $Datuma = $yPartie->datumString($leer = '__.__.____');
                            $Heima = $yPartie->heim->name;
                            $Gasta = $yPartie->gast->name;
                            $Torea = ($yPartie->hToreString() . ' : ' . $yPartie->gToreString());
                            if ($Heima == $a) {
                                $spielastat .= "<div class='row' id='1'>\n";
                                $spielastat .= "<div class='col-2 text-start'>" . $Datuma . "</div>\n";
                                $spielastat .= "<div class='col-3'>" . $Gasta . ' ' . $text['stats'][27] . "</strong></div>\n";
                                $spielastat .= "<div class='col-1'>" . $Torea . "</div>\n";
                                $spielastat .= "</div>\n";
                            } elseif ($Gasta == $a) {
                                $spielastat .= "<div class='row'>\n";
                                $spielastat .= "<div class='col-2 text-start'>" . $Datuma . "</div>\n";
                                $spielastat .= "<div class='col-3'>" . $Heima . ' ' . $text['stats'][28] . "</div>\n";
                                $spielastat .= "<div class='col-1'>" . $Torea . "</div>\n";
                                $spielastat .= "</div>\n";
                            }
                        }
                        if (($yPartie->heim->name == $b) or ($yPartie->gast->name == $b)) {
                            $Datumb = $yPartie->datumString($leer = '__.__.____');
                            $Heimb = $yPartie->heim->name;
                            $Gastb = $yPartie->gast->name;
                            $Toreb = ($yPartie->hToreString() . ' : ' . $yPartie->gToreString());
                            if ($Heimb == $b) {
                                $spielbstat .= "<div class='row'>\n";
                                $spielbstat .= "<div class='col-2 text-start'>" . $Datumb . "</div>\n";
                                $spielbstat .= "<div class='col-3'>" . $Gastb . ' ' . $text['stats'][27] . "</strong></div>\n";
                                $spielbstat .= "<div class='col-1'>" . $Toreb . "</div>\n";
                                $spielbstat .= "</div>\n";
                            } elseif ($Gastb == $b) {
                                $spielbstat .= "<div class='row'>\n";
                                $spielbstat .= "<div class='col-2 text-start'>" . $Datumb . "</div>\n";
                                $spielbstat .= "<div class='col-3'>" . $Heimb . ' ' . $text['stats'][28] . "</div>\n";
                                $spielbstat .= "<div class='col-1'>" . $Toreb . "</div>\n";
                                $spielbstat .= "</div>\n";
                            }
                        }
                    }
                }
            }
        }
        $spielastat .= "</div>\n";
        $spielbstat .= "</div>\n";
        $tabstat .= "</div>\n";
    }
}
$template->setVariable('Spiela', $spielastat);
$template->setVariable('Spielb', $spielbstat);
$template->setVariable('Tabelle', $tabstat);
$template->setVariable('TeamA', $a);
$template->setVariable('TeamB', $b);
$template->setVariable('Team', $text['stats'][21]);
$template->setVariable('highHomew', $text['stats'][35]);
$template->setVariable('highAway', $text['stats'][36]);
for ($i = 1; $i <= $anzahl_ligen; $i++) {
    $akt_liga = new liga();
    if (($akt_liga->loadFile(PATH_TO_LMO . '/' . $dirliga . $fav_liga[$i]) == FALSE) && ($i > 1)) {
        // if ($akt_liga->loadFile(PATH_TO_LMO.'/'.$dirliga.$mymulti.'/'.$fav_liga[$i]) == FALSE) {
        echo '<font color="red">' . $text['stats'][12] . " ($fav_liga[$i])</font>";
    } else {
        $template->setCurrentBlock('Liga');
        $template->setCurrentBlock('Inhalt');
        foreach ($akt_liga->partien as $yPartie) {
            if (($yPartie->heim->name == $a) and ($yPartie->gast->name == $b)) {
                $template->setVariable('Datum', $yPartie->datumString($leer = '__.__.____'));
                $template->setVariable('Uhr', $yPartie->zeitString($leer = '__:__ ') . ' Uhr');
                $template->setVariable('Liganame', $akt_liga->name);
                $template->setVariable('Ligaicon', HTML_smallLigaIcon($akt_liga->options->keyValues['Icon'], "alt='' width='24'"));
                $template->setVariable('Heim', $yPartie->heim->name);
                $template->setVariable('HeimMittel', $yPartie->heim->mittel);
                $template->setVariable('HeimKurz', $yPartie->heim->kurz);
                $template->setVariable('Gast', $yPartie->gast->name);
                $template->setVariable('GastMittel', $yPartie->gast->mittel);
                $template->setVariable('GastKurz', $yPartie->gast->kurz);
                $template->setVariable('IconHeim', HTML_smallTeamIcon($yPartie->heim->name, "alt='$a' width='24'"));
                $template->setVariable('IconHeimBig', HTML_bigTeamIcon($yPartie->heim->name, "alt='$a' width='48'"));
                $template->setVariable('IconGast', HTML_smallTeamIcon($yPartie->gast->name, "alt='$b' width='24'"));
                $template->setVariable('IconGastBig', HTML_bigTeamIcon($yPartie->gast->name, "alt='$b' width='48'"));
                $template->setVariable('Tore', $yPartie->hToreString() . ' : ' . $yPartie->gToreString());
                $template->setVariable('SpielEnde', $yPartie->spielEndeString($text));
                $SpBer_link = $yPartie->reportUrl;
                // Höchste Siege Heimmannschaft Hinspiel (Team a)
                $windiffa = ((int) $yPartie->hToreString() - (int) $yPartie->gToreString());
                if ($windiffa > $highwina) {
                    $highwina = $windiffa;
                    $template->setVariable('HeimsiegA', $yPartie->hToreString() . ':' . $yPartie->gToreString());
                    $highwinagoal = $yPartie->hToreString();
                } elseif ($windiffa == $highwina) {
                    if ($highwinagoal < $yPartie->hToreString()) {
                        $template->setVariable('HeimsiegA', $yPartie->hToreString() . ':' . $yPartie->gToreString());
                        $highwinagoal = $yPartie->hToreString();
                    }
                }
                // Höchste Siege Gastmannschaft Hinspiel (Team b)
                $winadiffb = ((int) $yPartie->gToreString() - (int) $yPartie->hToreString());
                if ($winadiffb > $highawinb) {
                    $highawinb = $winadiffb;
                    $template->setVariable('GastsiegB', $yPartie->gToreString() . ':' . $yPartie->hToreString());
                    $highawinbgoal = $yPartie->gToreString();
                } elseif ($winadiffb == $highawinb) {
                    if ($highawinbgoal < $yPartie->gToreString()) {
                        $template->setVariable('GastsiegB', $yPartie->gToreString() . ':' . $yPartie->hToreString());
                        $highawinbgoal = $yPartie->gToreString();
                    }
                }
                // Ende H?chste Siege Gastmannschaft Hinspiel
                $tlink = '&nbsp;';
                if ($SpBer_link != '')
                    $tlink = "<a href='" . URL_TO_LMO_SHORT . $SpBer_link . "' target='_blank' title='" . $text['stats'][10] . ' (' . $text['stats'][11] . ")'><i class='material-icons text-danger'>launch</i></i></a>";
                $template->setVariable('Spielbericht', $tlink);
                if (chop($yPartie->notiz) != '') {
                    $ntext = '<a class="info" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="' . $yPartie->notiz . '"><i class="material-icons text-info">report</i></a>';
                    $template->setVariable('Notiz', $ntext);
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
                if (($yPartie->heim->name == $b) and ($yPartie->gast->name == $a)) {
                    $template->setVariable('Datum', $yPartie->datumString($leer = '__.__.____'));
                    $template->setVariable('Uhr', $yPartie->zeitString($leer = '__:__ ') . ' Uhr');
                    $template->setVariable('Liganame', $akt_liga->name);
                    $template->setVariable('Ligaicon', HTML_smallLigaIcon($akt_liga->options->keyValues['Icon'], "alt='' width='24'"));
                    $template->setVariable('Heim', $yPartie->heim->name);
                    $template->setVariable('HeimMittel', $yPartie->heim->mittel);
                    $template->setVariable('HeimKurz', $yPartie->heim->kurz);
                    $template->setVariable('IconHeim', HTML_smallTeamIcon($yPartie->heim->name, "alt='$a' width='24'"));
                    $template->setVariable('Gast', $yPartie->gast->name);
                    $template->setVariable('GastMittel', $yPartie->gast->mittel);
                    $template->setVariable('GastKurz', $yPartie->gast->kurz);
                    $template->setVariable('IconGast', HTML_smallTeamIcon($yPartie->gast->name, "alt='$b' width='24'"));
                    $template->setVariable('Tore', $yPartie->hToreString() . ' : ' . $yPartie->gToreString());
                    $template->setVariable('SpielEnde', $yPartie->spielEndeString($text));
                    $SpBer_link = $yPartie->reportUrl;
                    // Höchste Siege Gastmannschaft R?ckspiel (Team a)
                    $winadiffa = ((int) $yPartie->gToreString() - (int) $yPartie->hToreString());
                    if ($winadiffa > $highawina) {
                        $highawina = $winadiffa;
                        $template->setVariable('GastsiegA', $yPartie->gToreString() . ':' . $yPartie->hToreString());
                        $highawinagoal = $yPartie->gToreString();
                    } elseif ($winadiffa == $highawina) {
                        if ($highawinagoal < $yPartie->gToreString()) {
                            $template->setVariable('GastsiegA', $yPartie->gToreString() . ':' . $yPartie->hToreString());
                            $highawinagoal = $yPartie->gToreString();
                        }
                    }
                    // Höchste Siege Heimmannschaft R?ckspiel (Team b)
                    $windiffb = ((int) $yPartie->hToreString() - (int) $yPartie->gToreString());
                    if ($windiffb > $highwinb) {
                        $highwinb = $windiffb;
                        $template->setVariable('HeimsiegB', $yPartie->hToreString() . ':' . $yPartie->gToreString());
                        $highwinbgoal = $yPartie->hToreString();
                    } elseif ($windiffb == $highwinb) {
                        if ($highwinbgoal < $yPartie->hToreString()) {
                            $template->setVariable('HeimsiegB', $yPartie->hToreString() . ':' . $yPartie->gToreString());
                            $highwinbgoal = $yPartie->hToreString();
                        }
                    }
                    $tlink = '&nbsp;';
                    if ($SpBer_link != '')
                        $tlink = "<a href='" . URL_TO_LMO_SHORT . $SpBer_link . "' target='_blank' title='" . $text['stats'][10] . ' (' . $text['stats'][11] . ")'><i class='material-icons text-danger'>launch</i></a>";
                    $template->setVariable('Spielbericht', $tlink);
                    if (chop($yPartie->notiz) != '') {
                        $ntext = '<a class="info" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="' . $yPartie->notiz . '"><i class="material-icons text-info">report</i></a>';
                        $template->setVariable('Notiz', $ntext);
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
        $template->parse('Liga');
        $asieg = $asiega + $asiegh;
        $aunentschieden = $aunentschiedena + $aunentschiedenh;
        $aniederlage = $aniederlagea + $aniederlageh;
        $aptore = $aptorea + $aptoreh;
        $amtore = $amtorea + $amtoreh;
        $aspiele = $asieg + $aunentschieden + $aniederlage;
        $aspieleh = $asiegh + $aunentschiedenh + $aniederlageh;
        $aspielea = $asiega + $aunentschiedena + $aniederlagea;
        $stringTor = $akt_liga->options->keyValues['nameTor'];

        $teamstat = $teamstat_short = $teamstat_long = '';
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
        $teamstat .= "<div class='col-2'><b>" . $stringTor . "</b></div>\n";
        $teamstat .= "</div>\n";
        $teamstat .= "<div class='row'>\n";
        $teamstat .= "<div class='col-5'>" . $a . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aspiele . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $asieg . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aunentschieden . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aniederlage . "</div>\n";
        $teamstat .= "<div class='col-2'>" . $aptore . ' : ' . $amtore . "</div>\n";
        $teamstat .= "</div>\n";
        $teamstat_short .= $teamstat;
        $teamstat .= "<div class='row'>\n";
        $teamstat .= "<div class='col-1'>" . $text['stats'][27] . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aspieleh . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $asiegh . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aunentschiedenh . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aniederlageh . "</div>\n";
        $teamstat .= "<div class='col-2'>" . $aptoreh . ' : ' . $amtoreh . "</div>\n";
        $teamstat .= "</div>\n";
        $teamstat .= "<div class='row'>\n";
        $teamstat .= "<div class='col-1'>" . $text['stats'][28] . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aspielea . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $asiega . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aunentschiedena . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aniederlagea . "</div>\n";
        $teamstat .= "<div class='col-2'>" . $aptorea . ' : ' . $amtorea . "</div>\n";
        $teamstat .= "</div>\n";
        $teamstat_long .= "<div class='row'>\n";
        $teamstat_long .= "<div class='col-5'>" . $b . "</div>\n";
        $teamstat_long .= "<div class='col-1'>" . $aspiele . "</div>\n";
        $teamstat_long .= "<div class='col-1'>" . $aniederlage . "</div>\n";
        $teamstat_long .= "<div class='col-1'>" . $aunentschieden . "</div>\n";
        $teamstat_long .= "<div class='col-1'>" . $asieg . '</div>';
        $teamstat_long .= "<div class='col-2'>" . $amtore . ' : ' . $aptore . "</div>\n";
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
        $teamstat .= "<div class='col-2'>" . $amtorea . ' : ' . $aptorea . "</div>\n";
        $teamstat .= "</div>\n";
        $teamstat .= "<div class='row'>\n";
        $teamstat .= "<div class='col-1'>" . $text['stats'][28] . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aspieleh . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aniederlageh . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $aunentschiedenh . "</div>\n";
        $teamstat .= "<div class='col-1'>" . $asiegh . "</div>\n";
        $teamstat .= "<div class='col-2'>" . $amtoreh . ' : ' . $aptoreh . "</div>\n";
        $teamstat .= "</div>\n";
        $teamstat .= "</div>\n";
        $template->setVariable('Statistik', $teamstat);
        $template->setVariable('StatistikShort', $teamstat_short);
        $template->setVariable('Text', $text['stats'][4]);
        $template->setVariable('Text1', $text['stats'][5]);
        $template->setVariable('Text2', $text['stats'][6]);
        $template->setVariable('VERSION', TEAM_VERGLEICH);
        $template->setVariable('VERSIONa', VERSIONA);
    }
}
$time_end = getmicrotime();
$time = round($time_end - $time_start, 4);
$template->setVariable('Dauer', $text['stats'][13] . ': ' . $time);
?>