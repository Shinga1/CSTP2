 import java.sql.Connection;
 import java.sql.Driver;
 import java.sql.DriverManager;
 import java.sql.Statement;

 public class JDBC{
     public static void main(String[] args){
         String url="jdbc:mysql://localhost:3306/celessentials";
         String username="root";
         String password="";
         try {
             class.forname("com.mysql.celessentials.jdbc.Drive")
             Connection connection = DriverManager.getConnection(url,username,password);

             Statement statement=connection.createStatement();

             ResultSet resultSet = statement.executQuery(sql)

         } catch (Exception e){
             System.out.println(e);
         }
     }
 }
