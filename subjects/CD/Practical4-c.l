%{
#include<stdio.h>
%}

%%
\<[^>]*\> fprintf(yyout, "%s", yytext);
.|\n;
%%
int main()
{
yyin=fopen("input.html","r");
yyout=fopen("output.txt","w");
yylex();
return 0;
}
int yywrap()
{
return 1;
}