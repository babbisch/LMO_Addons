# Historie

AddOn, um über mehrere Ligen eine Ewige Tabelle zu erstellen

### Installation

Dateien in den Verzeichnissen auf den LMO kopieren.

In der Administration des LMOs unter `Optionen` `Addons` `history` die notwendigen Angaben machen, um die csv-Dateien zu erstellen.

Aufrufen des Scripts mit `iFrame` oder `include()`. Es kann der komplette Archivordner verwendet werden oder konkrete Ligen, die in die Auswertung einfliessen.

#### HTML
```html
<iframe src="<url_to_lmo>/addon/history/lmo-history.php?his_liga=xyz.l98&his_folder=archiv/bundesliga"></iframe>
<iframe src="<url_to_lmo>/addon/history/lmo-history.php?his_liga=xyz.l98&his_ligen=abc.l98,def.l98,ghi.l98,jkl.l98"></iframe>
```

#### PHP
```php
require_once(BASEDIR."lmo/init.php");
$his_liga = "xyz.l98";
$his_folder = "archiv/bundesliga";
include (PATH_TO_ADDONDIR."/history/lmo-history.php");
```
```php
require_once(BASEDIR."lmo/init.php");
$his_liga = "xyz.l98";
$his_ligen = "abc.l98,def.l98,ghi.l98,jkl.l98";
include (PATH_TO_ADDONDIR."/history/lmo-history.php");
```

Optional kann noch das zu nutzende Template mitgegeben werden
#### HTML
```html
his_template=mytemplate
```
#### PHP
```php
$his_template='mytemplate'
```

