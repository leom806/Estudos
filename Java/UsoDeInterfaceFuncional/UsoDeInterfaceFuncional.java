package Aprendizado.UsoDeInterfaceFuncional;

public class UsoDeInterfaceFuncional implements Interface{

    Interface x, y, z;
    public UsoDeInterfaceFuncional() {
        /*
        *   Implementações de interface funcional
        */
        
        // Classe abstrata
        x = new Interface() {
            @Override
            public double potencia(int b, int e) {
                return Math.pow(b, e);
            }
        };
        
        // Expressão Lambda
        y = (b, e) -> Math.pow(b, e);
        
        // Passagem de método estático por referência
        z = Math::pow;

    }
    
    public static void main(String[] args) {
        UsoDeInterfaceFuncional u = new UsoDeInterfaceFuncional();
        System.out.printf("-    Uso de classe abstrata         =  %.0f\n",u.x.potencia(2, 3));
        System.out.printf("-    Uso de expressão lambda        =  %.0f\n",u.y.potencia(2, 3));
        System.out.printf("-    Uso de método por referência   =  %.0f\n",u.z.potencia(2, 3));
    }

    @Override
    public double potencia(int b, int e) {
        return 0.0;
    }
}
