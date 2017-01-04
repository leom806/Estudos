package Aprendizado.ListenersPesonalizados;

import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import javax.swing.JButton;
import javax.swing.JFrame;
import static javax.swing.JFrame.EXIT_ON_CLOSE;
import javax.swing.JOptionPane;


public class JanelaComActionListenerCustomizado extends JFrame{
    
    JButton btn = new JButton("Usando Método");
    JButton btn2 = new JButton("Usando Lambda");
    
    @SuppressWarnings("OverridableMethodCallInConstructor")
    public JanelaComActionListenerCustomizado() {
        super("Listener Personalizado");
         
        /*
        *   Implementação de método para Eventos 
        */
        
        // Instância da interface funcional
        Listener lt = this::btnAction; // Método passado por referência
        // Função passada por lambda
        Listener lt2 = (e) -> JOptionPane.showMessageDialog(null, "Uso de Lambda na interface funcional");
        
        this.setLayout(new GridLayout(2,1,5,5));
        
        this.add(btn);
        this.btn.addActionListener( e -> lt.perform(e) ); 
        this.add(btn2);
        this.btn2.addActionListener( e -> lt2.perform(e) );
        
        this.setSize(280,140);
        this.setLocationRelativeTo(null);
        this.setResizable(false);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
        this.setVisible(true);
    }
    
    public void btnAction(ActionEvent e) {
        JOptionPane.showMessageDialog(null, "Uso de método por referência na interface funcional");
    }
    
    @SuppressWarnings("ResultOfObjectAllocationIgnored")
    public static void main(String[] args) {
        new JanelaComActionListenerCustomizado();
    }
}
