#include <WiFi.h>               // WiFi-kirjasto ESP32:lle
#include <HTTPClient.h>         // HTTP-asiakaskirjasto HTTP-pyynnön tekemiseen
#include "DHT.h"                // DHT-anturikirjasto

const char* ssid = "mywifi";        // WiFi-verkkosi SSID
const char* password = "mypassword"; // WiFi-verkkosi salasana

// DHT-anturi
#define DHTPIN 5                    // DHT-anturin data-pinni
#define DHTTYPE DHT11               // Käytetty DHT-anturityyppi

DHT dht(DHTPIN, DHTTYPE);           // Luodaan DHT-anturin objekti

const char* serverIP = "xxx.xxx.xxx.xxx";                        // WAMP-palvelimesi IP-osoite
const char* endpoint = "/Weather-app-IOT/insert_data_dht11.php"; // PHP-skriptin loppupiste

#define LED_PIN 13                  // LEDin pinni

void setup() {
  Serial.begin(115200);             // Alustetaan sarjaportti

  pinMode(LED_PIN, OUTPUT);         // Alustetaan LEDin pinni

  pinMode(DHTPIN, INPUT);           // Asetetaan DHT-anturin pinni syötteenä
  dht.begin();                      // Alustetaan DHT-anturi

  Serial.println("Yhdistetään verkkoon ");
  Serial.println(ssid);

  // Yhdistetään WiFi-verkkoon
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi-yhteys muodostettu..!");
  Serial.print("Saimme IP:n: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  float temperature = dht.readTemperature();   // Luetaan lämpötila DHT-anturilta
  float humidity = dht.readHumidity();         // Luetaan ilmankosteus DHT-anturilta

  if (isnan(temperature) || isnan(humidity)) { // Tarkistetaan, onko lukemat kelvollisia
    Serial.println("DHT-anturilta lukeminen epäonnistui!");
    return;
  }

  // Muodostetaan datajoukko merkkijonona
  String data = "lämpötila=" + String(temperature) + "&ilman_kosteus=" + String(humidity);
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

  http.end();

  delay(10000);  // Odota 10 sekuntia ennen seuraavaa pyyntöä
}
