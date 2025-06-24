# FileReader
Lettore File Video per Server Locale

Questo lettore acquisisce i file video da un hard disk esterno presenti nella cartella "film" e/o "serietv"

**Configurazione server locale:**
1. Installare XAMPP o altri software simili in grado di istanziare un server locale
2. Installare il repository nella cartella del PC "C:\xampp\htdocs\" (se si utilizza XAMPP), rinominando il repository "FileReader"

**Configurazione web app:**
1. Aprire il CMD in modalità amministratore
2. eseguire questa stringa: mklink /D "C:\xampp\htdocs\FileReader\film" "E:\film"
3. eseguire questa stringa: mklink /D "C:\xampp\htdocs\FileReader\serietv" "E:\serietv"

**Gerarchia cartelle**

C:\xampp\htdocs\FileReader\
I── index.php
I── series.php
I── player.php
I── style.css
I── functions.php
I── film\ (Collegamento simbolico a E:\SerieTV)
I   ├── La_vita_e_bella.mp4
I   └── Doctor_strange.mp4
I── serietv\ (Collegamento simbolico a E:\SerieTV)
    ├── Breaking Bad\
    │   ├── S01E01.mp4
    │   └── ...
    ├── Stranger Things\
    │   ├── S01E01.mp4
    │   └── ...
    └── ...

__Ricorda di dividere in cartelle tutte le varie serie tv__

Dopo aver effettuato questi procedimenti il server sarà disponibile a tutti i dispositivi collegati alla rete all'indirizzo: http://il-tuo-ip/FileReader (puoi visualizzare l'indirizzo ip usando il comando "ipconfig" nel CMD)
