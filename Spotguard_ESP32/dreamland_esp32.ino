//-------------------------------------------------------------- Wifi
#include <WiFi.h>
const char *WIFI_NETWORK = "2G";
const char *WIFI_PASSWORD = "delacruz21";
const int WIFI_TIMEOUT_MS = 20000;
void keepWifiAlive(void *parameters) {
  while (true) {
    if (WiFi.status() == WL_CONNECTED) {
      // Serial.println("WiFi still connected");
      vTaskDelay(pdMS_TO_TICKS(60000));  // Wait to re-check if connected every 3 seconds
      continue;
    }
    Serial.println("WiFi connecting");
    WiFi.mode(WIFI_STA);
    WiFi.begin(WIFI_NETWORK, WIFI_PASSWORD);

    unsigned long startAttemptTime = millis();
    while (WiFi.status() != WL_CONNECTED && millis() - startAttemptTime < WIFI_TIMEOUT_MS) {
      vTaskDelay(pdMS_TO_TICKS(500));  // Adjust delay for better responsiveness
    }
    if (WiFi.status() != WL_CONNECTED) {
      Serial.println("[WiFi] Connection failed");
      vTaskDelay(pdMS_TO_TICKS(30000));  // Wait to reconnect for 30 seconds
      continue;
    }
    Serial.print("[WiFi] Connected ");
    Serial.println(WiFi.localIP());
  }
}
//-------------------------------------------------------------- End Wifi


//-------------------------------------------------------------- Servo
#include <ESP32Servo.h>
Servo myservo;
int POS = 0;
const byte SERVO_PIN = 23;
int executed = false;
void initServo(void *parameters) {
  while (true) {
    getServoStatus();
    vTaskDelay(pdMS_TO_TICKS(500));
  }
}
void turnClose() {
  myservo.write(0);
}
void turnOpen() {
  myservo.write(90);
}
//-------------------------------------------------------------- End Servo

//-------------------------------------------------------------- Rest API
#include <ArduinoHttpClient.h>
const char serverAddress[] = "192.168.1.17";
const int serverPort = 8000;
WiFiClient wifi;
HttpClient client = HttpClient(wifi, serverAddress, serverPort);

#include "ArduinoJson.h"
StaticJsonDocument<300> JSONBuffer;  // Memory pool

void getServoStatus() {
  if (WiFi.status() == WL_CONNECTED) {
    String endpoint = "/api/servo";
    char endpoint_char[endpoint.length() + 1];
    endpoint.toCharArray(endpoint_char, endpoint.length() + 1);
    client.get(endpoint_char);
    int statusCode = client.responseStatusCode();
    String response = client.responseBody();

    DeserializationError error = deserializeJson(JSONBuffer, response);
    if (error) {
      Serial.println("Parsing failed");
      return;
    }
    int value = JSONBuffer["servo"];

    if (value == 0) {  //if close
      turnClose();
    } else if (value == 1) {  //if open
      turnOpen();
      vTaskDelay(pdMS_TO_TICKS(10000));
      turnClose();
      updateServoStatus(0);  //close
    }
  } else
    Serial.println("[FAILED UPDATE]: Servo. Wifi not connected");
}

void updateServoStatus(int status) {
  if (WiFi.status() == WL_CONNECTED) {
    String endpoint = "/api/servo/" + String(status);
    char endpoint_char[endpoint.length() + 1];
    endpoint.toCharArray(endpoint_char, endpoint.length() + 1);
    client.get(endpoint_char);

    int statusCode = client.responseStatusCode();
    String response = client.responseBody();
  } else
    Serial.println("[FAILED UPDATE]: Servo. Wifi not connected");
}
//-------------------------------------------------------------- End Rest API

void setup() {
  Serial.begin(9600);

  /*Wifi*/
  xTaskCreatePinnedToCore(keepWifiAlive, "Keep Wifi Connected", 2048, NULL, 1, NULL, CONFIG_ARDUINO_RUNNING_CORE);

  /*  Servo Motor  */
  ESP32PWM::allocateTimer(0);
  ESP32PWM::allocateTimer(1);
  ESP32PWM::allocateTimer(2);
  ESP32PWM::allocateTimer(3);
  myservo.setPeriodHertz(50);  // standard 50 hz servo
  myservo.attach(SERVO_PIN, 500, 2400);
  xTaskCreate(initServo, "initServo", 4096, NULL, 1, NULL);
}

void loop() {
  // put your main code here, to run repeatedly:
}
