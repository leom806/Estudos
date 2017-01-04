package Aprendizado.FormasGeometricas;

public class UsaFormas {
    public static void main(String... args) {
        Forma c = new Circulo();
        Forma t = new Triangulo();
        Forma r = new Retangulo();
        
        System.out.println("Areas:");
        System.out.println("Circulo: "+c.area());
        System.out.println("Triangulo: "+t.area());
        System.out.println("Retangulo: "+r.area());
        
        System.out.println("\nPerimetro: " + new Retangulo().perimetro());
        System.out.println("Circunferencia: " + new Circulo().circunferencia());
        
    }
}
