<div class="units-row">
    <div class="unit-80 unit-centered whitebg">
     
        <!-- Elastislide Carousel -->
        <ul id="slider2" class="elastislide-list">
        <?php
        // Ordnername
        $ordner = "./images/slider2"; //auch komplette Pfade möglich ($ordner = "download/files";)
         
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
            <li><a href="./images/slider2/<?php echo $dateiinfo['basename'];?>" class="group2"><img src="./images/slider2/<?php echo $dateiinfo['basename']; ?>" height="180" alt="" /></a></li>
        <?php
            };
        };
        ?>    
        </ul>
        <!-- End Elastislide Carousel -->
        
        
    </div>

</div>