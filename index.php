<?php
ob_start();
// Bugfixing
//error_reporting(E_ALL);

// Get Config
require_once('./common/inc/config.php');

// check config
if($contact['mail'] == '' || $local['ResName'] == '' || $mail_config['mail_mods'] == '' || $database['name'] == '' || $config['GPlusApiKey'] == '' || $config['GPlusGroupID'] == ''){
	exit('Please define config values first ...');
}

function toASCII( $str )
{
  return strtr(utf8_decode($str), 
	       utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
	       'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
}

$errormessage = "";

if ($_POST['GOOGLE_ID'] <> '') {
  $displayname = $_POST['DisplayName'];
  $googleid = $_POST['GOOGLE_ID'];
  $gender = $_POST['Gender'];
  $email = $_POST['Email'];
  $agentname = $_POST['AgentName'];
  $einsatzgebiet = $_POST['Einsatzgebiet'];

  if ($gender === "Schlumpfine") {
    $codeword = "Schlumpfine-";
  } else {
    $codeword = "Schlumpf-";
  }
  $codeword .= substr(toAscii($displayname), 0, 2);
  $codeword .= array_sum(str_split($googleid));
  // Cookie setzen
  setcookie("CodeWord", $codeword, time()+60*60*24, "/"); // 1 day

  if (($agentname <> "") &&
      ($einsatzgebiet <> "")) {
    require './common/inc/class.phpmailer.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $mail_config['mail_host'];
    $mail->SMTPAuth = true; 
    $mail->Username = $mail_config['mail_user'];
    $mail->Password = $mail_config['mail_pass'];
    $mail->From = $mail_config['mail_noreply'];
    $mail->FromName = $local['ResName'].' Bewerbung';
    $mail->addAddress ($mail_config['mail_mods']);
    $mail->WordWrap = 72;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    if ($_POST['DatenUpdate'] == 1 ) {
      $mail->Subject = 'Benutzerdaten Update von '.$displayname.'';      
    } else {
      $mail->Subject = 'Anmeldung von '.$displayname.', Codeword '.$codeword;
    }

    $mail->Body		.= '
        <table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" colspan="2" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;">Liebe Moderatoren,<br />
              <br />
    ';
    if ($_POST['DatenUpdate'] == 1 ) {
        $mail->Body .= 'es wurde bei dem nachfolgenden Account ein Benutzerdatenupdate vorgenommen';
    } else {
      $mail->Body    .= 'Es liegt eine neue Bewerbung fuer die G+-Community vor:';
    }
    $mail->Body		.= '
    <br /><br /></td>
          </tr>
          <tr>
            <td width="96" height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>Name:</strong></td>
            <td width="504" height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;">'.$displayname.'</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>Google ID:</strong></td>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;">'.$googleid.'</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>Link zu Profil:</strong></td>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;"><a href="https://plus.google.com/u/0/'.$googleid.'" target="_blank">https://plus.google.com/u/0/'.$googleid.'</a></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>Geschlecht:</strong></td>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;">'.$gender.'</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>E-Mail:</strong></td>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;">'.$email.'</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>Agent ID</strong></td>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;">'.$agentname.'</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>Codewort</strong></td>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;">'.$codeword.'</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;border-bottom:1px solid #09C;"><strong>Area:</strong></td>
            <td height="30" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #09C;border-bottom:1px solid #09C;">'.$einsatzgebiet.'</td>
          </tr>
          <tr>
            <td height="30" colspan="2" align="left" valign="middle" style="font-family:sans-serif;font-size: 12px;color: #000;"><br/><br/>Bitte prüft die Einträge und setzt euch bei Unstimmigkeiten mit dem Agent in Verbindung.</td>
          </tr>
        </table>
    ';
   
    // Write in Database    
    require_once('./common/inc/writedb.php');
        
    if(!$mail->send()) {
      echo 'Message to Mod could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      exit;
    } else {
      header('Location: '.$_SERVER['REQUEST_URI']);
    }
    
    
    
    
    
    
  }
}

// Header
require_once('./common/inc/header.php');
// Formular
require_once('./public/formular.php');
// Text 1
require_once('./public/text1.php');
// Slider 1
require_once('./public/slider1.php');
// Text 2
require_once('./public/text2.php');
// Slider 2
require_once('./public/slider2.php');
// Footer
require_once('./common/inc/footer.php');
?>