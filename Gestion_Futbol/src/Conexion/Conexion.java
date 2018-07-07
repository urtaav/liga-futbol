package Conexion;


import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.swing.JOptionPane;

public class Conexion {
      
    
    private String nombreBd="la_liga";
    private String usuario="root";
    private String password="";
    private String url="jdbc:mysql://localhost/la_liga";
    
    
    Connection con=null;
    
    public Conexion()
    {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            
            con=DriverManager.getConnection(url, usuario, password);
            
//            if (conn!= null) {
//                JOptionPane.showMessageDialog(null, "CONEXION EXITOSA " + nombreBd);
//            }
            
        } catch (ClassNotFoundException ex) {
            JOptionPane.showMessageDialog(null,"Acceso Denegado!!");
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null,"La clase no existe");
        }
    }
    
    
    public Connection getConectar()
    {
        return con;
    }

    public void setDesconectar(Connection conex){
        try {
            if(conex!=null)
                conex.close();
                conex=null;
                JOptionPane.showMessageDialog(null,"Se cerro la base de datos correctamente");
        } catch (Exception e) {
        }
    }
}
