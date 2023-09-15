package com.example.iplantapp.adapters;

import androidx.recyclerview.widget.RecyclerView;
import java.util.List;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import androidx.annotation.NonNull;

import com.example.iplantapp.R;
import com.example.iplantapp.models.Record;
import com.example.iplantapp.viewholder.RecordViewHolder;
public class RecordAdapter extends RecyclerView.Adapter<RecordViewHolder> {
    private List<Record> records = null;

    public RecordAdapter(List<Record> records) {
        if(records != null) {
            this.records = records;
        }
    }

    @NonNull
    @Override
    public RecordViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View view = inflater.inflate(R.layout.record_layout, parent, false);
        return new RecordViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull RecordViewHolder holder, int position) {
        Record record = records.get(position);
        holder.afficher(record);
    }

    @Override
    public int getItemCount() {
        if(records != null)
            return records.size();
        return 0;
    }
}
