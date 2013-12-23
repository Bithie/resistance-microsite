<?php
require_once('./common/inc/config.php');

// Zugangsdaten Datenbank
$db_host = $database['host'];
$db_user = $database['user'];
$db_pass = $database['pass'];
$db_name = $database['name'];

// Erst bei Submit reagieren (Hier die ID/Name des Submitbuttons eintragen)
if (isset( $_POST['Submit'] ))
{
    // Maskierende Slashes aus POST entfernen
    $_POST = get_magic_quotes_gpc() ? array_map( 'stripslashes', $_POST ) : $_POST;
 
    // Inhalte der Felder aus POST holen
    $displayname = $_POST['DisplayName'];
    $googleid = $_POST['GOOGLE_ID'];
    $gender = $_POST['Gender'];
    $email = $_POST['Email'];
    $agentname = $_POST['AgentName'];
    $einsatzgebiet = $_POST['Einsatzgebiet'];
    $codeword = $codeword;

    
    // Timestamp
    $timestamp = date("Y-m-d H:i:s");
 
    /* ************************************************************************************************ */
    /* *** Hier sollten und MUESSEN die Benutzereingaben geprueft werden um Schadcode abzufangen!!! *** */
    /* ************************************************************************************************ */
 
    // Sind alle Eingaben durch die Validierung gekommen werden sie in die DB geschrieben
    // Verbindung oeffnen und Datenbank ausweahlen
    $conID = mysql_connect( $db_host, $db_user, $db_pass ) or die( "Die Datenbank konnte nicht erreicht werden!" );
    if ($conID){
        mysql_select_db( $db_name, $conID );
    }
    // Letzte ID auslesen und um eins erhöhen
    $res = mysql_query("SELECT * FROM `".$database['table']."`");
    $id = mysql_num_rows($res)+1;
	
	// Auf UTF-8 setzen
	mysql_query("SET NAMES 'utf8'");
    
    // Prüfen ob Datensatz schon vorhanden ist
    $sql = "SELECT COUNT(GOOGLE_ID) AS anzahl FROM `".$database['table']."` WHERE `GOOGLE_ID` = '".mysql_real_escape_string($_POST['GOOGLE_ID'])."'" ;
    $erg = mysql_query($sql);
    $var = mysql_fetch_object($erg);   
    
    if($var->anzahl >= 1){
        $datensatzvorhanden = "<h3>Der Datensatz ist bereits vorhanden!</h3>";
    } else {
        // Anfrage zusammenstellen der an die DB geschickt werden soll
        $sql = "INSERT INTO `".$database['table']."`
                    (`id`, `DisplayName`, `GOOGLE_ID`, `Gender`, `Email`, `AgentName`, `Einsatzgebiet`, `CodeWord`, `Timestamp`)
                VALUES(
                    '" .mysql_real_escape_string( $id ). "',
                    '" .mysql_real_escape_string( $displayname ). "',
                    '" .mysql_real_escape_string( $googleid ). "',
                    '" .mysql_real_escape_string( $gender ). "',
                    '" .mysql_real_escape_string( $email ). "',
                    '" .mysql_real_escape_string( $agentname ). "',
                    '" .mysql_real_escape_string( $einsatzgebiet ). "',
                    '" .mysql_real_escape_string( $codeword ). "',
                    '" .$timestamp. "'
                    )";
        // Schickt die Anfrage an die DB und schreibt die Daten in die Tabelle
        mysql_query( $sql );
        // Pruefen ob der neue Datensatz tatsaechlich eingefuegt wurde
        if (mysql_affected_rows() == 1){
            //echo "<h3>Der Datensatz wurde hinzugefügt!</h3>";
            // Hier kann weiterer Code stehen der ausgefuehrt werden soll
            // wenn ein Eintrag erfolgreich war. z.B. Email an den Admin schicken
            // der ueber den neuen Eintrag informiert
        } else {
            echo '<h3>Der Datensatz konnte <span class="hinweis">nicht</span> hinzugefügt werden!</h3>';
            // Hier koennen Massnahmen ergriffen werden die ueber den Misserfolg informieren
            // wie z.B. den Benutzer darueber zu informieren, dem Admin eine Mail schicken
            // damit er sich um den Fehler kuemmern kann, etc pp
        }
    }  
}

