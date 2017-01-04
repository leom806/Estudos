package Aprendizado.FormasGeometricas;

public class Triangulo extends Forma{
    public Triangulo() {
        this(1, 1, 1);
    }
    
    @SuppressWarnings("OverridableMethodCallInConstructor")
    public Triangulo(int l1, int l2, int l3) {
        super(3);
        novaDimensao(l1, 0);
        novaDimensao(l2, 1);
        novaDimensao(l3, 2);
    }
    
    // Formula de Herao pra calcular area de triangulo
    @Override
    public double area() {
        double p = (getDimensao(0)+getDimensao(1)+getDimensao(2))/2;
        double aux = (p-getDimensao(0))*(p-getDimensao(1))*(p-getDimensao(2));
        return Math.sqrt(p*aux);
    }
}
