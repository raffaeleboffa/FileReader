# FileReader
Lettore File Video per Server Locale

Questo lettore acquisisce i file video da un hard disk esterno presenti nella cartella "film"

**Configurazione server locale:**
1. Installare XAMPP o altri software simili in grado di istanziare un server locale
2. Installare il repository nella cartella del PC "C:\xampp\htdocs\" rinominando il repository "FileReader"

**Configurazione web app:**
1. Aprire il CMD in modalità amministratore
2. eseguire questa stringa: mklink /D "C:\xampp\htdocs\FileReader\film" "E:\film"

Dopo aver effettuato questi procedimenti il server sarà disponibile a tutti i dispositivi collegati alla rete all'indirizzo: http://il-tuo-ip/FileReader (puoi visualizzare l'indirizzo ip usando il comando "ipconfig" nel CMD)
