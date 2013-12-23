Resistance-Microsite
====================

Eine Microsite für die Genehmigung und Verwaltung neuer Ingress Community-Mitglieder (Resistance Version).

**German Version**

Was enthält dieses Paket?

- Anmeldeformular mit G+ Authentifizierung
- Datenbankanbindung mit "Adminbereich" .htaccess geschützt
- [Kube - Professional CSS-framework](http://imperavi.com/kube/)
- [Colorbox](http://www.jacklmoore.com/colorbox/) 
- [phpMailer](https://github.com/PHPMailer/PHPMailer)
- [Elastislide – A Responsive jQuery Carousel Plugin](http://tympanus.net/codrops/2011/09/12/elastislide-responsive-carousel/) 
- [Modernizer](http://modernizr.com/)
- [DummyImages](http://dummy-image-generator.com/)

Funktionsfähige Version für die Resistance Munich unter [http://resmuc.dev-planet.de](http://resmuc.dev-planet.de) (**kein Demo!**)

## Installation ##

1. Datenbank anlegen. Es gibt ein Script database.sql, welches das übernimmt. Name der Datenbank und Table müssen angepasst werden. **Das Script sollte nach der Erstellung der Datenbank gelöscht werden.**
2. Einstellungen in der /common/inc/config.php vornehmen. Dort bitte alle Felder ausfüllen, sonst läuft das ganze nicht.
3. Einstellungen in /common/inc/class.phpmailer.php vornehmen. 
4. In der /index.php ggf. nicht benötigte Inhalte ausblenden
5. Dateien in /admin/* mit .htaccess gegen Zugriff absichern

**Wichtiger Hinweis:**

Ich übernehme keine Haftung für Schäden die an Ihrem System, Datenbank, etc. entstehen. Überlegen Sie genau was Sie tun. Wenn Sie keine Ahnung von Ihrem System haben, dann fragen Sie jemanden der sich damit auskennt. 


**Changelog:**

2013-12-23 - v0.1 - Initialer Upload