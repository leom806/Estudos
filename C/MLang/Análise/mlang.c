#include "enum.c"

/* Main */
int main (int argc, char *argv[]){

  /* Verificação básica de entrada */
  if(argc<2){
    puts(VERSION);
    puts("\n > Nao ha arquivo para compilar.\n");
    return -1;
  }else if(argc==3){
    if(strcmp(argv[2], "-v")==0)
      verbose = 0;
  }

  open(strcat(argv[1], ".mlang"));          /* Tenta abrir arquivo com extensão parametrizada */
  read();                                   /* Lê o arquivo passado pela linha de comando e armazena em um ponteiro global */
  global_ = init_escope(global_, 512);      /* Inicializa o escopo de variáveis globais */
  get_vars();                               /* Lê os tokens sequencialmente armazenando as variáveis enquanto infere os tipos */
  run_methods();                            /* Lê os tokens sequencialmente executando os métodos */
  
  fclose(file);
  return 0;
}