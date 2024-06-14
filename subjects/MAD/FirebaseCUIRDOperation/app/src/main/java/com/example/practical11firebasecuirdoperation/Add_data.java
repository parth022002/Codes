package com.example.practical11firebasecuirdoperation;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.ktx.Firebase;

import java.util.HashMap;

public class Add_data extends AppCompatActivity {

    private EditText nameEditText;
    private EditText enrollmentEditText;
    private EditText departmentEditText;
    private EditText classEditText;
    private Button saveButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_data);

        //bind views
        nameEditText = (EditText) findViewById(R.id.editTextText5);
        enrollmentEditText = (EditText) findViewById(R.id.editTextText);
        departmentEditText = (EditText) findViewById(R.id.editTextText6);
        classEditText = (EditText) findViewById((R.id.editTextText7));
        saveButton = (Button) findViewById(R.id.button);

        //listener
        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //get text
                String name = nameEditText.getText().toString();
                String enrollment = enrollmentEditText.getText().toString();
                String department = departmentEditText.getText().toString();
                String classes = classEditText.getText().toString();

                // check if empty
                if (name.isEmpty()){
                    nameEditText.setError("Cannot be empty");
                    return;
                }
                if (enrollment.isEmpty()){
                    enrollmentEditText.setError("Cannot be empty");
                    return;
                }
                if (department.isEmpty()){
                    departmentEditText.setError("Cannot be empty");
                    return;
                }
                if (classes.isEmpty()){
                    classEditText.setError("Cannot be empty");
                    return;
                }
                //add to database
                adddataToDB(name,enrollment,department,classes);
            }
        });


    }

    private void adddataToDB(String name, String enrollment, String department, String classes) {
        //create hashmap
        HashMap<String, Object> dataHashmap = new HashMap<>();
        dataHashmap.put("name",name);
        dataHashmap.put("enrollment",enrollment);
        dataHashmap.put("department",department);
        dataHashmap.put("classes",classes);

        //instantiate database connection
        // Write a message to the database
        FirebaseDatabase database = FirebaseDatabase.getInstance();
        DatabaseReference dataRef = database.getReference("data");

        String key = dataRef.push().getKey();
        dataHashmap.put("key",key);
        dataRef.child(key).setValue(dataHashmap).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {
                Toast.makeText(Add_data.this, "Saved", Toast.LENGTH_SHORT).show();
                nameEditText.getText().clear();
                enrollmentEditText.getText().clear();
                departmentEditText.getText().clear();
                classEditText.getText().clear();
            }
        });
    }
}