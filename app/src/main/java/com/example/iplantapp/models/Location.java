package com.example.iplantapp.models;

public class Location {
    private int id;
    private String name;
    private int id_user;

    public Location(int id, String name, int id_user) {
        this.id = id;
        this.name = name;
        this.id_user = id_user;
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

    public int getId_user() {
        return id_user;
    }

    public void setId_user(int id_user) {
        this.id_user = id_user;
    }
}
