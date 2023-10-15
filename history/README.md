# Historie

AddOn, um über mehrere Ligen eine Ewige Tabelle zu erstellen

### Installation

Dateien in den Verzeichnissen auf den LMO kopieren
In der Administration des LMOs unter `Optionen` `Addons` `history` die notwendigen Angaben machen, um die csv-Dateien zu erstellen
Aufrufen des Scripts mit `iFrame` oder `include()`. Es kann der komplette Archivordner verwendet werden oder konkrete Ligen, die in die Auswertung einfliessen.

```html
<iframe src="<url_to_lmo>/addon/history/lmo-history.php?his_liga=xyz.l98&his_folder=archiv/bundesliga</iframe>
<iframe src="<url_to_lmo>/addon/history/lmo-history.php?his_liga=xyz.l98&his_ligen=1bundesliga2003.l98,1bundesliga2002.l98,1bundesliga2001.l98,1bundesliga2000.l98"></iframe>
```

```php
require_once(BASEDIR."lmo/init.php");
$his_liga = "xyz.l98";
$his_folder = "archiv/bundesliga";
include (PATH_TO_ADDONDIR."/history/lmo-history.php");
```
Optional kann noch das zu nutzende Template mitgegeben werden
```html
his_template=mytemplate
```
```php
$his_template='mytemplate'
```

