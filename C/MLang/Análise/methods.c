
int run_methods(){
  char *token = malloc(50*sizeof(char));
  
  linha_atual = 1;
  pos = 0;

  while(has_next()==0){
    token = next_token();   

    if (strcmp(token, "print")==0){
    	char *argument = next_token();
    	argument[strlen(argument)-1] = '\0'; 
    	/* Verifica se algum dos tokens inseridos não é permitido. */
	  	for(int j=0; j<3; j++){
	  		if(strcmp(argument, keywords[j])==0){
	  			printf("'%s' -> %s\n", argument, NAME_ERROR);
	  			return -1;
	  		}
	  	}
	  	
	  	if(argument[0]=='"'){
	  		char *aux = filter_string(argument);
	  		for(int i=0; i<strlen(aux); i++){
	  			if(aux[i] == '\\' && aux[i+1] == 'n'){
	  				printf("\n"); i++;
	  			}else
	  				fprintf(stdout, "%c", aux[i]);
	  		}
	  		fflush(stdout);
	  	}
	  	else if(strcmp((argument = get_global(argument)),UNDEFINED)==0){
	  		printf("%s\n> Linha: %d\n", NULL_POINTER_EXCEPTION, linha_atual);
	  		return -1;
	  	}else{
	  		fprintf(stdout, "%s", argument);
	  		fflush(stdout);
	  	}
    }else if(strcmp(token, "read")==0){
    	char *argument = next_token();
    	argument[strlen(argument)-1] = '\0'; 
    	/* Verifica se algum dos tokens inseridos não é permitido. */
	  	for(int j=0; j<3; j++){
	  		if(strcmp(argument, keywords[j])==0){
	  			printf("'%s' -> %s\n", argument, NAME_ERROR);
	  			return -1;
	  		}
	  	}

	  	if(strcmp((get_global(argument)),UNDEFINED)==0){
	  		printf("%s\n", NULL_POINTER_EXCEPTION);
	  		return -1;
	  	}else{
	  		char *aux = (char*) malloc(STRING_LIMIT*sizeof(char));
	  		scanf("%s", aux);
	  		set_global(argument, aux);	  	
	  	}
    }

    if(token[strlen(token)-1]==';'){
        token = realloc(token, 50*sizeof(char));
    }
  }

  free(token);
  return 0;
}