package com.example.practical11firebasecuirdoperation;

public class Data {
    private String key, name, enrollment, department, classes;

    public Data(String key, String name, String enrollment, String department, String classes) {
        this.key = key;
        this.name = name;
        this.enrollment = enrollment;
        this.department = department;
        this.classes = classes;
    }
//import dats from firebase in realtime
    public Data(String key) {
        this.key = key;
    }

    public String getKey() {
        return key;
    }

    public void setKey(String key) {
        this.key = key;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getEnrollment() {
        return enrollment;
    }

    public void setEnrollment(String enrollment) {
        this.enrollment = enrollment;
    }

    public String getDepartment() {
        return department;
    }

    public void setDepartment(String department) {
        this.department = department;
    }

    public String getClasses() {
        return classes;
    }

    public void setClasses(String classes) {
        this.classes = classes;
    }
}
