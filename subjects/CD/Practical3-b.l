%{
char ch;
%}
%%
[a-z] {ch = yytext[0]+ 3;
if(ch >'z'){
ch -= ('z' + 1 - 'a');
}
printf("%c", ch);
}
[A-Z] {ch = yytext[0] + 3;
if(ch > 'Z'){
ch -= ('Z' + 1 - 'A');
}
printf("%c", ch);
}
%%
void main()
{
printf("enter your character: \n");
yylex();
}
int yywrap()
{
 return 1;
}
