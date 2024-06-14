%{
    #include "calc.tab.h"
    #include <stdlib.h>
    void yyerror(char *);
%}
%%
[0-9]+      {
                yylval = atoi(yytext);
                return INTEGER;
            }
[-+*/\n]      return *yytext;
.           yyerror("invalid character\n");
%%
int yywrap(void) {
    return 1;
}
