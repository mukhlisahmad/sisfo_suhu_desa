/*
 * HTTP Client POST Request
 * Copyright (c) 2018, circuits4you.com
 * All rights reserved.
 * https://circuits4you.com
 * Connects to WiFi HotSpot. */

#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
WiFiClient client;

#include "DHT.h"
#define DHTPIN D2
#define DHTTYPE DHT11 // DHT 11
DHT dht(DHTPIN, DHTTYPE);
const char *ssid = "usr"; 
const char *password = "pw";

const char *host = "http://domain"; 

void setup()
{
    dht.begin();
    delay(1000);
    WiFi.mode(WIFI_OFF); 
    delay(1000);
    WiFi.mode(WIFI_STA); 
    Serial.begin(9600);
    WiFi.begin(ssid, password); 
    Serial.println("");

    Serial.print("Connecting");
    // Wait for connection
    while (WiFi.status() != WL_CONNECTED)
    {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.print("Connected to ");
    Serial.println(ssid);
    Serial.print("IP address: ");
    Serial.println(WiFi.localIP()); 
}
void loop()
{
    HTTPClient http; 
    String postData, pelanggan, suhu, kelembapan, link;

    float humidity = dht.readHumidity();
    float temperature = dht.readTemperature();

    suhu = String(temperature);   
    kelembapan = String(humidity);
    pelanggan = "B";

    postData = "&status1=" + suhu + "&status2=" + kelembapan + "&pelanggan=" + pelanggan;
    link = "http://panicbutton.my.id/view/suhu/konek.php";

    http.begin(client, link);                                            
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); 

    int httpCode = http.POST(postData);
    String payload = http.getString(); 

    Serial.println(httpCode); 
    Serial.println(payload); 

    http.end();

    delay(10000); 
}
//=======================================================================
