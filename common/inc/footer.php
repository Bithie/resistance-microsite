<div class="units-row">
    <div class="unit-80 unit-centered whitebg">
        <nav class="nav-g unit-centered">
            <ul>
                <li><a href="#mod_content" class="moderatoren">Moderatoren der <?php echo $local['ResName']; ?></a></li>
                <li><a href="#impressum_content" class="impressum">Impressum</a></li>
                <li><a href="#disclaimer_content" class="disclaimer">Disclaimer</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
        <p class="unit-centered">&copy; 2013 <?php echo $local['ResName']; ?></p>
    </div>
</div>

<div style="display: none;">
    
    <div class="units-row" id="mod_content">
    	<div class="unit-100">
            <h2>Moderatoren der <?php echo $local['ResName']; ?></h2>
            <script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
            <?php
            foreach ($mod as $modbagde) {
                echo '<div class="g-person" data-layout="landscape" data-width="273" data-href="https://plus.google.com/'.$modbagde.'"></div>&nbsp;&nbsp;&nbsp;';
            } 
            
            ?>
        </div>
    </div>
    <div class="units-row" id="impressum_content">
    	<div class="unit-100">
            <h2>Impressum</h2>
            <p>Angaben gemäß § 5 TMG:<br />
            </p>
            <p><?php echo $contact['name']; ?><br />
              <?php echo $contact['street']; ?><br />
              <?php echo $contact['city']; ?><br />
              E-Mail: <?php echo $contact['mail']; ?>
            </p>
            
            <h4>Quellenangaben für die verwendeten Bilder und Grafiken:</h4>
            <p><a href="https://plus.google.com/u/0/communities/<?php echo $config['GPlusGroupID']; ?>">https://plus.google.com/u/0/communities/<?php echo $config['GPlusGroupID']; ?></a><br />
              <?php echo $local['ResName']; ?></p>
            <p>Quellverweis: <em><a rel="nofollow" href="http://www.e-recht24.de">http://www.e-recht24.de</a></em></p>
        
        </div>
    </div>
    <div class="units-row" id="disclaimer_content">
    	<div class="unit-100">
            <h2>Haftungsausschluss (Disclaimer)</h2>
            <p><strong>Haftung für Inhalte</strong></p>
            <p>Als Diensteanbieter sind   wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den   allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als   Diensteanbieter jedoch nicht verpflichtet, übermittelte oder   gespeicherte fremde Informationen zu überwachen oder nach Umständen zu   forschen, die auf eine rechtswidrige Tätigkeit hinweisen.   Verpflichtungen zur Entfernung oder Sperrung der Nutzung von   Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt.   Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der   Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von   entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend   entfernen.</p>
            <p><strong>Haftung für Links</strong></p>
            <p>Unser   Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte   wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte   auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist   stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.   Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche   Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der   Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der   verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer   Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von   Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>
            <p><strong>Urheberrecht</strong></p>
            <p>Die   durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen   Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung,   Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der   Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des   jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite   sind nur für den privaten, nicht kommerziellen Gebrauch gestattet.   Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden,   werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte   Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine   Urheberrechtsverletzung aufmerksam werden, bitten wir um einen   entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden   wir derartige Inhalte umgehend entfernen.</p>
            
            <p><em>Quellverweis: <a rel="nofollow" href="http://www.e-recht24.de/muster-disclaimer.html" target="_blank">Disclaimer eRecht24</a></em></p>
        
        </div>
    </div>
</div>

<div id="back-top"> <a href="#top"><span></span></a> </div>
<!-- JS -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="./common/js/kube.buttons.js"></script>
    <script type="text/javascript" src="./common/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="./common/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="./common/js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="./common/js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="./common/js/custom.js"></script>
</body>
</html>