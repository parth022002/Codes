%{
#include<stdio.h>
#include<string.h>
char word [] = "Parth";
int count =0;
%}
%%
[a-zA-Z]+  {if(strcmp(yytext,word)==0)count++; }
. ;
%%
void main()
{
		yyin=fopen("input.txt","r");
yylex();
printf("Word appears %d times", count);
}
int yywrap()
{ 
return 1;
}