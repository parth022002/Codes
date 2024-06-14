package com.example.onlineexam;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

public abstract class DBhelper extends SQLiteOpenHelper {

    public String DBname="Login.db";

    public DBhelper( Context context) {
        super(context, "Login.db", null, 1);
    }


    @Override
    public void onCreate(SQLiteDatabase MYdb) {
        MYdb.execSQL("create Table users(username TEXT primary key,password TEXT)");

    }

    @Override
    public void onUpgrade(SQLiteDatabase MYdb, int oldVersion, int newVersion) {
        MYdb.execSQL("drop Table if exists users");

    }

//    public boolean insertData(String username,String password){
//        SQLiteDatabase MYdb=this.getWritableDatabase();
//        ContentValues contentValues=new ContentValues();
//        ContentValues.put("username",username);
//        ContentValues.put("password",password);
//        long result =MYdb.insert("users",null,contentValues);
//        if (result==-1) return false;
//        else
//            return true;
//    }
//    public boolean checkusername(String username){
//        SQLiteDatabase MYdb=this.getWritableDatabase();
//        Cursor cursor=MYdb.rawQuery("Select * from users Where username=? ",new String[]{username});
//        if(Cursor. getCount ()>0)
//            return true;
//        else
//            return false;
//    }
//    public  boolean checkusernamepassword(String username, String password){
//        SQLiteDatabase MYdb=this.getWritableDatabase();
//
//        Cursor cursor=MYdb.rawQuery("Select * from users Where username=? ",new String[]{username});
//
////    Cursor cursor = MYdb.rawQuery("Select*from username=?and  passwprd?"),new String[] {username , password};
//    if(Cursor . getCount( ) > 0)
//        return true;
//    else
//        return false;
//
//    }
}
