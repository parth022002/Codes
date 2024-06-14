%{
#include<stdio.h>
int is_simple=1;
%}
%%
[ \t]+[aA][nN][dD][ \t]+ {is_simple=0;}
[ \t]+[bB][uU][tT][ \t]+ {is_simple=0;}
[ \t]+[oO][rR][ \t]+ {is_simple=0;}
. {;}
%%
main()
{
printf("Enter the sentence: ");
yylex();

if(is_simple==1)
printf("\n The given sentence is simple sentence\n");
else
printf("\n the given sentence is compund sentence\n");	
}
int yywrap()
{
return 1;
}