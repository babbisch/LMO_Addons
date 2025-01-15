<?php

require (__DIR__ . '/../../init.php');
require_once (PATH_TO_ADDONDIR . '/classlib/ini.php');

function scan($folder)
{
    /* eigene Funktion, get_dir() aus lmo-functions.php ruft sich nicht selbst auf */
    global $out, $archiv;

    if ($content = opendir($folder)) {
        while (false !== ($file = readdir($content))) {
            if (is_dir("$folder/$file") && $file != '.' && $file != '..') {
                // scan("$folder/$file");
            } elseif ($file != '.' && $file != '..') {
                $verz = substr($folder, strrpos($folder, $archiv) + strlen($archiv), strlen($folder));
                $out[] = "$verz/$file";
            }
        }
        closedir($content);
    }
    return $out;
}

// Ligenarchiv
$dir = dir(PATH_TO_LMO . '/' . $dirliga . '/archiv');
$verzarch = '';
while (false !== ($entry = $dir->read())) {
    if (is_dir(PATH_TO_LMO . '/' . $dirliga . '/archiv/' . $entry) && substr($entry, 0, 1) != '.')
        $verzarch .= '<option>' . 'archiv/' . $entry . '</option>';
}

isset($_POST['createstats']) ? $createstats = true : $createstats = false;

if ($createstats == false) {
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=admin&todo=archive" method="post">
<div class="container">
    <div class="row p-3">
        <div class="col"><h1><?php echo $text['stats'][200]; ?></h1></div>
    </div>
    <div class="row">
        <div class="col"><h3><?php echo $text['stats'][201]; ?></h3></div>
    </div>
    <div class="row align-items-center">
        <div class="col-2 offset-2 text-end align-self-center"><?php echo $text['stats'][203]; ?>:</div>
        <div class="col-3 text-start"><select class="custom-select" style="width: 8rem;" name="archiv"><?php echo $verzarch ?></select></div>
    </div>
    <div class="row pt-3">
        <div class="col">
            <input type="hidden" name="createstats" value="1">
            <input type="submit" class="btn btn-primary btn-sm" value="<?php echo $text['stats'][209]; ?>">
        </div>
    </div>

</div>
</form>
<?php
}

if ($createstats == true) {
    // Ligenarchiv
    $archiv = $_POST['archiv'];
    $dir = PATH_TO_LMO . '/' . $dirliga . '/' . $archiv;
    $scanned = array_diff(scandir($dir), array('..', '.'));
    $verz = array();
    foreach ($scanned as $scan) {
        $pathinfo = pathinfo($scan);
        if (isset($pathinfo['extension']) && $pathinfo['extension'] == 'l98') {
            $verz[] = $pathinfo['filename'];
        }
    }
    $verz2 = $verz;
    rsort($verz2);

    $files = glob(PATH_TO_CONFIGDIR . '/stats/' . $archiv . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    foreach ($verz as $liganame) {
        $i = 1;
        $stats = fopen(PATH_TO_CONFIGDIR . '/stats/' . $archiv . '/' . $liganame . '.stats', 'wb');
        fputs($stats, "[config]\r\n");
        fputs($stats, "modus=1\r\n");
        fputs($stats, "template=standard\r\n");
        fputs($stats, "\r\n");
        fputs($stats, "[Viewer Ligen]\r\n");
        fputs($stats, 'liga' . $i . '=' . $archiv . '/' . $liganame . ".l98\r\n");

        foreach ($verz2 as $oldfiles) {
            if (($oldfiles != $liganame)) {
                $i++;
                fputs($stats, 'liga' . $i . '=' . $archiv . '/' . $oldfiles . ".l98\r\n");
            }
        }
    }
    $createstats = false;
?>
<div class="container">
    <div class="row pt-4 justify-content-center">
        <div class="col-2 alert alert-success" role="alert">
            <?php echo $text['stats'][210] . " <a class='alert-link' href='" . $_SERVER['PHP_SELF'] . "?action=admin&todo=archive'>" . $text['stats'][211] . '</a>'; ?>
        </div>
    </div>
</div>
<?php
}
?>
