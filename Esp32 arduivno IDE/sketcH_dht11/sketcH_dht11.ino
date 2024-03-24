#include <WiFi.h>
#include <HTTPClient.h>
#include "DHT.h"

const char* ssid = "mywifi";      // Enter your WiFi SSID here
const char* password = "mypassword";  // Enter your WiFi password here

// DHT Sensor
#define DHTPIN 5
#define DHTTYPE DHT11  // Change this if you're using a different DHT sensor

DHT dht(DHTPIN, DHTTYPE);

const char* serverIP = "xxx.xxx.xxx.xxx";                       // Use the IP of your WAMP server
const char* endpoint = "/Weather-app-IOT/insert_data_dht11.php";  // Endpoint for the PHP script


#define LED_PIN 13  // LED pin

void setup() {
  Serial.begin(115200);
  pinMode(LED_PIN, OUTPUT); // Initialize LED pin

  pinMode(DHTPIN, INPUT);
  dht.begin();

  Serial.println("Connecting to ");
  Serial.println(ssid);

  // Connect to Wi-Fi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected..!");
  Serial.print("Got IP: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();

  if (isnan(temperature) || isnan(humidity)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  // Construct the data string
  String data = "temperature=" + String(temperature) + "&humidity=" + String(humidity);
  Serial.print("Sending data: ");
  Serial.println(data);

  // Send HTTP POST request to WAMP server
  HTTPClient http;
  http.begin("http://" + String(serverIP) + String(endpoint));
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpResponseCode = http.POST(data);

  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.print("Error in HTTP request: ");
    Serial.println(httpResponseCode);
  }

  http.end();

  delay(10000);  // Wait for 1 second before sending the next request
}
