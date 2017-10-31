
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;


public class Main {
    
    public Main(String... arquivos){
        
        boolean ler = false;
        Serial<ArrayList> s = null;
        
        for (String arquivo : arquivos) {
            if (arquivo.equals("-r")) {                
                ler = true;
            }
        }
                        
        try {            
            for(int i=0; i<arquivos.length; i++){                                
                
                if(arquivos[i].equals("-r") || arquivos[i].equals("-w")){
                   continue;
                }
                
                FileOutputStream fos;
                FileInputStream fis;                

                if(!ler){
                    ArrayList<Dog> dogs = new ArrayList<>();
                    for(int j = 0; j<10; j++){
                        dogs.add(new Dog((j+10), 11));
                    }
                    fos = new FileOutputStream(arquivos[i]);
                    s = new Serial<>(fos);
                    
                    s.write(dogs);
                    s.close();
                }else{
                    fis = new FileInputStream(arquivos[i]);
                    s = new Serial<>(fis);
                                        
                    ArrayList<Dog> dogs = (ArrayList) s.read();
                    System.out.printf("%nArquivo %s#%s%n", arquivos[i], dogs.getClass());
                    
                    int c = 0;
                    for(Dog p : dogs){
                        System.out.printf("Dog#%02d - Nome: %s%n",(c+1),p.getNome());
                        c++;
                    }   

                    s.close();
                }
            }            
        } catch (final IOException | ClassNotFoundException ex) {
            System.out.println(ex.getMessage());
        }finally{
            //s.close();
        }
    }
    
    
    public static void main(String... args){
        try(Scanner s = new Scanner(System.in)){
            String[] tags = new String[2];
            tags[0] = s.nextLine();
            tags[1] = s.nextLine(); 
            new Main(tags);        
        }
    }
}
