package com.example.onlineexam;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;

public class examschedule extends AppCompatActivity {

    EditText subject,str_txt,end_time;
    Button sbt_btn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_examschedule);

        subject=findViewById(R.id.subject);
    }
}