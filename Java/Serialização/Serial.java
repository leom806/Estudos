
import java.io.IOException;
import java.io.InputStream;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.OutputStream;
import java.io.Serializable;


public class Serial <T extends Serializable> {

    private final ObjectOutputStream oos;
    private final ObjectInputStream ois;
    
    public Serial(OutputStream out, InputStream in) throws IOException{
        oos = new ObjectOutputStream(out);  
        ois = new ObjectInputStream(in);  
    }
    
    public Serial(OutputStream out) throws IOException{
        oos = new ObjectOutputStream(out); 
        ois = null;
    }
    
    public Serial(InputStream in) throws IOException{
        oos = null;
        ois = new ObjectInputStream(in);  
    }
    
    public void write(T obj) throws IOException{
        oos.writeObject(obj);
    }
    
    public Object read() throws IOException, ClassNotFoundException{
        return ois.readObject();        
    }
    
    public void close(){
        try {
            if(oos != null)
                oos.close();
            if(ois!=null)
                ois.close();
        } catch (IOException ex) {
            throw new RuntimeException("Impossível fechar a(s) stream(s).");
        }
    }
}
