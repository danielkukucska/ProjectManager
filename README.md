# ProjectManager

# Daniel Kukucska (sqabsb)

Webprogramozás II. tantárgy beadandó

## Mappastruktúra

    .
    ├──App                      #Az alkalmazás forráskódja
        ├──Controllers          #elegfelelő üzleti logika és nézetek kezelése
        ├──Core                 #elérési utak, adatbázis inicializálás, konfigurációk
        ├──Database             #fejlesztés során készített migrációk és  kezdeti adatbetöltő script
        ├──DTO                  #prezentációs réteg  és  üzleti logika réteg közötti kommunikációt definiáló osztályok
        ├──Exceptions           #egyedi  kivételek
        ├──Models               #adatbázis táblákat leíró osztályok
        ├──Repositories         #adatbázisműveleteket végző osztályok
        ├──Services             #üzleti logikáért felelős osztályok
        └──views                #megjelenítésért felelős  php fájlok
    ├──Public                   #publikus állományok
        ├──css                  #styíluslapok
        ├──images               #ikonok és képek
        └──vs                   #javascript forráskódok
    └──vendor                   #migrációk hoz phinx könyvtárat használtam

## Megvalósított funkciók vázlatosan

-Felhasználók kezelése, regisztráció, bejelentkezés, kijelentkezés, jelszócsere, előléptetés és lefokozás
-Projektek listázása, új létrehozása, módosítása és törlése
-Projektekhez kötődő feladatok listázása, új hozzáadása, egyszerre több importálása, törlése és felelősök kezelése
-Jelenléti ívek heti töltése

## Megjegyzések

Még nagyon sok helyen lehetne tovább javítani az alkalmazást. Erre pár példa, amire nem jutott időm:
-Szerver oldali validáció és egyedi hibák hozzá
-Importálandó fájlhoz validáció és minta fájl
-Projektekhez tartozó dolgozók és feladatok listázása
