package Aprendizado.FormasGeometricas;

import static Aprendizado.FormasGeometricas.Auxiliar.*;

public class UsaFormas{
    public static void main(String... args) {
        Forma c = new Circulo();
        Forma t = new Triangulo();
        Forma r = new Retangulo();
        
        printf("Areas:");
        printf("Circulo: %.1f", c.area());
        printf("Triangulo: %.1f", t.area());
        printf("Retangulo: %.1f", r.area());
        
        Circulo circ = (Circulo) c;
        
        printf("\nArea de Circulo: %.1f", circ.area()); // Autoboxing
        
        circ = new Circulo(3);
        
        printf("Area de Circulo: %.1f", circ.area()); 
        
        printf("\nPerimetro: %.1f" , (double) new Retangulo().perimetro());
        printf("Circunferencia: %.1f" , (double) new Circulo().circunferencia());
        
    }
}
