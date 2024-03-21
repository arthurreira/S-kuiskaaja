#include <WiFi.h>
#include <HTTPClient.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>
#include <Wire.h>


const char* ssid = "TVT-WLAN";      // Enter your WiFi SSID here
const char* password = "salasana";  // Enter your WiFi password here

// BME280 Sensor
#define BME_SDA 23
#define BME_SCL 22
#define SEALEVELPRESSURE_HPA (1013.25)     // Adjust this to your local sea level pressure

Adafruit_BME280 bme;

const char* serverIP = "10.124.12.95";   // Use the IP of your WAMP server
const char* endpoint = "/Weather-app-IOT/insert_data_bme280.php";  // Endpoint for the PHP script

#define LED_PIN 13  // LED pin

void setup() {
  Serial.begin(115200);
  pinMode(LED_PIN, OUTPUT); // Initialize LED pin
  Wire.begin(BME_SDA, BME_SCL);

  if (!bme.begin()) {
    Serial.println("Could not find BME280 sensor, check wiring!");
    while (1);
  }

  Serial.println("Connecting to ");
  Serial.println(ssid);

  // Connect to Wi-Fi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(LED_PIN, LOW); // Turn off LED if not connected
    delay(500);
    digitalWrite(LED_PIN, HIGH); // Turn on LED if connected
    delay(500);
    Serial.print(".");
  }
  digitalWrite(LED_PIN, HIGH); // Turn off LED if connected
  Serial.println("");
  Serial.println("WiFi connected..!");
  Serial.print("Got IP: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  float temperature = bme.readTemperature();
  float humidity = bme.readHumidity();
  float pressure = bme.readPressure() / 100.0F; // Pressure in hPa
  float altitude = bme.readAltitude(SEALEVELPRESSURE_HPA);

  Serial.print("Temperature = ");
  Serial.print(temperature);
  Serial.println(" *C");

  Serial.print("Humidity = ");
  Serial.print(humidity);
  Serial.println(" %");

  Serial.print("Pressure = ");
  Serial.print(pressure);
  Serial.println(" hPa");

  Serial.print("Altitude = ");
  Serial.print(altitude);
  Serial.println(" meters");

  // Construct the data string
  String data = "temperature=" + String(temperature) + "&humidity=" + String(humidity) + "&pressure=" + String(pressure) + "&altitude=" + String(altitude);



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
    digitalWrite(LED_PIN, HIGH); // Turn on LED
    delay(500); // Delay for LED blinking
    digitalWrite(LED_PIN, LOW); // Turn off LED
  } else {
    Serial.print("Error in HTTP request: ");
    Serial.println(httpResponseCode);
  }
  if (httpResponseCode == 200) {
    String responseBody = http.getString();
    Serial.println("Received response:");
    Serial.println(responseBody);
  }

  http.end();

  delay(10000);  // Wait for 10 seconds before sending the next request
}
