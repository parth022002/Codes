%{
#include<stdio.h>
%}
%%
"I" {printf("1");}
"II" {printf("2");}
"III" {printf("3");}
"IV" {printf("4");}
"V" {printf("5");}
"VI" {printf("6");}
"VII" {printf("7");}
"VIII" {printf("8");}
"IX" {printf("9");}
"X" {printf("10");}
"XX" {printf("20");}
"XXX" {printf("30");}
"XL" {printf("40");}
"L" {printf("50");}
"LX" {printf("60");}
"LXX" {printf("70");}
"LXXX" {printf("80");}
"IC" {printf("90");}
"C" {printf("100");}
"CC" {printf("200");}
"CCC" {printf("300");}
"D" {printf("500");}
"M" {printf("1000");}
. {printf("Invalid");};
%%
int main()
{
printf("Enter Roman :");
yylex();
return 0;
}
int yywrap()
{
return 1;
}