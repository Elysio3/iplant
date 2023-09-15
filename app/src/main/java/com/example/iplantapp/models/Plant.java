package com.example.iplantapp.models;

public class Plant {
    private int id;
    private String name;
    private final int id_location;

    public Plant(int id, String name, int id_location) {
        this.id = id;
        this.name = name;
        this.id_location = id_location;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }
}
