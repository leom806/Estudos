package teste;

/**
* Name: Main
* Date: 20-12-2016
* Update: 27-12-2016
* Description: Main class.
*/

public class Main implements inter{

    public Main() {
        /*
        *   Implementações de interface funcional
        */
        
        // Classe abstrata
        inter x = new inter() {
            @Override
            public double potencia(int b, int e) {
                return Math.pow(b, e);
            }
        };
        
        // Expressão Lambda
        inter y = (b, e) -> Math.pow(b, e);
        
        // Passagem de método estático por referência
        inter z = Math::pow;
    }

    public static void main(String[] args) {
        Main m = new Main();
    }

    @Override
    public double potencia(int b, int e) {
        return 666.0;
    }
}
