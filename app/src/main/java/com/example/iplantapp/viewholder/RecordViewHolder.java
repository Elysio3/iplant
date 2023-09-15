package com.example.iplantapp.viewholder;

import android.view.View;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.iplantapp.R;
import com.example.iplantapp.models.Record;

public class RecordViewHolder extends RecyclerView.ViewHolder {
    private final TextView id;
    private final TextView id_plant;
    private final TextView date;
    private final TextView temperature;
    private final TextView humidity;
    private final TextView luminosity;
    private Record record;

    public RecordViewHolder(final View itemView) {
        super(itemView);
        id = itemView.findViewById(R.id.id);
        id_plant = itemView.findViewById(R.id.id_plant);
        date = itemView.findViewById(R.id.date);
        temperature = itemView.findViewById(R.id.temperature);
        humidity = itemView.findViewById(R.id.humidity);
        luminosity = itemView.findViewById(R.id.luminosity);
    }
    public void afficher(Record record) {
        this.record = record;
        id.setText("id : " + record.getId());
        id_plant.setText("plant : " + record.getId_plant());
        date.setText("date : " + record.getDate());
        temperature.setText("temperature : " + record.getTemperature() + "°C");
        humidity.setText("humidité : " + record.getHumidity() + " H");
        luminosity.setText("luminosité : " + record.getLuminosity() + " L");
    }
}
