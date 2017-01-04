package Aprendizado.FormasGeometricas;

// Importando todas as classes não há queda de desempenho e, neste caso, não há conflito de classes.
import static java.lang.Math.*;

public final class Circulo extends Forma{
    
    public Circulo() {
        this(1);
    }
    
    @SuppressWarnings("OverridableMethodCallInConstructor")
    public Circulo(int raio) {
        super(1);
        setRaio(raio);        
    }
    
    public void setRaio(int raio) {
        if (raio < 0) 
            throw new RuntimeException("Dimensao invalida");
        novaDimensao(raio, 0);
    }
    
    public int getRaio() {
        return getDimensao(0);
    }
    
    public double circunferencia() {
        return 2 * PI * getDimensao(0);  // Uso de constante por import estático
    }
    
    @Override
    public double area() {
        return PI * Math.pow(getDimensao(0), 2);  // Uso de constante por import estático
    }
    
}
