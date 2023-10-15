# LMO R�ckrunde

Addon, um f�r eine erstellte Liga nach der Festsetzung der Paarungen der Hinrunde die R�ckrunde automatisiert aufzuf�llen, basierend auf den Paarungen der Hinrunde.

### Installation

`lmo-rueckrunde.php` in das Hauptverzeichnis des LMOs legen
`lmo-adminedit.php`an 2 Positionen bearbeiten:
```php
    require(PATH_TO_LMO."/lmo-savefile.php");
    $st = $stz;
  }
  
  // R�ckrunden-Hack
  if($save == 990) require_once("lmo-rueckrunde.php");
```
```php
	<form  name="lmoedit" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  <input type="hidden" name="action" value="admin">
	  <input type="hidden" name="todo" value="edit">
	  <input type="hidden" name="save" value="990">
	  <input type="hidden" name="file" value="<?php echo $file; ?>">
	  <input type="hidden" name="st" value="<?php echo $st; ?>">
	  <input type="submit" name="rueckrundeButton" class="btn btn-primary btn-sm" value="<?php echo $text[3000]; ?>">
```
`lang-Deutsch.txt` erg�nzen:
```
3000=R�ckrundenspielplan erstellen
3001=Die Liga hat eine ungerade Anzahl an Spieltagen. Es konnte keine Hin- & R�ckrunde identifiziert werden.
3002=Der R�ckrundenspielplan wurde erfolgreich gespeichert.
```

# LMO second half

Add-on to automatically populate the second half of the season for a created league after the fixtures for the first half have been determined, based on the fixtures of the first half.

### Installation

Place `lmo-rueckrunde.php` in the root directory of the LMO
edit `lmo-adminedit.php`at 2 positions:
```php
    require(PATH_TO_LMO."/lmo-savefile.php");
    $st = $stz;
  }
  
  // R�ckrunden-Hack
  if($save == 990) require_once("lmo-rueckrunde.php");
```
```php
	<form  name="lmoedit" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  <input type="hidden" name="action" value="admin">
	  <input type="hidden" name="todo" value="edit">
	  <input type="hidden" name="save" value="990">
	  <input type="hidden" name="file" value="<?php echo $file; ?>">
	  <input type="hidden" name="st" value="<?php echo $st; ?>">
	  <input type="submit" name="rueckrundeButton" class="btn btn-primary btn-sm" value="<?php echo $text[3000]; ?>">
```
edit `lang-English.txt`:
```
3000=set second half
3001=The league as an odd number of matchdays. The start of second half couldn't be identifies
3002=Second half successfull created
```