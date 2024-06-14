package com.example.onlineexam;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.Button;

public class Studentmonitoring extends AppCompatActivity {

    Button v1,v2,v3,v4,v5;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getSupportActionBar().hide();
        setContentView(R.layout.activity_studentmonitoring);

        v1=findViewById(R.id.btn1);
        v2=findViewById(R.id.btn2);
        v3=findViewById(R.id.btn3);
        v4=findViewById(R.id.btn4);
        v5=findViewById(R.id.btn5);

        v1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), student_moniter.class);
                startActivity(intent);
            }
        });

        v2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), student_moniter.class);
                startActivity(intent);
            }
        });

        v3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), student_moniter.class);
                startActivity(intent);
            }
        });

        v4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), student_moniter.class);
                startActivity(intent);
            }
        });

        v5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), student_moniter.class);
                startActivity(intent);
            }
        });
    }
}