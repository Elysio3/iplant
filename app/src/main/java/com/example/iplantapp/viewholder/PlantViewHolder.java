package com.example.iplantapp.viewholder;

import android.content.Intent;
import android.view.View;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.iplantapp.R;
import com.example.iplantapp.RecordActivity;
import com.example.iplantapp.models.Plant;
import com.example.iplantapp.models.Record;

public class PlantViewHolder extends RecyclerView.ViewHolder {
    private final TextView id;
    private final TextView name;
    private Plant plant;

    public PlantViewHolder(final View itemView) {
        super(itemView);
        id = itemView.findViewById(R.id.id);
        name = itemView.findViewById(R.id.name);

        itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(itemView.getContext(), RecordActivity.class);
                intent.putExtra("id_plant", plant.getId());
                itemView.getContext().startActivity(intent);
            }
        });


    }
    public void afficher(Plant plant) {
        this.plant = plant;
        id.setText(String.valueOf(plant.getId()));
        name.setText(plant.getName());
    }
}
