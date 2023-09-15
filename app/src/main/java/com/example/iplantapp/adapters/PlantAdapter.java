package com.example.iplantapp.adapters;

import androidx.recyclerview.widget.RecyclerView;
import java.util.List;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import androidx.annotation.NonNull;

import com.example.iplantapp.R;
import com.example.iplantapp.models.Plant;
import com.example.iplantapp.viewholder.PlantViewHolder;
public class PlantAdapter extends RecyclerView.Adapter<PlantViewHolder> {
    private List<Plant> plants = null;

    public PlantAdapter(List<Plant> Plants) {
        if(Plants != null) {
            this.plants = Plants;
        }
    }

    @NonNull
    @Override
    public PlantViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View view = inflater.inflate(R.layout.plant_layout, parent, false);
        return new PlantViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull PlantViewHolder holder, int position) {
        Plant plant = plants.get(position);
        holder.afficher(plant);
    }

    @Override
    public int getItemCount() {
        if(plants != null)
            return plants.size();
        return 0;
    }
}
