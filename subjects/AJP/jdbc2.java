import java.sql.*;
public class jdbc2{

public static void main(String args[])
{
    try{
        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection c=DriverManager.getConnection("jdbc:mysql://localhost:3306/testdb","root","");

        Statement st=c.createStatement();
        Statement st1=c.createStatement();

        String query="CREATE TABLE 'testdb'.'student' ('rollno' INT NOT NULL , 'fname' VARCHAR(45) NOT NULL , 'div' VARCHAR(45) NOT NULL)";
        int i=st.executeUpdate(query);
        
        if(i==0)
            System.out.println("Student Table Created.");
        else
        System.out.println("Student Table is NOT Created.");

        String query1="insert into student Values(1,'aaaa','EC2',CE)";
        int j=st.executeUpdate(query1);
        if(j==1)
            System.out.println("Record Inserted");
        else
            System.out.println("Record not Inserted");
        st.close();
        st1.close();
        c.close();      
    }catch(Exception e)
    {
        e.printStackTrace();
    }
}

}