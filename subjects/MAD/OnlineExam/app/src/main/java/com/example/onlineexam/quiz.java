package com.example.onlineexam;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.Button;
import android.widget.TextView;

public class quiz extends AppCompatActivity implements View.OnClickListener{

    TextView totalquestion;
    TextView question;
    Button submit;
    Button optA,optB,optC,optD;

    int score=0;
    int totalque=Question_answer.que.length;
    int currqueindex=0;
    String selectedans="";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getSupportActionBar().hide();
        setContentView(R.layout.activity_quiz);

        totalquestion=findViewById(R.id.totalquestion);
        question=findViewById(R.id.question);
        optA=findViewById(R.id.optA);
        optB=findViewById(R.id.optB);
        optC=findViewById(R.id.optC);
        optD=findViewById(R.id.optD);
        submit=findViewById(R.id.submit_btn);

        optA.setOnClickListener(this);
        optB.setOnClickListener(this);
        optC.setOnClickListener(this);
        optD.setOnClickListener(this);
        submit.setOnClickListener(this);

        totalquestion.setText("Total Questions: "+totalque);

        loadnewquestions();
    }

    @SuppressLint("ResourceAsColor")
    @Override
    public void onClick(View v) {
        optA.setBackgroundColor(android.R.color.white);
        optB.setBackgroundColor(android.R.color.white);
        optC.setBackgroundColor(android.R.color.white);
        optD.setBackgroundColor(android.R.color.white);

        Button clickedbtn=(Button) v;
        if(clickedbtn.getId()==R.id.submit_btn){
            if(selectedans.equals(Question_answer.ans[currqueindex])){
                score++;

            }

            currqueindex++;
            loadnewquestions();




        }else {
            selectedans=clickedbtn.getText().toString();
            clickedbtn.setBackground(getResources().getDrawable(R.color.teal_200));
        }


    }

    void loadnewquestions(){

        if(currqueindex==totalque){
            finishquiz();
            return;
        }

        question.setText(Question_answer.que[currqueindex]);
        optA.setText(Question_answer.opt[currqueindex][0]);
        optB.setText(Question_answer.opt[currqueindex][1]);
        optC.setText(Question_answer.opt[currqueindex][2]);
        optD.setText(Question_answer.opt[currqueindex][3]);
    }

    void finishquiz(){
        String pass="";
        if(score>0){
            pass="PASS";
        }else{
            pass="FAIL";
        }
        new AlertDialog.Builder(this)
                .setTitle(pass)
                .setMessage("score is :"+score+" "+pass)
                .setPositiveButton("RESTART",(dialogInterface,i)->restartquiz())
//                .setPositiveButton("finishExam",(dialogInterface,i)->finishExam())
                .setCancelable(false)
                .show();

    }
    void restartquiz(){
        score=0;
        currqueindex=0;
        loadnewquestions();
    }
//    void finishExam(){
//        Intent intent=new Intent(getApplicationContext(), userdashboard.class);
//        startActivity(intent);
//    }

}