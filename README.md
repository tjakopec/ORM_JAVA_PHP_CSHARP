# Osnove objektno relacijskog mapiranja (ORM) u programskim jezicima  JAVA,  PHP i C#


Predavanje daje uvod u relacijski model baza podataka, objektno orjentiranog programiranja te objektnog relacijskog mapiranja. Predavanje prikazuje implementaciju ORM-a u programskim jezicima Java, PHP i C#. Prikazuje se osnovno postavljanje, mapiranje entiteta te veza između entiteta (1:n, n:n) i CRUD operacije.

Ovo neka bude početna točka za daljnje istraživanje teme. 

# Relacijski model baza podataka
Definicije

* "Relacijske baze podataka su vrsta baze podataka koja pohranjuje i organizira podatkovne točke s definiranim odnosima za brzi pristup." ([azure.microsoft.com What is a relational database?])
* "Relacijska baza podataka je zbirka stavki podataka s unaprijed definiranim odnosima između njih. Ove stavke su organizirane kao skup tablica sa stupcima i recima." ([aws.amazon.com What is a Relational Database?])
* "Relacijska baza podataka je vrsta baze podataka koja pohranjuje i pruža pristup točkama podataka koje su međusobno povezane." [oracle.com What is a Relational Database (RDBMS)?]

Sustavi za upravljanje relacijskim bazama podataka

* Vlasnički kod (proprietary)
	* [Oracle DB]
	* [Microsoft SQL server]
	* [IBM DB2]
* Otvoreni pristup (open source)
	* [MariaDB]
	* [PostgreSQL]
	* [MySQL Comunity Edition]

Alati za rad s različitim bazama podataka

* Vlasnički kod (proprietary)
	* [JetBrains DataGrip]
* Otvoreni pristup (open source)
	* [DBeaver]

Dobar izvor za upoznavanje s relacijskim bazama podataka su 2016 dale Ana Leh, Dajana Stojanović i Tena Vilček - TADA studentice 3. godine preddiplomskog studija Informatologije (Filozofski fakultet, Osijek) u sklopu OSC Code Camp radionice na temu "Uvod u MySQL". 

* [Uvod u MySQL prezentacija]
* [Uvod u MySQL github repozitorij]

# Objektno orijentirano programiranje

Definicija

* "Objektno orijentirano programiranje (OOP) je model računalnog programiranja koji organizira dizajn programskih rješenja oko podataka ili objekata, a ne funkcija i logike." ([techtarget.com DEFINITION object-oriented programming (OOP)])

OOP principi

* Klasa/Objekt
* Učahurivanje
* Nasljeđivanje
* Višeobličje (polimorfizam)

Dobar izvor za upoznavanje s OOP sam odradio 2020 u sklopu OSC Code Camp radionice na temu [OOP Java, PHP, Python, Swift]. Kasnije su na isti repozitorij dodani jezici C# i Kotlin.


# ORM

## Što je ORM?

ORM ili objektno-relacijsko mapiranje je sustav koji implementira odgovornost mapiranja objekta programskog jezika u relacijski model baze podataka. To znači da je odgovorno provoditi operacije unosa, promjene i brisanja podataka objektnog modela u relacijski model te čitati podatke iz relacijskog modela u objektni model.

<img src="https://raw.githubusercontent.com/tjakopec/ORM_JAVA_PHP_CSHARP/main/orm_shema.svg" />
*izvor slike: https://www.educative.io/edpresso/what-is-object-relational-mapping

## Motivacija za korištenje ORM-a
U dijelu baza podataka želimo imati tablice koje su uredno složene i povezane parovima primarni i vanjski (strani ključ). Iz tog razloga pišemo [sql skriptu]. Skriptu možemo pisati koristeći SQL 92 standard i raditi će u većini RDBMS a u svima ostalima uz sitne izmjene.

<img src="https://raw.githubusercontent.com/tjakopec/ORM_JAVA_PHP_CSHARP/main/orm_java.png" />

S druge strane svakako u OOP jeziku po izboru želimo definirati klase i odnose između klasa kako bi lakše razvijali programsko rješenje.

<img src="https://github.com/tjakopec/OOP_JAVA_PHP_PYTHON/blob/master/Java/classDiagram1.png?raw=true" />

Gdje nastaje problem? Ima li uopće problema? Idemo pogledati kako bi izgledao java kod za unos podataka u tablicu mjesanje

