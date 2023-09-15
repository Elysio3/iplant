#include <Arduino.h>
#include <Wire.h>
#include <SPI.h>
#include <WiFiNINA.h>
#include <ArduinoHttpClient.h>

const char* idplant = SECRET_IDPLANT;

// WiFi credentials
char ssid[] = SECRET_SSID;
char pass[] = SECRET_PASS;

// Server and API credentials
const char* server = SECRET_HOSTNAME;
const int port = 80;
const char* username = SECRET_API_USERNAME;
const char* password = SECRET_API_KEY;

WiFiClient wifiClient;
HttpClient client(wifiClient, server, port);

// Indicators LEDs
int const ledRed = 10;
int const ledGreen = 11;
int const ledBlue = 12;

// Thermometer
const int temperatureSensorPin = A1;
int temperatureSensorValue = 0;

// Phototransistor
const int lightSensorPin = A2;
int lightSensorValue = 0;

// Moisture sensor
const int moistureSensorPin = A3;
int moistureSensorValue = 0;
int moistureSensorPower = 3; // On the 3rd digital pin

void setup() {
  // Initializing serial monitor
  Serial.begin(9600);
  while (!Serial) {
    ; // Wait for the serial port to connect (needed for native USB port only)
  }
  pinMode(ledRed, OUTPUT);
  pinMode(ledGreen, OUTPUT);
  pinMode(ledBlue, OUTPUT);
  pinMode(moistureSensorPower, OUTPUT);
  digitalWrite(moistureSensorPower, LOW);
  
  Serial.println("Hello...");

  // Connect to Wi-Fi
  WiFi.begin(ssid, pass);
  digitalWrite(ledBlue, HIGH);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    digitalWrite(ledBlue, LOW);
    delay(1000);
    digitalWrite(ledBlue, HIGH);
    Serial.println("Connecting to WiFi...");
    WiFi.begin(ssid, pass);
  }
  Serial.println("Connected to WiFi");
  delay(2000);


  digitalWrite(ledBlue, HIGH);
}

void loop() {
  Serial.print("\n");
  Serial.print("Temperature");
  temperatureSensorValue = readTemperatureSensor();
  Serial.println(temperatureSensorValue);

  Serial.print("\n");
  Serial.print("Light = ");
  lightSensorValue = readLightSensor();
  Serial.println(lightSensorValue);

  Serial.print("\n");
  Serial.print("Soil Moisture = ");
  moistureSensorValue = readMoistureSensor();
  Serial.println(moistureSensorValue);

  Serial.print("\n\n");

  // Create the payload in application/x-www-form-urlencoded format
  String payload = "humidity=" + String(moistureSensorValue);
  payload += "&temperature=" + String(temperatureSensorValue);
  payload += "&luminosity=" + String(lightSensorValue);
  payload += "&id_plant=" + String(idplant);
  
  Serial.println(payload);
  
  Serial.print("\n\n");

  if (sendPostRequest(payload)) {
    Serial.println("POST request sent successfully");
  } else {
    Serial.println("Failed to send POST request");
  }

  delay(10000); // Take a reading every 15 seconds
}

bool sendPostRequest(String payload) {
  if (WiFi.status() == WL_CONNECTED) {
    // Send POST request
    client.beginRequest();
    client.post(SECRET_ENDPOINT);
    client.sendHeader("Authorization", "Basic secret");
    client.sendHeader("Content-Type", "application/x-www-form-urlencoded");
    client.sendHeader("Content-Length", payload.length());
    client.beginBody();
    client.print(payload);
    client.endRequest();

    // Read and print the HTTP response
    int statusCode = client.responseStatusCode();
    String response = client.responseBody();

    Serial.print("HTTP Response Code: ");
    Serial.println(statusCode);
    Serial.print("Response Body: ");
    Serial.println(response);

    return true;
  } else {
    Serial.println("WiFi not connected");
    WiFi.begin(ssid, pass);
    return false;
  }
}

float readTemperatureSensor() {
  int valueReaded = analogRead(temperatureSensorPin);
  float voltage = valueReaded * 3.3;
  voltage /= 1024.0;
  /* temperature in Celsius */
  float temperatureC = (voltage - 0.5) * 100;
  return temperatureC;
}

int readLightSensor() {
  return analogRead(lightSensorPin);
}

int readMoistureSensor() {
  digitalWrite(moistureSensorPower, HIGH);
  delay(10);
  float val = analogRead(moistureSensorPin);
  digitalWrite(moistureSensorPower, LOW);
  return val;
  // note: val under 250 or above 400 means dry or too much wet
}