// Update der Daten
if (isset( $_POST['DataUpdate'] ))
{
    // Maskierende Slashes aus POST entfernen
    $_POST = get_magic_quotes_gpc() ? array_map( 'stripslashes', $_POST ) : $_POST;
 
    // Inhalte der Felder aus POST holen
    $displayname = $_POST['DisplayName'];
    $googleid = $_POST['GOOGLE_ID'];
    $gender = $_POST['Gender'];
    $email = $_POST['Email'];
    $agentname = $_POST['AgentName'];
    $einsatzgebiet = $_POST['Einsatzgebiet'];

    
    // Timestamp
    $timestamp = date("Y-m-d H:i:s");
 
    /* ************************************************************************************************ */
    /* *** Hier sollten und MUESSEN die Benutzereingaben geprueft werden um Schadcode abzufangen!!! *** */
    /* ************************************************************************************************ */
 
    // Sind alle Eingaben durch die Validierung gekommen werden sie in die DB geschrieben
    // Verbindung oeffnen und Datenbank ausweahlen
    $conID = mysql_connect( $db_host, $db_user, $db_pass ) or die( "Die Datenbank konnte nicht erreicht werden!" );
    if ($conID){
        mysql_select_db( $db_name, $conID );
    }
    // ID auslesen
    $res = mysql_query("SELECT * FROM `".$database['table']."`");
    $id = mysql_num_rows($res);
	
	// Auf UTF-8 setzen
	mysql_query("SET NAMES 'utf8'");
    
    // Prüfen ob Datensatz schon vorhanden ist
    $sql = "SELECT COUNT(GOOGLE_ID) AS anzahl FROM `".$database['table']."` WHERE `GOOGLE_ID` = '".mysql_real_escape_string($_POST['GOOGLE_ID'])."'" ;
    $erg = mysql_query($sql);
    $var = mysql_fetch_object($erg);   
    
    if($var->anzahl >= 1){
        // Anfrage zusammenstellen der an die DB geschickt werden soll
        $sql = "UPDATE `".$database['name']."`.`".$database['table']."` SET `AgentName` = '" .mysql_real_escape_string( $agentname ). "', `Einsatzgebiet` = '" .mysql_real_escape_string( $einsatzgebiet ). "', `Timestamp` = '" .$timestamp. "' WHERE `".$database['table']."`.`GOOGLE_ID` = '".mysql_real_escape_string($_POST['GOOGLE_ID'])."'";
        // Schickt die Anfrage an die DB und schreibt die Daten in die Tabelle
        mysql_query( $sql );
		
		
		// Debug Datenausgabe
		// echo $sql;
        // Pruefen ob der neue Datensatz tatsaechlich eingefuegt wurde
        if (mysql_affected_rows() == 1){
            //echo "<h3>Der Datensatz wurde hinzugefügt!</h3>";
            // Hier kann weiterer Code stehen der ausgefuehrt werden soll
            // wenn ein Eintrag erfolgreich war. z.B. Email an den Admin schicken
            // der ueber den neuen Eintrag informiert
        } else {
            echo '<h3>Der Datensatz konnte <span class="hinweis">nicht</span> aktualisiert werden!</h3>';
            // Hier koennen Massnahmen ergriffen werden die ueber den Misserfolg informieren
            // wie z.B. den Benutzer darueber zu informieren, dem Admin eine Mail schicken
            // damit er sich um den Fehler kuemmern kann, etc pp
        }
    } else {
		$datensatzvorhanden = "<h3>Der Datensatz ist NICHT vorhanden!</h3>";
	}  
}


?>