package com.example.iplantapp.models;

public class Record {
    private int id;
    private String date;
    private int id_plant;
    private int temperature;
    private int humidity;
    private int luminosity;

    public Record(int id, String date, int id_plant, int temperature, int humidity, int luminosity) {
        this.id = id;
        this.date = date;
        this.id_plant = id_plant;
        this.temperature = temperature;
        this.humidity = humidity;
        this.luminosity = luminosity;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public int getId_plant() {
        return id_plant;
    }

    public void setId_plant(int id_plant) {
        this.id_plant = id_plant;
    }

    public int getTemperature() {
        return temperature;
    }

    public void setTemperature(int temperature) {
        this.temperature = temperature;
    }

    public int getHumidity() {
        return humidity;
    }

    public void setHumidity(int humidity) {
        this.humidity = humidity;
    }

    public int getLuminosity() {
        return luminosity;
    }

    public void setLuminosity(int luminosity) {
        this.luminosity = luminosity;
    }
}
