# Ausbildung_Task


# PHP-Authentifizierungssystem Dokumentation

## 1. Übersicht

Dieses Projekt implementiert ein **sicheres PHP-basiertes Authentifizierungssystem**, das es Benutzern ermöglicht, sich **zu registrieren, anzumelden, auf geschützte Ressourcen zuzugreifen und sich abzumelden**.

Das System folgt bewährten Praktiken für **Benutzerverwaltung, Authentifizierung, Autorisierung und Fehlerbehandlung**, um sowohl **Sicherheit als auch Benutzerfreundlichkeit** zu gewährleisten.

Die Architektur nutzt **PHP** und **MySQL** zur Datenspeicherung und verwendet **Session-Management**, um den authentifizierten Benutzerstatus zu verfolgen.

---

## 2. Systemfunktionen

### 2.1 Geschützte Authentifizierung

Bestimmte Seiten, wie `login_success.php` und `register_success.php`, sind **geschützte Ressourcen**. Nur authentifizierte Benutzer können auf diese Seiten zugreifen.

**Verhalten bei unbefugtem Zugriff:**

* Wenn ein nicht authentifizierter Benutzer versucht, auf eine geschützte Seite zuzugreifen, **wird er zur Startseite (`index.php`) umgeleitet**.
* Es wird eine **Zugriff verweigert. Bitte authentifizieren Sie sich, um fortzufahren!** angezeigt, die darauf hinweist, dass eine Authentifizierung erforderlich ist.

**Implementierungsnotizen:**

* PHP-Sessions (`$_SESSION`) werden verwendet, um den Authentifizierungsstatus zu verfolgen.
* Bedingte Prüfungen am Anfang geschützter Seiten stellen sicher, dass nur Benutzer mit aktiven Sessions Zugriff erhalten.

---

### 2.2 Login-Validierung

Benutzer authentifizieren sich mit einer **registrierten E-Mail-Adresse und einem Passwort**.

**Validierungsablauf:**

1. Das System sucht in der Datenbank nach einem Benutzer mit der angegebenen E-Mail-Adresse.
2. Das eingegebene Passwort wird gegen das **gehashte Passwort in der Datenbank** geprüft.
3. Wenn die Anmeldedaten nicht übereinstimmen, zeigt das System einen **Falsche E-Mail oder falsches Passwort!** an.

**Sicherheitsaspekte:**

* Passwörter werden mit `password_hash()` vor der Speicherung gehasht.
* Die Passwortprüfung erfolgt mit `password_verify()`.
* Es werden keine sensiblen Informationen darüber preisgegeben, welches Feld fehlschlägt (E-Mail oder Passwort), um Informationslecks zu vermeiden.

---

### 2.3 Registrierungsvalidierung

Das Registrierungsmodul stellt sicher, dass neue Benutzerkonten grundlegende **Integritäts- und Einzigartigkeitsanforderungen** erfüllen.

#### 2.3.1 Passwort-Abgleich

* Benutzer müssen das Passwort zur Bestätigung zweimal eingeben.
* Stimmen Passwort und Bestätigung **nicht überein**, zeigt das System einen **Passwörter stimmen nicht überein!** an.

#### 2.3.2 E-Mail-Einzigartigkeit

* Vor der Erstellung eines neuen Benutzers überprüft das System, ob die **E-Mail-Adresse bereits in der Datenbank existiert**.
* Ist die E-Mail bereits registriert, zeigt das System einen **E-Mail ist bereits registriert!** an.

**Implementierungsnotizen:**

* Verwende eine `SELECT`-Abfrage, um vorhandene E-Mails zu überprüfen.
* Wird kein Treffer gefunden, wird der neue Benutzer mit dem **gehashten Passwort** in die Datenbank eingefügt.

---

### 2.4 Logout-Funktionalität

Das System beinhaltet eine **dedizierte Logout-Seite** (`logout.php`), um Benutzersessions zu beenden.

**Ablauf:**

1. Alle Session-Variablen werden mit `session_destroy()` gelöscht.
2. Der Benutzer wird zur **Startseite (`index.php`)** weitergeleitet.

Dies stellt sicher, dass authentifizierte Sessions ordnungsgemäß beendet werden und nach dem Logout kein unbefugter Zugriff möglich ist.
