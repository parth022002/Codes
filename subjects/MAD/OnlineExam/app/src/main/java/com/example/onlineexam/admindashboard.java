package com.example.onlineexam;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.ImageButton;

public class admindashboard extends AppCompatActivity {
    ImageButton notices,stdmoniter,manageuser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getSupportActionBar().hide();
        setContentView(R.layout.activity_admindashboard);

        notices=findViewById(R.id.imageButton6);
        stdmoniter=findViewById(R.id.imageButton4);
        manageuser=findViewById(R.id.imageButton5);

        notices.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), notices_admin.class);
                startActivity(intent);
            }
        });

        stdmoniter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), Studentmonitoring.class);
                startActivity(intent);
            }
        });

        manageuser.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(), ManageUser.class);
                startActivity(intent);
            }
        });
    }
}