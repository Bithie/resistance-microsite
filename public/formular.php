<a id="top" name="top"></a>
<!-- Google Maps BG -->
<div id="map-canvas"></div>
<!-- /Google Maps BG -->

<!-- Header -->
<div class="units-row margin30top">
    <div class="unit-80 unit-centered whitebg header">
        <img src="./common/img/resistance_glow.png" alt="<?php echo $local['ResName']; ?> Logo" class="logo" width="130" height="190" />
        <h1><?php echo $local['ResName']; ?></h1>
        <h3>Lorem ipsum dolor sit amet?</h3> 
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>

		<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
        <div id="gConnect" class="gplus unit-20 unit-centered">
          <button
                class="g-signin"
                data-callback="onSignInCallback" 
                data-clientid="<?php echo $config['GPlusApiKey']; ?>"
                data-cookiepolicy="single_host_origin"
                data-requestvisibleactions="http://schemas.google.com/AddActivity"
                data-theme="dark"
                data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email"> </button>
        </div>
    </div>
</div> 
<!-- /Header -->

<!-- Formular -->
<div class="units-row" id="authOff">
  <div id="authOps" class="whitebg unit-80 unit-centered" style="display:block"> 
    <div id="profileerror"></div>
    <div id="profileform">
        <p>Danke f&uuml;r deine Bewerbung. Die folgenden Informationen
        werden an uns &uuml;bertragen, wenn du auf den Knopf <em>Senden</em> dr&uuml;ckst.</p>
        <p>Bitte erg&auml;nze in den beiden Feldern unten deinen
        Ingame-Agentname und dein prim&auml;res Einsatzgebiet bzw. deinen
        Wohnort. Das ist notwendig, damit wir mit dir Kontakt aufnehmen
        k&ouml;nnen.</p>
        
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="agentdetails" onsubmit="return validate();">
            <input name="DisplayName" type="hidden" id="DisplayNameInput" value="'+profile.displayName+'" />
            <input name="GOOGLE_ID" type="hidden" id="IdInput" value="'+profile.id+'" />
            <input name="Gender" type="hidden" id="GenderInput" value="'+profile.gender+'" />
            <input name="Email" type="hidden" id="EmailInput" value="'+email+'" />
            
            <ul class="lists-simple">
                <li><strong>Name: </strong><span id="DisplayNameLi">'+profile.displayName+'</span></li>
                <li><strong>Google ID: </strong><span id="IdLi">'+profile.id+'</span></li>
                <li><strong>Geschlecht: </strong><span id="GenderLi">'+profile.gender+'</span></li>
                <li><strong>E-Mail: </strong><span id="EmailLi">'+email+'</span></li>
                <li><strong>Ingress Agentname:</strong><br />
                <input name="AgentName" type="text" class="width-30" id="AgentnameInput" /></li>
                <li><strong>Einsatzgebiet:</strong><br />
                <input name="Einsatzgebiet" type="text" class="width-30" id="EinsatzgebietInput" /></li>
                <li><br/><br/>Alles eingetragen?<br/><br/>
                Dann dr&uuml;ck auf <input type="submit" id="Submit" name="Submit" value="Senden" class="btn btn-blue" /> um die Daten an uns zu schicken.</li>
            
            </ul>
        </form>
    </div>
    <div id="profilesubmitted"> 
      <p>Die folgenden Informationen wurden an uns &uuml;bertragen:</p>
      <ul>
        <li>Name: <span id="DisplayNameSubmitted"></span></li>
        <li>Google ID: <span id="IdSubmitted"></span></li>
        <li>Geschlecht: <span id="GenderSubmitted"></span></li>
        <li>E-Mail: <span id="EmailSubmitted"></span></li>
        <li>Ingress Agentname: <span id="AgentNameSubmitted"></span></li>
        <li>Einsatzgebiet: <span id="EinsatzgebietSubmitted"></span></li>
      </ul>
      <button id="update" onClick="return update();" class="btn btn-green">Daten aktualisieren</button>
      <p>&nbsp;</p>
      <p><strong>Bitte lies dir die folgenden beiden Abschnitte aufmerksam durch.</strong></p>
      <h2>Codeword-&Uuml;berpr&uuml;fung</h2>
      <p>Um deinen Agentname zu best&auml;tigen, schreib bitte im <strong>Faction COMM</strong> das Codeword: <span class="big label label-red bold" id="codespan"><span id="CodeWord">CODEWORD</span></span>. Damit wir das Codeword auch finden, solltest du dazu in deinem angegebenen Einsatzgebiet sein oder oder dich mit der <a href="http://www.ingress.com/intel?ll=<?php echo $local['ResArea'];?>&amp;z=15" target="_blank">Intel-Karte</a> &uuml;ber deinem Einsatzgebiet befinden.</p>
      
      <h2>Anmeldung in der Google+-Community</h2>
      <p>Nachdem wir nun wissen wer du bist, musst du nur noch die Google-Community <a href="https://plus.google.com/u/0/communities/<?php echo $config['GPlusGroupID']; ?>" target="_blank"><?php echo $local['ResName']; ?></a> aufrufen und formell eine <b>Beitrittsanfrage stellen</b>. Eines unserer Mitglieder wird dann per COMM, Google Hangouts oder Google+ mit dir Verbindung aufnehmen und ein Treffen mit dir vereinbaren. Alternativ kannst du auch zu einem der Events kommen, zu denen wir dich dann via Google+ einladen. Achte also regelm&auml;ssig auf Google+-Benachrichtigungen.</p>
    </div>
      <button class="center btn btn-red" id="disconnect">Meinen Google-Account von dieser App abmelden</button>
  </div>
</div>
<!-- /Formular -->