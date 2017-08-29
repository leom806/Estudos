
/* Este módulo está incluído no arquivo enum.c */

int get_vars(){
  char *token = malloc(STRING_LIMIT*sizeof(char));
  
  while(has_next()==0){
    token = next_token(); 

    if(strcmp(token, "var")==0){
      char *tokens[3] = {next_token(), next_token(), next_token()};
      /* Verifica se algum dos tokens inseridos não é permitido. */
      for(int i=0; i<3; i++){
      	for(int j=0; j<3; j++){
      		if(strcmp(tokens[i], keywords[j])==0){
      			printf("'%s' -> %s\n", tokens[i], NAME_ERROR);
      			return -1;
      		}
      	}
      }
      var aux;
      aux.name = tokens[0];
      aux.content = tokens[2];
      global_[elements] = aux;
      elements++;
    }

    if(token[strlen(token)-1]==';'){
      token = realloc(token, 50*sizeof(char));
    }
  }

  if(verbose==0){
    printf("  ----------------------------------------------------------\n");
    for(int i=0; i<elements; i++){
      printf(" | var: %6s | type: %10s | content: %14s |\n", global_[i].name, get_type(global_[i].name), get_global(global_[i].name));
    }
    printf("  ----------------------------------------------------------\n");
    printf("%35sTotal de globais: %3d\n", "", elements);
  }

  free(token);
  return 0;
}