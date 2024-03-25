# ESP32 Sääasema IoT-projekti

Tervetuloa sääaseman IoT-projektin pariin, joka on toteutettu ESP32-mikrokontrollerilla. Tämä projekti ei ainoastaan mittaa ympäristötietoja, vaan tarjoaa myös laadukkaan ja helppokäyttöisen verkkosivun reaaliaikaisen datan visualisointiin.

## Ominaisuudet

- **Mittaa ympäristötietoja:** Tämä projekti hyödyntää BME280- ja DHT11-antureita ympäristötietojen tarkkaan mittaamiseen.
  
- **Tallentaa kerätyt tiedot tietokantaan:** Kerätyt ympäristötiedot tallennetaan automaattisesti tietokantaan, jotta niitä voidaan käsitellä ja analysoida tarvittaessa.
  
- **Reaaliaikainen seuranta:** Verkkosivu päivittyy automaattisesti, mikä mahdollistaa viimeisimpien ympäristötietojen reaaliaikaisen seurannan ilman manuaalista päivitystä.
  
- **Näyttää reaaliaikaiset ympäristötiedot verkkosivulla:** Verkkosivulla esitetään käyttäjille ympäristötiedot reaaliajassa selkeällä ja helposti ymmärrettävällä tavalla.
  
- **Responsiivinen suunnittelu:** Käytämme MDB Bootstrap -kehystä varmistaaksemme, että verkkosivu näyttää hienolta ja toimii saumattomasti millä tahansa laitteella.

## Käytetyt teknologiat

- **ESP32-mikro-ohjain:** Tämä projekti käyttää ESP32-mikro-ohjainta ympäristötietojen keräämiseen ja verkkoyhteyden hallintaan.
  
- **BME280-anturi:** BME280-anturi on integroitu projektiin ympäristötietojen, kuten lämpötilan, ilmankosteuden ja ilmanpaineen, tarkkaan mittaamiseen.
  
- **DHT11-anturi:** DHT11-anturi on toinen anturivaihtoehto, jota voidaan käyttää lämpötila- ja ilmankosteustietojen keräämiseen.
  
- **MDB Bootstrap:** Projekti hyödyntää MDB Bootstrapia, joka on Bootstrap-pohjainen käyttöliittymäkomponenttikirjasto, varmistaakseen verkkosivun responsiivisen suunnittelun ja ammattimaisen ulkoasun.
  
- **PHP:** PHP:tä käytetään palvelinpään skriptaukseen, mahdollistaen dynaamisen sisällöntuotannon ja vuorovaikutuksen tietokannan kanssa. WampServeria käytettiin testaukseen ja PHP-skriptien suorittamiseen paikallisesti.
  
- **JavaScript:** JavaScriptiä käytetään asiakaspään skriptauksessa interaktiivisuuden ja käyttäjäkokemuksen parantamiseksi verkkosivustolla.


## Sääaseman kuvat

*Kuva 1: Kytkentä*

![Kytkentä](Projektinkuvat/kytkentä.png)


*Kuva 2: Fritzing*
![Fritzing](Projektinkuvat/fritzin.png)


*Kuva 3: Verkkosivunäkymä*
| Prototype                           | Valmis                               | Valmis                               |
| ----------------------------------- | ------------------------------------ | ------------------------------------ |
| ![Prototyyppi](Projektinkuvat/prototype.png) | ![Valmis](Projektinkuvat/kuva6.png)  | ![Valmis](Projektinkuvat/kuva5.png) |


|                            |                               |                               |
| ----------------------------------- | ------------------------------------ | ------------------------------------ |
| ![Prototyyppi](Projektinkuvat/esittely1.png) | ![Valmis](Projektinkuvat/esittely2.png)  | ![Valmis](Projektinkuvat/esittely1.png) |



*Kuva 4: Verkkosivunäkymä*

| LG                                  | MD                                  | SM                                          |
| ----------------------------------- | ----------------------------------- | ------------------------------------------- |
| ![LG](Projektinkuvat/verkkosivut/kuva1.png) | ![MD](Projektinkuvat/verkkosivut/verkkosivu.png) | ![SM](Projektinkuvat/verkkosivut/verkkosivu2.png) |





## Yhteydenotto

Jos sinulla on kysyttävää tai kommentteja, voit ottaa yhteyttä sähköpostitse osoitteeseen [arthur.ferreiramiran@gmail.com].
