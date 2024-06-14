package com.example.onlineexam;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.ImageButton;

public class userdashboard extends AppCompatActivity {

    ImageButton notices;
    ImageButton examshedule;
    ImageButton startexam;
    ImageButton feedback,chatbox;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getSupportActionBar().hide();
        setContentView(R.layout.activity_userdashboard);

        notices=findViewById(R.id.imageButton);
        examshedule=findViewById(R.id.imageButton3);
        startexam=findViewById(R.id.imageButton4);
        feedback=findViewById(R.id.imageButton6);
        chatbox=findViewById(R.id.imageButton8);

        notices.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), Notices.class);
                startActivity(intent);
            }
        });

        startexam.setOnClickListener((new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), quiz.class);
                startActivity(intent);
            }
        }));

        feedback.setOnClickListener((new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), feedback.class);
                startActivity(intent);
            }
        }));



    }
}