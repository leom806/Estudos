package Aprendizado.FormasGeometricas;

public final class Retangulo extends Forma{

    public Retangulo() {
        this(2, 1);
    }
    
    @SuppressWarnings("OverridableMethodCallInConstructor")
    public Retangulo(int base, int altura) {
        super(2);
        novaDimensao(base, 0);
        novaDimensao(altura, 1);
    }
    
    public int perimetro() {
        return 2*(getDimensao(0)+getDimensao(1));
    }
    
    @Override
    public double area() {
        return getDimensao(0)*getDimensao(1);
    }
    
}