<pre>
<code>
PreparedStatement ps = veza.prepareStatement("insert into mjesanje " +
"(vrsta, belot, datumunosa, stiglja, bodovadrugiunos, bodovaprviunos, " +
"zvanjeprviunos, bodovatreciunos, zvanjetreciunos, partija) " +
"VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
ps.setString(1,"triUnosa");
ps.setBoolean(2,mjesanje.isBelot());
ps.setDate(3, new java.sql.Date(mjesanje.getDatumUnosa().getTime()));
ps.setBoolean(4,mjesanje.isStiglja());
ps.setInt(5,mjesanje.getBodovaDrugiUnos());
ps.setInt(6,mjesanje.getBodovaPrviUnos());
ps.setInt(7,mjesanje.getZvanjePrviUnos());
ps.setInt(8,mjesanje.getBodovaTreciUnos());
ps.setInt(9,mjesanje.getZvanjeTreciUnos());
ps.setLong(10,mjesanje.getPartija().getId());
ps.executeUpdate();
</code>
</pre>

Što da tablica ima još 10 atributa? Morali bi ručno još 10 naziva atributa, 10 ? (upitnika) i 10 ps.set... Ovo je samo primjer s insert. Isto je i s update, delete i select.

# Implementacija u jezicima

Isti primjer (vođenje rezultata u kartaškoj igri Belot) je realiziran u različitim programskim jezicima. Kako je ORM sustav koji implementira odgovornost mapiranja u različitim programskim jezicima postoje različite implementacije ORM-a. Za svaki jezik je navedeno razvojno okruženje i korištena ORM implementacija.

## Java
* Verzija programskog jezika: **11**
* Razvojno okruženje (IDE): **IntelliJ IDEA**
* Upravitelj zavisnosti (dependency manager): **Maven**
* ORM implementacja: **Hibernate 6.0.1.Final**
* Baza podataka: **MariaDB** 
* Projekt: [Java]

## PHP
* Verzija programskog jezika: **7.4.3**
* Razvojno okruženje (IDE): **PhpStorm**
* Upravitelj zavisnosti (dependency manager): **Composer**
* ORM implementacja: **Doctrine ^2.11.0**
* Baza podataka: **MariaDB** 
* Projekt: [PHP]

## C#
* Verzija programskog jezika: **7.4.3**
* Razvojno okruženje (IDE): **PhpStorm**
* Upravitelj zavisnosti (dependency manager): **NuGet**
* ORM implementacja: **EntityFramework 6.4.4**
* Baza podataka: **MariaDB** 
* Projekt: [CSHARP]

# Fun facts
* &gt; 30 commits
* Trajanje pripreme materijala cca 10 sati.
* Završio s izradom materijala u četvrtak, 09. 06. 2022 u 14:20
<img src="https://github.com/tjakopec/ORM_JAVA_PHP_CSHARP/blob/main/Priprema.jpeg?raw=true">


# Predavač
Tomislav Jakopec radi kao docent na Odsjeku za informacijske znanosti pri Filozofskom fakultetu Osijek. Voditelj je Dvopredmetnog diplomskog studija informacijske tehnologije. Nositelj je kolegija vezanih uz informacijske tehnologije u društvenom području. Kao vanjski suradnik izvodi nastavu na Stručnom studiju informacijskih tehnologija na Odjelu za informacijske znanosti pri Sveučilištu u Zadru na kolegiju Razvoj mobilnih aplikacija. Veliki je zaljubljenik u informacijske tehnologije općenito.



# Korišteni izvori
* [ORM (Object Relational Mapping)]
* [What is Object Relational Mapping?]
* [A brief history of Object Relational Mapping]
* [The Rise and Fall of Object Relational Mapping]
* [What is an ORM and Why You Should Use it]


** Sav korišten kôd, kako u primjerima tako i u razvojnim alatima je besplatan i dostupan u otvorenom pristupu. Stoga je i ovaj sadržaj besplatno dostupan u otvorenom pristupu  **

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [azure.microsoft.com What is a relational database?]: <https://azure.microsoft.com/en-us/overview/what-is-a-relational-database/#whatis>
   [aws.amazon.com What is a Relational Database?]: <https://aws.amazon.com/relational-database/>
   [oracle.com What is a Relational Database (RDBMS)?]: <https://www.oracle.com/database/what-is-a-relational-database/>
   [Oracle DB]: <https://www.oracle.com/database/technologies/>
   [Microsoft SQL server]: <https://www.microsoft.com/en-us/sql-server/sql-server-downloads>
   [IBM DB2]: <https://www.ibm.com/analytics/db2/trials>
   [MariaDB]: <https://mariadb.org/download>
   [PostgreSQL]: <https://www.postgresql.org/download/>
   [MySQL Comunity Edition]: <https://www.mysql.com/products/community/>
   [JetBrains DataGrip]: <https://www.jetbrains.com/datagrip/>
   [DBeaver]: <https://dbeaver.io/>
   [Uvod u MySQL prezentacija]: <https://prezi.com/cdotdlltlafc/uvod-u-mysql/>
   [Uvod u MySQL github repozitorij]: <https://github.com/tvilcek/OSC3MySQL>
   [techtarget.com DEFINITION object-oriented programming (OOP)]: <https://www.techtarget.com/searchapparchitecture/definition/object-oriented-programming-OOP>
   [OOP Java, PHP, Python, Swift]: <https://github.com/tjakopec/OOP_JAVA_PHP_PYTHON_SWIFT>
   [sql skriptu]: <https://github.com/tjakopec/ORM_JAVA_PHP_CSHARP/blob/main/belot.sql>
   [Java]: <https://github.com/tjakopec/ORM_JAVA_PHP_CSHARP/tree/main/Java>
   [PHP]: <https://github.com/tjakopec/ORM_JAVA_PHP_CSHARP/tree/main/PHP>
   [CSHARP]: <https://github.com/tjakopec/ORM_JAVA_PHP_CSHARP/tree/main/CSHARP>
   
   [ORM (Object Relational Mapping)]: <https://javabydeveloper.com/orm-object-relational-mapping/>
   [What is Object Relational Mapping?]: <https://www.educative.io/edpresso/what-is-object-relational-mapping>
   [A brief history of Object Relational Mapping]: <https://antoniogoncalves.org/2008/09/27/a-brief-history-of-object-relational-mapping/>
   [The Rise and Fall of Object Relational Mapping]: <https://maetl.net/talks/rise-and-fall-of-orm>
   [What is an ORM and Why You Should Use it]: <https://blog.bitsrc.io/what-is-an-orm-and-why-you-should-use-it-b2b6f75f5e2a>
   
   
   
   
   


   




