<!DOCTYPE html>
<html>
<?php
// Get Config
require_once ('../common/inc/config.php');
// Zugangsdaten Datenbank
$db_host = $database['host'];
$db_user = $database['user'];
$db_pass = $database['pass'];
$db_name = $database['name'];

?>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $local['ResName']; ?> Administrator-Bereich</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link rel="author" href="humans.txt"/>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="../favicon.ico" type="image/x-icon"/>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../common/css/kube.min.css"/>
        <link rel="stylesheet" type="text/css" href="../common/css/custom.css"/>
        
        
    </head>

<?php
// Verbindung mit dem MySQL-Server herstellen
$conID = mysql_connect( $db_host, $db_user, $db_pass ) or die( "Die Datenbank konnte nicht erreicht werden!" );
if ($conID){
    mysql_select_db( $db_name, $conID );
}
mysql_query("SET NAMES 'utf8'");
// Auswahl der Zeilen aus der Tabelle
$sql = "SELECT id, DisplayName, GOOGLE_ID, Gender, Email, AgentName, Einsatzgebiet, CodeWord, Timestamp FROM ".$database['table']."";

// Anfrage an MySQL senden
$agentquery_query = mysql_query($sql) or die("Anfrage nicht erfolgreich");
?>

<body style="background: none;">
<div class="units-row" style="margin-top: 30px;">
  <div class="unit-80 unit-centered" style="border: none;">
   	<h2>Übersicht der registrierten Agenten</h2>
    	<p>Hier siehst du die bereits registrierten Agenten in der <?php echo $local['ResName']; ?>.</p>
    	<p>Die Liste ist mit klick auf die Tabellenüberschriften sortierbar.<br />
    	Zum Löschen von Agents mir bitte die ID per <a href="mailto:maik.wendelken@gmail.com">Mail</a> oder via HO senden. </p>
        <p>Wichtiger Hinweis zum Überprüfen auf Richtigkeit des Codes<br/>
   	      Der Code setzt sich wie folgt zusammen:</p>
        <ol>
          <li>Schlumpf oder Schlumpfine für Geschlecht</li>
          <li>Die ersten beiden Buchstaben des Displaynamen des Google Accounts</li>
          <li>Die Summe der Google ID<br/>
            <br/>
            Ergibt dann bei mir (ioso)<strong>: Schlumpf-Ma109</strong><br/>
            <strong>Schlumpf</strong> = Männlich<br/>
            <strong>Ma</strong> = Maik Wendelken (ioso)<br/>
            <strong>109</strong> = 104920768997079350968 ~ 1+0+4+9+2+0+7+6+8+9+9+7+0+7+9+3+5+0+9+6+8<br>
            
          </li>
        </ol>
  </div>
</div>

<div class="table-container">
	
    <table id="agenttable" class="tablesorter"> 
        <thead> 
            <tr> 
                <th>ID</th> 
                <th>Name</th> 
                <th>Google ID</th> 
                <th>Geschlecht</th> 
                <th>E-Mail</th>
                <th>Ingress Agentname</th>
                <th>Einsatzgebiet</th>
                <th>CodeWord</th>
                <th>TimeStamp</th>
            </tr> 
        </thead> 
        <tbody>
        <?php
        while ($adr = mysql_fetch_array($agentquery_query)){
        ?>
        <tr>
            
            <td class="col1"><?=$adr['id']?></td>
            <td class="col2"><?=$adr['DisplayName']?></td>
            <td class="col3"><a href="https://plus.google.com/u/0/<?=$adr['GOOGLE_ID']?>" title="Zum Google+ Profil von <?=$adr['DisplayName']?>" target="_blank"><?=$adr['GOOGLE_ID']?></a></td>
            <td class="col4"><?=$adr['Gender']?></td>
            <td class="col5"><?=$adr['Email']?></td>
            <td class="col6"><?=$adr['AgentName']?></td>
            <td class="col7"><?=$adr['Einsatzgebiet']?></td>
            <td class="col8"><?=$adr['CodeWord']?></td>
            <td class="col9"><?=$adr['Timestamp']?></td>            
        </tr>
        <?php
        }
        ?>
        </tbody> 
    </table>
</div>
<!-- JS -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="../common/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="../common/js/custom_admin.js"></script>
</body>
</html>