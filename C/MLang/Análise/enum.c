#ifndef header
#define header

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define VERSION "MLang v1.0.0 - Last Compile"
#define OPEN_FILE_ERROR "Erro ao abrir o arquivo."
#define STRING_LIMIT_ERROR "Tamanho de string passou do limite permitido."
#define NAME_ERROR "Este uso da palavra reservada nao eh permitido."
#define NULL_POINTER_EXCEPTION "Ponteiro nao existente."
#define STRING_LIMIT 512
#define UNDEFINED "indefinido"

char *keywords[15] = {"var", "print", "read"};

size_t linha_atual = 1;
int verbose = -1;

FILE *file;						/* Ponteiro do arquivo recebido */
char *code;						/* Código lido de acesso global */
int pos = 0;					/* Posição corrente no *code */

/* Estrutura de valor corrente */
struct {
	char ch;
	int num;
	char *str;
} current;


/* Estrutura de variável comum */
typedef struct {
	char *name;
	char *content;
} var;

var *global_;					/* Ponteiro do escopo de globais */
int elements = 0;				/* Número de variáveis globais existentes */

#include "core.c"
#include "tokenizer.c"
#include "variables.c"
#include "methods.c"

#endif
