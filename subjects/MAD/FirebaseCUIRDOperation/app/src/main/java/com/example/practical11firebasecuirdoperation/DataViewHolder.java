package com.example.practical11firebasecuirdoperation;

import android.view.View;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

public class DataViewHolder extends RecyclerView.ViewHolder {

    TextView textViewa, textViewb, textViewc, textViewd;
    View view;
    public DataViewHolder(@NonNull View itemView){
        super(itemView);

        view = itemView;
        itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                
            }
        });
}
