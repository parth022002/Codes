%{
#include<stdio.h>
%}

%%
\/\/(.*) {};
\/\*(.*\n)*.*\*\/ {};
%%

void main(){
yyin = fopen("input.txt", "r");
yyout = fopen("out.c","w"); 
yylex();
}

int
yywrap()
{
return 1;
}
