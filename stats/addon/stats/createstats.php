<?php

require (__DIR__ . '/../../init.php');
require_once (PATH_TO_ADDONDIR . '/classlib/ini.php');

// Ligenarchiv
$dir = dir(PATH_TO_LMO . '/' . $dirliga . '/archiv');
$verzarch = '';
while (false !== ($entry = $dir->read())) {
    if (is_dir(PATH_TO_LMO . '/' . $dirliga . '/archiv/' . $entry) && substr($entry, 0, 1) != '.')
        $verzarch .= '<option>' . 'archiv/' . $entry . '</option>';
}

// Ligenarchiv
$dir = PATH_TO_LMO . '/' . $dirliga;
$scanned = array_diff(scandir($dir), array('..', '.'));
$verz = '';
foreach ($scanned as $scan) {
    $pathinfo = pathinfo($scan);
    if (isset($pathinfo['extension']) && $pathinfo['extension'] == 'l98') {
        $file = $pathinfo['filename'];
        $verz .= '<option>' . $file . '</option>';
    }
}

// Templates für Statistik-Addon lesen
$dir = PATH_TO_TEMPLATEDIR . '/stats/';
$scanned = array_diff(scandir($dir), array('..', '.'));
$options = '';

foreach ($scanned as $scan) {
    $pathinfo = pathinfo($scan);
    if ($pathinfo['extension'] == 'php') {
        $template = substr($pathinfo['filename'], 0, stripos($pathinfo['filename'], '.'));
        $templates .= '<option>' . $template . '</option>';
    }
}

isset($_POST['createstats']) ? $createstats = true : $createstats = false;

if ($createstats == false) {
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=admin&todo=stats" method="post">
<div class="container">
    <div class="row p-3">
        <div class="col"><h1><?php echo $text['stats'][200]; ?></h1></div>
    </div>
    <div class="row">
        <div class="col"><h3><?php echo $text['stats'][201]; ?></h3></div>
    </div>
    <div class="row align-items-center">
        <div class="col-2 offset-2 text-end align-self-center"><?php echo $text['stats'][202]; ?>:</div>
        <div class="col-3 text-start"><select class="custom-select" style="width: 8rem;" name="liganame"><?php echo $verz ?></select></div>
    </div>
    <div class="row align-items-center">
        <div class="col-2 offset-2 text-end align-self-center"><?php echo $text['stats'][203]; ?>:</div>
        <div class="col-3 text-start"><select class="custom-select" style="width: 8rem;" name="archiv"><?php echo $verzarch ?></select></div>
    </div>
    <div class="row">
        <div class="col-2 offset-2 text-end align-self-center"><?php echo $text['stats'][204]; ?>:</div>
        <div class="col-3 text-start">
            <input type="radio" class="form-check-input" name="sortdirection" value="asc"> <?php echo $text['stats'][205]; ?>
            <input type="radio" class="form-check-input" name="sortdirection" value="desc" checked> <?php echo $text['stats'][206]; ?>
        </div>
    </div>
    <div class="row">
        <div class="col p-3"><h3><?php echo $text['stats'][207]; ?></h3></div>
    </div>
    <div class="row align-items-center">
        <div class="col-2 offset-2 text-end align-self-center"><?php echo $text['stats'][208]; ?>:</div>
        <div class="col-3 text-start"><select class="custom-select" style="width: 8rem;" name="template"><?php echo $templates ?></select></div>
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
} else {
    $archiv = htmlspecialchars($_POST['archiv']);
    $liganame = htmlspecialchars($_POST['liganame']);
    $i = 1;

    $stats = fopen(PATH_TO_CONFIGDIR . '/stats/' . $liganame . '.stats', 'wb');
    fputs($stats, "[config]\r\n");
    fputs($stats, "modus=1\r\n");
    fputs($stats, 'template=' . htmlspecialchars($_POST['template']) . "\r\n");
    fputs($stats, "\r\n");
    fputs($stats, "[Viewer Ligen]\r\n");
    fputs($stats, 'liga' . $i . '=' . $liganame . ".l98\r\n");

    $ligendir = scan(PATH_TO_LMO . '/' . $dirliga . $archiv);

    if ($_POST['sortdirection'] == 'asc') {
        sort($ligendir);
    } else {
        rsort($ligendir);
    }

    foreach ($ligendir as $ligadir) {
        $pathinfo = pathinfo(substr($ligadir, strrpos($ligadir, '/') + 1, strlen($ligadir)));
        // if(preg_match('/^\d{4}$/',substr($pathinfo["filename"],0,4))) {
        if (isset($pathinfo['extension'])) {
            $extension = $pathinfo['extension'];
            if ($extension == 'l98') {
                $i++;
                fputs($stats, 'liga' . $i . '=' . $archiv . $ligadir . "\r\n");
            }
        }
        // }
    }
    $createstats = false;
?>
<div class="container">
    <div class="row pt-4 justify-content-center">
        <div class="col-2 alert alert-success" role="alert">
            <?php echo $text['stats'][210] . " <a class='alert-link' href='" . $_SERVER['PHP_SELF'] . "?action=admin&todo=stats'>" . $text['stats'][211] . '</a>'; ?>
        </div>
    </div>
</div>
<?php
}
?>
