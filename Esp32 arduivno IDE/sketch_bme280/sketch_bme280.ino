#include <WiFi.h>               // WiFi-kirjasto ESP32:lle
#include <HTTPClient.h>         // HTTP-asiakaskirjasto HTTP-pyynnön tekemiseen
#include <Adafruit_Sensor.h>    // Anturikirjasto BME280-anturia varten
#include <Adafruit_BME280.h>    // BME280-anturikirjasto
#include <Wire.h>               // I2C-kommunikaatiokirjasto

const char* ssid = "mywifi";        // WiFi-verkkosi SSID
const char* password = "mypassword"; // WiFi-verkkosi salasana

// BME280-anturi
#define BME_SDA 23                  // BME280:n SDA-pinni
#define BME_SCL 22                  // BME280:n SCL-pinni
#define SEALEVELPRESSURE_HPA (1013.25) // Säädä tämä paikallisen merenpinnan paineen mukaan

Adafruit_BME280 bme;                // Luodaan BME280-anturin objekti

const char* serverIP = "xxx.xxx.xxx.xxx";   // WAMP-palvelimesi IP-osoite
const char* endpoint = "/Weather-app-IOT/insert_data_bme280.php"; // PHP-skriptin loppupiste

void setup() {
  Serial.begin(115200);           // Alustetaan sarjaportti

  // Alustetaan BME280-anturi
  Wire.begin(BME_SDA, BME_SCL);
  if (!bme.begin()) {
    Serial.println("BME280-anturia ei löydy, tarkista kytkentä!");
    while (1);
  }

  // Yhdistetään WiFi-verkkoon
  Serial.println("Yhdistetään verkkoon ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi-yhteys muodostettu..!");
  Serial.print("Saimme IP:n: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  // Luetaan ympäristötiedot BME280-anturilta
  float temperature = bme.readTemperature();
  float humidity = bme.readHumidity();
  float pressure = bme.readPressure() / 100.0F; // Ilmanpaine hehtopascaleissa
  float altitude = bme.readAltitude(SEALEVELPRESSURE_HPA);

  // Tulostetaan tiedot sarjaporttiin
  Serial.print("Lämpötila = ");
  Serial.print(temperature);
  Serial.println(" *C");

  Serial.print("Ilmankosteus = ");
  Serial.print(humidity);
  Serial.println(" %");

  Serial.print("Ilmanpaine = ");
  Serial.print(pressure);
  Serial.println(" hPa");

  Serial.print("Korkeus = ");
  Serial.print(altitude);
  Serial.println(" metriä");

  // Luodaan datajoukko merkkijonona
  String data = "lämpötila=" + String(temperature) + "&ilman_kosteus=" + String(humidity) + "&ilmanpaine=" + String(pressure) + "&korkeus=" + String(altitude);

  Serial.print("Lähetetään dataa: ");
  Serial.println(data);

  // Lähetetään HTTP POST -pyyntö WAMP-palvelimelle
  HTTPClient http;
  http.begin("http://" + String(serverIP) + String(endpoint));

  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpResponseCode = http.POST(data);

  if (httpResponseCode > 0) {
    Serial.print("HTTP-vastauskoodi: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.print("Virhe HTTP-pyynnössä: ");
    Serial.println(httpResponseCode);
  }
  if (httpResponseCode == 200) {
    String responseBody = http.getString();
    Serial.println("Vastaanotettu vastaus:");
    Serial.println(responseBody);
  }

  http.end();

  delay(10000);  // Odota 10 sekuntia ennen seuraavaa pyyntöä
}
