
#include <stdio.h> 
#include <string.h>

int main()
{
int currentState = 1, length;
char inputString[5]; 
printf("Enter you string : "); 
scanf("%s", &inputString); 
length = strlen(inputString); 
if (length == 3)
{
{
if (currentState == 1 && inputString[0] == 'a')
{
currentState++;
}
else
{
printf("String is not matched"); return 1;
}
}
{
if (currentState == 2 && inputString[1] == 'b')
{
currentState++;
}
else
{
printf("String is not matched"); return 1;
}
}
{
if (currentState == 3 && inputString[2] == 'b')
{
currentState++;
}
else
 


{
printf("String is not matched"); return 1;
}
}
}
else
{
printf("String is not matched. Length not matched"); 
return 1;
}

printf("String is matched"); 
return 0;
}
