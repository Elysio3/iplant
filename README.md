# IPlant
![Logo](https://cdn.discordapp.com/attachments/1040167723080097832/1148550013237080096/ORT-SABRI-MAEL-LOGO-01.png)


# Faciliter la vie des Professionnels 👋

IPlant est un projet d'études réalisé en groupe. Il définit la conception d'un système permettant aux Professionnels de gérer à distance et aisément leurs espaces vert.

Notre solution se base sur la puissance d'une conception Arduino munie de capteurs et dialoguant avec une base de données. L'utilisateur a la possibilité d'accéder à ces données depuis une application Android.

## Documentation

[Documentation](https://github.com/Elysio3/iplant/tree/Documentation)

[Arduino Nano](https://github.com/Elysio3/iplant/tree/Documentation/arduino)

[Android](https://github.com/Elysio3/iplant/tree/Documentation/android)

[API REST & BDD](https://github.com/Elysio3/iplant/tree/Documentation/API%20%26%20BDD)

---

## 📋 Informations Projet

**Période**: 2023  
**Niveau**: Master MSDD - Manager de Solutions Digitales et Data  
**Type**: Système IoT de gestion de plantes avec capteurs Arduino et application Android

## 🛠️ Technologies Utilisées

- **IoT**: Arduino Uno/Nano, capteurs (humidité, température, lumière)
- **Communication**: WiFi, Bluetooth, LoRa
- **Backend**: Java Spring Boot, Python Flask
- **Mobile**: Android (Java/Kotlin)
- **Base de données**: MySQL, InfluxDB (time-series)
- **Cloud**: AWS IoT Core, MQTT
- **Visualisation**: Grafana, React Dashboard

## 🎯 Fonctionnalités

- **Monitoring en temps réel** des conditions environnementales
- **Capteurs multiples** (humidité sol, température air, luminosité)
- **Application Android** avec notifications push
- **Dashboard web** avec graphiques temps réel
- **Alertes automatiques** (arrosage, température)
- **Historique des données** et analytics
- **Contrôle à distance** des systèmes d'arrosage
- **Machine Learning** pour prédiction des besoins

## 🚀 Installation et Utilisation

1. **Cloner le repository**:
   ```bash
   git clone https://github.com/Elysio3/iplant.git
   ```

2. **Configuration Arduino**:
   ```cpp
   // Upload du code sur Arduino
   // Configuration WiFi dans config.h
   #define WIFI_SSID "your_wifi"
   #define WIFI_PASSWORD "your_password"
   ```

3. **Configuration Backend**:
   ```bash
   cd backend
   mvn clean install
   java -jar target/iplant-backend.jar
   ```

4. **Configuration Mobile**:
   ```bash
   cd mobile
   ./gradlew assembleDebug
   # Installer l'APK sur Android
   ```

## 📊 Compétences Développées

- Développement IoT avec Arduino
- Architecture de systèmes distribués
- Développement mobile Android
- Gestion de données temps réel
- Intégration cloud (AWS IoT)
- Machine Learning et analytics
- Gestion de projets complexes
- Architecture microservices

## 🏗️ Architecture IoT

- **Capteurs Arduino** → **Gateway** → **Cloud** → **Applications**
- **MQTT** pour la communication IoT
- **Time-series database** pour les données capteurs
- **Microservices** pour la scalabilité
- **Event-driven** architecture

## 🔒 Sécurité IoT

- **Chiffrement** des communications MQTT
- **Authentification** des devices IoT
- **Certificats** SSL/TLS
- **Protection** contre les attaques IoT
- **Audit** des accès et données

---

**Développé par**: Maël KERVICHE (équipe projet)  
**École**: ORT Toulouse-Colomiers  
**Année**: 2023