
/* Este módulo está incluído no arquivo enum.c */

/* Inicializa e retorna escopo de variáveis */

var *init_escope(var *escope, size_t size){
	escope = (var *) malloc(size*sizeof(char)*100);
	return escope;
}

int isInt(const char *var){
	for(int i=0; i<strlen(var)-1; i++){
		if (!(var[i]>='0' && var[i]<='9'))
			return -1;
	}
	return 0;
}

int isDecimal(const char *var){
	int has_coma = 0;
	for(int i=0; i<strlen(var)-1; i++){
		if(var[i]==',' || var[i]=='.')
			has_coma = 1;
		if (!(var[i]>='0' && var[i]<='9' || (var[i]==',' || var[i]=='.')))
			return -1;
	}
	if (has_coma==1)
		return 0;
	return -1;
}


int isAlpha(const char *var){
	for(int i=0; i<strlen(var)-1; i++){
		if (!(var[i]>='a' && var[i]<='z') && !(var[i]>='A' && var[i]<='Z'))
			return -1;
	}
	return 0;
}

char *filter_string(const char *var_){
	char *var = (char *) malloc(strlen(var_)+1);
	for(int i=1; i<=strlen(var_)-2; i++){
		var[i-1] = var_[i];
	}
	var[strlen(var_)-2] = '\0';
	return var;
}

char *filter_digit(const char *var_){
	char *var = (char *) malloc(strlen(var_)+1);
	for(int i=0; i<=strlen(var_)-1; i++){
		var[i] = var_[i];
	}
	var[strlen(var_)-1] = '\0';
	return var;
}


/* Busca e retorna conteúdo da variável */

char *get_global(const char *name){
	for(int i=0; i<elements; i++){
		if(strcmp(global_[i].name, name)==0){
			if(global_[i].content[0]=='"' || global_[i].content[0]=='\''){
				return filter_string(global_[i].content);
			}else{
				return filter_digit(global_[i].content);
			}			
		}
	}
	return UNDEFINED;
}

void set_global(const char *name, char *content_){
	if(get_global(name)==UNDEFINED){
		printf("%s\n", NULL_POINTER_EXCEPTION);
		exit(-1);
	}	
	for(int i=0; i<elements; i++){
		if(strcmp(global_[i].name, name)==0){
			global_[i].content = (char*) realloc(global_[i].content, sizeof(content_)+1);	
			strcpy(global_[i].content, content_);
			global_[i].content[strlen(content_)] = ';';
			global_[i].content[strlen(content_)+1] = '\0';
		}
	}
	return;
}

char *get_type(const char *name){
	for(int i=0; i<elements; i++){
		if(strcmp(global_[i].name, name)==0){
			if(global_[i].content[0]=='"'){
				return "string";
			}else if(global_[i].content[0]=='\'' && strlen(global_[i].content)==4){ // 'c'; == 4
				return "char";
			}else if (isInt(global_[i].content)==0){
				return "int";
			}else if(isDecimal(global_[i].content)==0){
				return "float";
			}else{
				char *aux = (char*) malloc(strlen(global_[i].name)+1);
				strcpy(aux, "&");
				return strcat(aux, get_type(get_global(global_[i].name)));
			}
		}
	}
}
