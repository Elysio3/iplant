package com.example.iplantapp;

import android.util.Log;

import com.example.iplantapp.models.Location;
import com.example.iplantapp.models.Plant;
import com.example.iplantapp.models.Record;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;
import java.util.List;
import java.util.concurrent.atomic.AtomicReference;

import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class API {

    private final String ALYSIA = "ALYSIA";
    private final String URL = "secret";
    private final String API_KEY = "secret";
    private String jsonResponseString;


    public API() {
    }

    public AtomicReference<String> getDataFromAPI(String table, int id) {

        Log.i(ALYSIA, "Trying to connect to API now...");

        AtomicReference<String> jsonResponseString = new AtomicReference<>("{}");

        String url = URL + table;
        if (id != 0) {
            url += "&id=" + id;
        }

        String finalUrl = url;

        Runnable myRunnable = () -> {
            OkHttpClient client = new OkHttpClient();
            Request request = new Request.Builder().url(finalUrl).addHeader("Authorization", API_KEY).get().build();
            Response response = null;

            Log.i(ALYSIA, request.url().toString());

            try {
                response = client.newCall(request).execute();
                jsonResponseString.set(response.body().string());
            } catch (Exception e) {
                e.printStackTrace();
            }
        };

        Thread t = (new Thread(myRunnable));
        t.start();
        try {
            t.join();
        } catch (InterruptedException e) {
            e.printStackTrace();
            return null;
        }

        return jsonResponseString;

    }

    public boolean postDataFromAPI(String table, String postData) {

        Log.i(ALYSIA, "Trying to connect to API now...");
        String finalUrl = URL + table;

        RequestBody requestBody = RequestBody.create(MediaType.parse("application/x-www-form-urlencoded"), postData);

        Runnable myRunnable = () -> {
            OkHttpClient client = new OkHttpClient();
            Request request = new Request.Builder().url(finalUrl).addHeader("Authorization", API_KEY).post(requestBody).build();

            Log.i(ALYSIA, request.url().toString());

            try {
                client.newCall(request).execute();
            } catch (Exception e) {
                e.printStackTrace();
            }
        };

        Thread t = (new Thread(myRunnable));
        t.start();
        try {
            t.join();
            return true;
        } catch (InterruptedException e) {
            e.printStackTrace();
            return false;
        }

    }

    public boolean putDataFromAPI(String table, String postData) {

        Log.i(ALYSIA, "Trying to connect to API now...");
        String finalUrl = URL + table;

        RequestBody requestBody = RequestBody.create(MediaType.parse("application/x-www-form-urlencoded"), postData);

        Runnable myRunnable = () -> {
            OkHttpClient client = new OkHttpClient();

            Request request = new Request.Builder().url(finalUrl).addHeader("Authorization", API_KEY).put(requestBody).build();
            Response response = null;

            Log.i(ALYSIA, request.url().toString());

            try {
                client.newCall(request).execute();
            } catch (Exception e) {
                e.printStackTrace();
            }
        };

        Thread t = (new Thread(myRunnable));
        t.start();
        try {
            t.join();
            return true;
        } catch (InterruptedException e) {
            e.printStackTrace();
            return false;
        }

    }

    public boolean deleteDataFromAPI(String table, int id) {

        Log.i(ALYSIA, "Trying to connect to API now...");
        String url = URL + table;
        if (id != 0) {
            url += "&id=" + id;
        }
        String finalUrl = url;

        Runnable myRunnable = () -> {
            OkHttpClient client = new OkHttpClient();
            Request request = new Request.Builder().url(finalUrl).addHeader("Authorization", API_KEY).delete().build();
            Response response = null;

            Log.i(ALYSIA, request.url().toString());

            try {
                client.newCall(request).execute();
            } catch (Exception e) {
                e.printStackTrace();
            }
        };

        Thread t = (new Thread(myRunnable));
        t.start();
        try {
            t.join();
            return true;
        } catch (InterruptedException e) {
            e.printStackTrace();
            return false;
        }
    }


    public List<Location> getLocation() {
        Gson gson = new Gson();
        Type listType = new TypeToken<List<Location>>() {
        }.getType();
        AtomicReference<String> json = this.getDataFromAPI("Location", 0);
        List<Location> locationList = gson.fromJson(json.get(), listType);

        return locationList;
    }

    public List<Plant> getPlant() {
        Gson gson = new Gson();
        Type listType = new TypeToken<List<Plant>>() {
        }.getType();
        AtomicReference<String> json = this.getDataFromAPI("Plant", 0);
        List<Plant> plantList = gson.fromJson(json.get(), listType);

        return plantList;
    }

    public List<Record> getRecord(int id_plant) {
        Gson gson = new Gson();
        Type listType = new TypeToken<List<Record>>() {
        }.getType();
        AtomicReference<String> json = this.getDataFromAPI("Record", id_plant);
        List<Record> recordList = gson.fromJson(json.get(), listType);

        return recordList;
    }


}
