package Aprendizado.FormasGeometricas;

// Importando todas as classes não há queda de desempenho e, neste caso, não há conflito de classes.
import static java.lang.Math.*;

public final class Circulo extends Forma{
    
    public Circulo() {
        this(1);
    }
    
    @SuppressWarnings("OverridableMethodCallInConstructor")
    public Circulo(int raio) {
        this.setRaio(raio);
        this.setDimensoes(1);
    }
    
    public void setRaio(int raio) {
        if (raio < 0) 
            throw new RuntimeException("Dimensao invalida");
        this.novaDimensao(raio, 0);
    }
    
    public int getRaio() {
        return this.getDimensao(0);
    }
    
    @Override
    public double area() {
        return 3 * PI * this.getDimensao(0);  // Uso de constante por import estático
    }
    
}
