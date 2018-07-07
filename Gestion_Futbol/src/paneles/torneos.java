/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package paneles;

import Conexion.Conexion;
import java.awt.Dimension;

import java.awt.HeadlessException;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.UIManager;
import javax.swing.table.DefaultTableModel;
import java.awt.event.KeyEvent;
import java.awt.event.ActionListener;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import javax.swing.JComponent;
import javax.swing.JOptionPane;
import javax.swing.Timer;
/**
 *
 * @author Virus1020
 */
public final class torneos extends javax.swing.JPanel {

    DefaultTableModel modelo;
    PreparedStatement pst;
    Statement sta;
    ResultSet rst;
    Character s;
     public static String nombre_liga="";
    public torneos() {
        initComponents();
           cargar("");
           btn_ver.setVisible(false);
          
       
    }

   void cargar(String valor)
    {
        //CARGAR DATOS DESDE LA BASE DE DATOS
        String [] titulos={"Num.","Torneo","Creado"};
        String [] registros= new String[3];
        
        String sql = "select * from torneo ";
        
        modelo = new DefaultTableModel(null, titulos);
       
        
        try {
            Statement sta = cn.createStatement();
            ResultSet rst = sta.executeQuery(sql);
            
            while (rst.next()) {
                registros[0]=rst.getString("id_tor");
                registros[1]=rst.getString("nom_tor");
                registros[2]=rst.getString("f_inicio");
                modelo.addRow(registros);
            }
            
            tbl_datos.setModel(modelo);
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, ex);
        }
        
    } 
   void pnlEquipos(){
       
        
        int filaseleccionada;

     try{     
         filaseleccionada= tbl_datos.getSelectedRow();
         
         if (filaseleccionada==-1){
         
              JOptionPane.showMessageDialog(null,  "Debe seleccionar una fila de la tabla" );
         }else{

             DefaultTableModel modelotabla=(DefaultTableModel) tbl_datos.getModel();
             String id=(String)modelotabla.getValueAt(filaseleccionada, 0);
             String nombre=(String)modelotabla.getValueAt(filaseleccionada, 1);
             String fecha=(String) modelotabla.getValueAt(filaseleccionada, 2);
              nombre_liga=nombre;
             lbl_id_torneo.setText(id);
             btn_ver.setVisible(true);
             btn_ver.setText("Ver: " + " "+ nombre);
             equipos equ =new equipos();
             //equ.setVisible(true);
             this.setVisible(false);
            
            
          }

       }catch (HeadlessException ex){

             JOptionPane.showMessageDialog(null, "Error: "+ex+"\nInténtelo nuevamente", " .::Error En la Operacion::." ,JOptionPane.ERROR_MESSAGE);

       }
   }
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel7 = new javax.swing.JLabel();
        jPanel2 = new javax.swing.JPanel();
        btn_nuevo = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        tbl_datos = new rojerusan.RSTableMetro();
        lbl_id_torneo = new javax.swing.JLabel();
        btn_ver = new javax.swing.JButton();

        setBackground(new java.awt.Color(255, 255, 255));
        setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jPanel1.setBackground(new java.awt.Color(255, 255, 255));

        jLabel7.setBackground(new java.awt.Color(18, 8, 77));
        jLabel7.setFont(new java.awt.Font("Segoe UI Light", 0, 36)); // NOI18N
        jLabel7.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel7.setIcon(new javax.swing.ImageIcon(getClass().getResource("/img/copa6464.png"))); // NOI18N
        jLabel7.setText("Torneos");

        jPanel2.setBackground(new java.awt.Color(18, 8, 77));
        jPanel2.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        btn_nuevo.setBackground(new java.awt.Color(18, 8, 77));
        btn_nuevo.setFont(new java.awt.Font("Segoe UI Light", 1, 11)); // NOI18N
        btn_nuevo.setForeground(new java.awt.Color(255, 255, 255));
        btn_nuevo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/img/agregar.png"))); // NOI18N
        btn_nuevo.setText("Nuevo Torneo");
        btn_nuevo.setBorder(null);
        jPanel2.add(btn_nuevo, new org.netbeans.lib.awtextra.AbsoluteConstraints(930, 10, 130, 40));

        tbl_datos.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "Title 1", "Title 2", "Title 3", "Title 4"
            }
        ));
        tbl_datos.setColorBackgoundHead(new java.awt.Color(18, 8, 77));
        tbl_datos.setColorBordeFilas(new java.awt.Color(255, 255, 255));
        tbl_datos.setColorBordeHead(new java.awt.Color(18, 8, 77));
        tbl_datos.setColorFilasForeground1(new java.awt.Color(18, 8, 77));
        tbl_datos.setColorFilasForeground2(new java.awt.Color(18, 8, 77));
        tbl_datos.setColorSelBackgound(new java.awt.Color(18, 8, 77));
        tbl_datos.setFuenteHead(new java.awt.Font("Segoe UI Light", 1, 15)); // NOI18N
        tbl_datos.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tbl_datosMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tbl_datos);

        lbl_id_torneo.setText("id");

        btn_ver.setBackground(new java.awt.Color(18, 8, 77));
        btn_ver.setFont(new java.awt.Font("Segoe UI Light", 1, 11)); // NOI18N
        btn_ver.setForeground(new java.awt.Color(255, 255, 255));
        btn_ver.setText("Ver");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(40, 40, 40)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 1000, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(lbl_id_torneo, javax.swing.GroupLayout.PREFERRED_SIZE, 86, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(553, 553, 553))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jLabel7, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanel2, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addComponent(btn_ver, javax.swing.GroupLayout.PREFERRED_SIZE, 153, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(468, 468, 468))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel7)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, 56, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(lbl_id_torneo, javax.swing.GroupLayout.PREFERRED_SIZE, 22, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(26, 26, 26)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 231, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(btn_ver, javax.swing.GroupLayout.PREFERRED_SIZE, 44, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(48, Short.MAX_VALUE))
        );

        add(jPanel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 1100, 550));
    }// </editor-fold>//GEN-END:initComponents

    private void tbl_datosMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tbl_datosMouseClicked
       
  pnlEquipos();
         
    }//GEN-LAST:event_tbl_datosMouseClicked


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btn_nuevo;
    private javax.swing.JButton btn_ver;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JLabel lbl_id_torneo;
    private rojerusan.RSTableMetro tbl_datos;
    // End of variables declaration//GEN-END:variables
    Conexion cc = new Conexion();
    Connection cn = cc.getConectar();
}
