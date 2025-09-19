# Master MSDD - IPlant IoT System

**Période**: 2023  
**Niveau**: Master MSDD - Manager de Solutions Digitales et Data  
**Type**: Système IoT de gestion de plantes avec capteurs Arduino et application Android

## 📋 Description du Projet

IPlant est un système IoT complet de monitoring et gestion de plantes développé dans le cadre du Master MSDD. Le système utilise des capteurs Arduino pour collecter des données environnementales et une application Android pour le monitoring à distance.

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

## 📁 Structure du Projet

```
iplant/
├── arduino/            # Code Arduino pour capteurs
├── backend/            # API Java Spring Boot
├── mobile/             # Application Android
├── dashboard/          # Interface web React
├── database/           # Scripts et migrations
├── cloud/              # Configuration AWS IoT
├── docs/               # Documentation technique
└── README.md           # Documentation
```

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

## 🎓 Contexte Éducatif

Ce projet du Master MSDD démontre la maîtrise des technologies IoT modernes et de l'intégration de systèmes complexes.

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

## 📸 Captures d'écran

*[À ajouter: captures d'écran du système]*

## 🔗 Liens

- **Repository**: https://github.com/Elysio3/iplant
- **Portfolio**: [Lien vers le portfolio principal]

---

**Développé par**: Maël KERVICHE  
**École**: ORT Toulouse-Colomiers  
**Année**: 2023