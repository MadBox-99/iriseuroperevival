**EUROPE REVIVAL 2026**

Konferencia Weboldal

Projekt Specifikáció

Egyedi Laravel alapú webfejlesztés

Stripe fizetési integrációval

Verzió: 1.0 | Dátum: 2025\. január

# **1\. Projekt Áttekintés**

## **1.1 Projekt Célja**

Egy modern, felhasználóbarát konferencia weboldal fejlesztése az Europe Revival 2026 keresztény konferencia számára. A weboldal célja a konferencia bemutatása, a résztvevők regisztrációjának kezelése, valamint az önkéntesek és szolgálócsapat tagjainak toborzása és jóváhagyása.

## **1.2 Projekt Adatok**

| Projekt neve | Europe Revival 2026 Konferencia Weboldal |
| :---- | :---- |
| **Technológia** | Laravel 12+ (PHP 8.2+) |
| **Fizetési rendszer** | Stripe |
| **Nyelvek** | Magyar, Angol (kétnyelvű) |
| **Célközönség** | Keresztény közösségek, nemzetközi résztvevők |
| **Helyszín** | Budapest, Magyarország |
| **Várható dátum** | 2026\. október 22-25. |
| **Kivitelező cég** | Tóth Tamás János ev. |

# **2\. Funkcionális Követelmények**

## **2.1 Főoldal Elemei**

* Borítókép a konferencia központi témájával

* Konferencia neve és szlogen

* Dátum és helyszín (Budapest látképével)

* Regisztrációs CTA gomb

* Megosztás funkció (barátoknak továbbítás)

* Promóciós videó beágyazás

* Kulcsszavak/témák megjelenítése

## **2.2 Előadók Szekció**

* Színpadi előadók profiljai

* Workshop előadók bemutatása

* Minden előadóhoz: név, fotó, titulus, származási ország/város

* Rövid bemutatkozó szöveg

## **2.3 Szervező Bemutató**

Az Iris szervezetről szóló rövid bemutatkozó szekció, amely tartalmazza a szervezet küldetését és a konferencia hátterét.

## **2.4 Programok és Workshopok**

* Részletes programtervek megjelenítése

* Workshop leírások

* Miért érdemes részt venni \- előnyök bemutatása

* Külön aloldal a részletes programhoz

## **2.5 Célközönség Szekció**

Egyértelmű kommunikáció arról, hogy a konferencia kinek szól: keresztényeknek és nem keresztényeknek egyaránt.

## **2.6 Jegyek és Árazás**

* Jegytípusok és árak megjelenítése

* Early Bird kedvezmény kezelése

* Csoportos kedvezmény lehetősége

* Határidők kommunikálása

* Közvetlen átlinkelés a regisztrációra

## **2.7 Partnerek és Támogatók**

Támogató szervezetek logóinak megjelenítése grid elrendezésben.

## **2.8 Hasznos Információk (FAQ)**

* Parkolási lehetőségek

* Tolmácsolás információk

* Gyermekfelügyelet

* Étkezési lehetőségek

* Közlekedés/megközelítés

* Szállás ajánlások (linkekkel)

* Ülőhelyek rendszere

* Támogatási lehetőségek (Iris szervezet)

* Csomagmegőrző információk

* Jegy átruházhatósága

# **3\. Regisztrációs Rendszer**

## **3.1 Regisztráció Típusok**

### **A) Résztvevő Regisztráció**

Egyszerű regisztrációs űrlap a konferencia látogatói számára.

* Vezetéknév, keresztnév

* Ország

* E-mail cím

* Jegytípus kiválasztása

* Stripe fizetés

### **B) Önkéntes Regisztráció**

Magyar nyelvű önkéntesek regisztrációja, jóváhagyási folyamat nélkül vagy egyszerűsített jóváhagyással.

* Alapadatok (név, e-mail, ország)

* Beszélt nyelvek

* Elérhetőség

* Jegytípus kiválasztása \- más árakkal, tehát más “termékek”

* Stripe fizetés

### **C) Szolgálócsapat (Ministry Team) Regisztráció**

Komplex regisztrációs űrlap jóváhagyási folyamattal.

**Kötelező mezők:**

* Vezetéknév, keresztnév

* Állampolgárság

* Beszélt nyelvek

* Lakóhely (ország és város)

* E-mail cím

* Foglalkozás / beosztás

* Küldő gyülekezet vagy szolgálat

* Újjászülettél? (igen/nem)

* Betöltekeztél Szent Szellemmel? (igen/nem)

* Rövid leírás ezekről az eseményekről

* Szolgálati iskola végzettség (Harvest School, BSSM, egyéb)

* Irányelvek elfogadása nyilatkozat

* Vezetőségnek való alárendelés elfogadása

* Jelenlegi elöljárók megadása

* Referencia személy e-mail címe

* Meghívó személy neve (opcionális)

## **3.2 Jóváhagyási Workflow (Szolgálócsapat)**

