<div class="units-row">
    <div class="unit-80 unit-centered whitebg">
     
        <!-- Elastislide Carousel -->
        <ul id="slider1" class="elastislide-list">
        <?php
        // Ordnername
        $ordner = "./images/slider1"; //auch komplette Pfade möglich ($ordner = "download/files";)
         
        // Ordner auslesen und Array in Variable speichern
        $alledateien = scandir($ordner); // Sortierung A-Z
        // Sortierung Z-A mit scandir($ordner, 1)                               
         
        // Schleife um Array "$alledateien" aus scandir Funktion auszugeben
        // Einzeldateien werden dabei in der Variabel $datei abgelegt
        foreach ($alledateien as $datei) {
         
            // Zusammentragen der Dateiinfo
            $dateiinfo = pathinfo($ordner."/".$datei);
            //Folgende Variablen stehen nach pathinfo zur Verfügung
            // $dateiinfo['filename'] =Dateiname ohne Dateiendung  *erst mit PHP 5.2
            // $dateiinfo['dirname'] = Verzeichnisname
            // $dateiinfo['extension'] = Dateityp -/endung
            // $dateiinfo['basename'] = voller Dateiname mit Dateiendung
         
            // Größe ermitteln zur Ausgabe
            $size = ceil(filesize($ordner."/".$datei)/1024);
            //1024 = kb | 1048576 = MB | 1073741824 = GB
         
            // scandir liest alle Dateien im Ordner aus, zusätzlich noch "." , ".." als Ordner
            // Nur echte Dateien anzeigen lassen und keine "Punkt" Ordner
            // _notes ist eine Ergänzung für Dreamweaver Nutzer, denn DW legt zur besseren Synchronisation diese Datei in den Orndern ab
            if ($datei != "." && $datei != ".."  && $datei != "_notes"  && $datei != "Thumbs.db") {
            ?>
            <li><a href="./images/slider1/<?php echo $dateiinfo['basename'];?>" class="group1"><img src="./images/slider1/<?php echo $dateiinfo['basename']; ?>" alt="" height="180" /></a></li>
        <?php
            };
        };
        ?>    
        </ul>
        <!-- End Elastislide Carousel -->
        
        
    </div>

</div>