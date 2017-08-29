
/* Este módulo está incluído no arquivo enum.c */

int open(char *file_name){
  if(!(file = fopen(file_name, "rt"))){
    puts(OPEN_FILE_ERROR);
    return -1;
  }
}

char* read(){
  int n = 0;
  code = malloc(10000*sizeof(char));
  int buffer;
  while( (buffer=fgetc(file)) != EOF){
    code[n++] = (char) buffer; 
  }
  code[n] = '\0';
  return code;
}

char *next_token(){
  if(file == NULL)
    return '\0';
  char c;
  char *token;
  int i = 0;
  int reading_string = -1;
  token = malloc(100*sizeof(char));
  while((c=code[pos++]) != '\0'){ 
    // Retorna ; como um único token   
    if(c==';'){
      token[i] = c; 
      i++;
      token[i] = '\0';
      return token;
    } 
    // Caracter de comentário de linha única
    else if(c=='#'){
      for(pos; code[pos]!='\n' && code[pos]!='\0'; pos++)
        ;
      continue;
    }
    // Indica se estamos lendo uma string
    else if(c=='\"'){
      if(reading_string==-1)
        reading_string = 0;
      else
        reading_string = -1;
    }
    // Quebra quando espaços em branco e tabulações
    else if ((c==' ' || c=='\t') && reading_string==-1){
      break;
    }
    // Ignora quebras de linha
    else if(c== '\n'){
      linha_atual++;
      continue;
    }    
    // Retorna token se passou por todas as condições
    token[i] = c; 
    i++;
  }
  token[i] = '\0';
  return token;
}

int has_next(void){
  return (pos+1)==strlen(code)+1;
}