**1\. Jelentkezés benyújtása**

* Jelentkező kitölti az űrlapot

* Automatikus visszaigazoló e-mail: "Jelentkezésed feldolgozás alatt áll"

* Státusz: PENDING

**2\. Referencia ellenőrzés**

* Admin értesítést kap új jelentkezésről

* Rendszer értesíti a jelentkezőt: "Megkerestük a referencia személyt"

* Manuális kapcsolatfelvétel a referencia személlyel

* Státusz: UNDER\_REVIEW

**3a. Jóváhagyás esetén**

* Admin jóváhagyja a jelentkezést

* Automatikus e-mail a jelentkezőnek:

  * Regisztráció elfogadva üzenet

  * Kedvezményes szállás információk

  * Tréning dátum: 2026\. október 22\.

  * Érkezés: 2026\. október 21\.

* Státusz: APPROVED

**3b. Elutasítás esetén**

* Admin elutasítja a jelentkezést

* Automatikus e-mail: elutasítás oka, látogatóként részvétel lehetősége

* Státusz: REJECTED

# **4\. Stripe Fizetési Integráció**

## **4.1 Fizetési Funkciók**

* Stripe Checkout Session használata

* Bankkártyás fizetés (Visa, Mastercard, Amex)

* Apple Pay és Google Pay támogatás

* Automatikus számlázás (Stripe Invoice)

* Webhook integráció a fizetési események kezelésére

## **4.2 Jegytípusok Kezelése**

* Standard jegy

* Early Bird jegy (időkorláttal)

* Csoportos jegy (minimum létszámmal)

* VIP/Speciális jegyek (opcionális)

## **4.3 Kedvezmények**

* Early Bird kedvezmény automatikus érvényesítése határidő alapján

* Kuponkód rendszer

* Csoportos kedvezmény (pl. 10+ fő esetén)

## **4.4 Visszatérítés**

* Admin felületről indítható visszatérítés

* Részleges visszatérítés lehetősége

* Automatikus értesítés a visszatérítésről

# **5\. Adminisztrációs Felület**

## **5.1 Dashboard**

* Regisztrációk összesítése (típusonként)

* Bevétel áttekintés

* Függőben lévő jóváhagyások száma

* Gyors műveletek

## **5.2 Résztvevők Kezelése**

* Résztvevők listázása, szűrése, keresése

* Regisztráció részleteinek megtekintése

* Fizetési státusz nyomon követése

* E-mail küldés egyénileg vagy csoportosan

* Export (CSV, Excel)

## **5.3 Szolgálócsapat Kezelése**

* Jelentkezések listázása státusz szerint

* Jóváhagyás/Elutasítás funkció

* Referencia státusz jelölése

* Megjegyzések hozzáadása

* Kommunikációs napló

## **5.4 Tartalom Kezelés**

* Előadók hozzáadása/szerkesztése

* Programok kezelése

* FAQ szerkesztése

## **5.5 Beállítások**

* Jegytípusok és árak konfigurálása

* Early Bird határidő beállítása

# **6\. Technikai Specifikáció**

## **6.1 Backend**

| Framework | Laravel 12+ |
| :---- | :---- |
| **PHP verzió** | 8.2+ |
| **Adatbázis** | MySQL 8.0  |
| **Cache** | Redis (opcionális) |
| **Queue** | Laravel Queue (database/redis driver) |
| **Mail** | Laravel Mail (SMTP / Mailgun / SES) |

## **6.2 Frontend**

| CSS Framework | Tailwind CSS 4.x |
| :---- | :---- |
| **JavaScript** | Livewire |
| **Build Tool** | Vite |
| **Ikonok** | Heroicons / Lucide |

## **6.3 Integráció**

| Fizetés | Stripe (Checkout Sessions, Webhooks) |
| :---- | :---- |
| **E-mail** | Transactional email szolgáltató |
| **Analytics** | Google Analytics 4 (opcionális) |
| **Videó** | YouTube / Vimeo embed |

## **6.4 Hosting Követelmények**

* VPS vagy Managed Laravel Hosting

* SSL tanúsítvány (HTTPS kötelező Stripe-hoz)

* Minimum 2GB RAM, 2 CPU

* Napi automatikus mentés

# **7\. Kedvezményes árajánlat**

| Tétel | Ár (alanyi adómentes) |
| :---- | ----: |
| Frontend fejlesztés (főoldal \+ aloldalak) | 350.000 helyett 100.000 Ft |
| Regisztrációs rendszer (3 típus \+ workflow) | 250.000 helyett 100.000 Ft |
| Stripe fizetési integráció | 150.000 helyett 80.000 Ft |
| Admin felület (Laravel Filament) | 200.000 helyett 100.000 Ft |
| E-mail rendszer és automatizációk | 100.000 helyett 70.000 Ft |
| Kétnyelvűség (HU/EN) | 80.000 helyett 50.000 Ft |
| **ÖSSZESEN** | **500.000 Ft** |

