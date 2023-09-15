package com.example.iplantapp.ui.myplants;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.ViewModelProvider;
import androidx.recyclerview.widget.RecyclerView;

import com.example.iplantapp.MyPlantsActivity;
import com.example.iplantapp.databinding.FragmentMyplantsBinding;

public class MyPlantsFragment extends Fragment {

    private FragmentMyplantsBinding binding;
    private RecyclerView recyclerView;
    private RecyclerView.Adapter adapter;
    private RecyclerView.LayoutManager layoutManager;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        MyPlantsViewModel myplantsViewModel =
                new ViewModelProvider(this).get(MyPlantsViewModel.class);

        binding = FragmentMyplantsBinding.inflate(inflater, container, false);
        View root = binding.getRoot();

        final TextView textView = binding.textMyplants;
        myplantsViewModel.getText().observe(getViewLifecycleOwner(), textView::setText);

        Intent intent = new Intent(getActivity(), MyPlantsActivity.class);
        startActivity(intent);

        return root;
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }
}