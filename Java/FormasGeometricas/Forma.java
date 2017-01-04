package Aprendizado.FormasGeometricas;

public abstract class Forma {
    
    private int[] dimensoes = null;
    
    // Construtor padronizado
    public Forma() {
    }
    
    // Construtor parametrizado
    public Forma(int dimensoes) {
        this.dimensoes = new int[dimensoes];
    }
    
    public void setDimensoes(int qntdDimensoes){
        if(qntdDimensoes <= 0) 
            throw new RuntimeException("Dimensao invalida");
        this.dimensoes = new int[qntdDimensoes];
    }
    
    public void novaDimensao(int dimensao, int pos) {
        if (dimensao < 0 && (pos < 0 && pos > dimensoes.length))
            throw new RuntimeException("Dimensao ou posicao invalida");
        this.dimensoes[pos] = dimensao;
    }
    
    public int getDimensao(int pos) {
        if (pos < 0)
            throw new RuntimeException("Posicao invalida");
        return dimensoes[pos];
    }
    
    public int[] getDimensoes() {
        return dimensoes;
    }
    
    public abstract double area();
    
}
