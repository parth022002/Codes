package com.example.onlineexam;

import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

public class Login extends AppCompatActivity {

    EditText username;
    EditText password;
    Button loginButton;

    DBhelper db;

    public static String users[]={
            "user1",
            "user2",
            "user3"


    };

    String[] permissions={"android.permission.CAMERA",
            "android.permission.ACCESS_NOTIFICATION_POLICY",
            "android.permission.CALL_PHONE",
            "android.permission.BIND_SCREENING_SERVICE",
            "android.permission.READ_EXTERNAL_STORAGE"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getSupportActionBar().hide();
        setContentView(R.layout.activity_login);

        loginButton=findViewById(R.id.loginButton);
        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                requestPermissions(permissions ,80);
            }
        });

    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode==80)
        {
            if (grantResults[0]== PackageManager.PERMISSION_GRANTED)
            {
                Toast.makeText(this,"Login Successfully",Toast.LENGTH_SHORT).show();
            } else {
                Toast.makeText(this,"Login Failed",Toast.LENGTH_SHORT).show();
            }
        }

        username =(EditText) findViewById(R.id.username);
        password =(EditText) findViewById(R.id.password);
        loginButton=(Button) findViewById(R.id.loginButton);
        db=new DBhelper(this){};

        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String user = username.getText().toString();
                String pass = password.getText().toString();

                if (user.equals("admin")&&pass.equals("admin")){

                    Intent intent=new Intent(getApplicationContext(), admindashboard.class);
                    startActivity(intent);

            }

                if (user.equals("user1")&&pass.equals("user1")){

                    Intent intent=new Intent(getApplicationContext(), userdashboard.class);
                    startActivity(intent);

                }

                if (user.equals("user2")&&pass.equals("user2")){

                    Intent intent=new Intent(getApplicationContext(), userdashboard.class);
                    startActivity(intent);

                }

                if (user.equals("user3")&&pass.equals("user3")){

                    Intent intent=new Intent(getApplicationContext(), userdashboard.class);
                    startActivity(intent);

                }else Toast.makeText(Login.this,"Invalid Credentials ",Toast.LENGTH_SHORT);
            }
        });

    }
}