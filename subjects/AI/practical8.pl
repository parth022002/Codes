fill(x,y).
fill(2,0):-nl, write('Goal state Achieved').

/*Rule for filling the 4-Gallon Jug when it has less than or equal to 1 gallon of water.*/
fill(X,Y):-X=0,Y=<1,nl,write('Fill the 4-Gallon Jug:(4,'),write(Y),write(')'),fill(4,Y).

/*Rule for filling the 3-Gallon Jug when it has 0 gallons of water, and the 4-Gallon Jug has 3 gallons.*/
fill(X,Y):-Y=0,X=3,nl,write('Fill the 3-Gallon Jug:'),write(X),write(',3)'),fill(X,3).

/*Rule for pouring water from the 3-Gallon Jug to the 4-Gallon Jug until the latter is full.*/
fill(X,Y):-X+Y>=4,Y=3,X=3,Y1 is Y-(4-X), nl,write('Pour water from 3-Gallon jug to 4 Gallon Jug until it is full:(4,'),write(Y1),write(')'),fill(4,Y1).


/*Rule for pouring water from the 4-Gallon Jug to the 3-Gallon Jug until the latter is full.*/
fill(X,Y):-X+Y>=3,X=4,Y=<1,X1 is X-(3-Y), nl,write('Pour water from 4-Gallon jug to 3 Gallon Jug until it is full:'),write(X1),write('3)'),fill(X1,3).

/*Rule for pouring all water from the 3-Gallon Jug to the 4-Gallon Jug.*/
fill(X,Y):-X+Y=<4,X=0,Y>1,X1 is X+Y,nl,write('Pour all water from 3-Gallon jug to 4Gallon:('),write(X1),write(',0)'),fill(X1,0).

/*Rule for pouring all water from the 4-Gallon Jug to the 3-Gallon Jug.*/
fill(X,Y):-X+Y<3,Y=0,Y>1,Y1 is X+Y, nl,write('Pour all water from 4-Gallon jug to 3 Gallon: (0,'),write(Y1),write(')'),fill(0,Y1).

/*Rule for emptying the 4-Gallon Jug on the ground when it contains 2 gallons of water.*/
fill(X,Y):-Y=2,X=4,nl,write('Empty 4-Gallon jug on ground: (0,'),write(Y),write(')'),fill(0,Y).


/* Rule for emptying the 3-Gallon Jug on the ground when it contains 3 gallons of water.*/
fill(X,Y):-Y=3,X>=1,nl,write('Empty 3-Gallon jug on ground: (,'),write(X),write(',0)'),fill(X,0).

/*Rules for handling overflow situations.*/

fill(X,Y):- X>4,Y<3,write('4-gallon Jug overflowed'),nl.

fill(X,Y):- X<4,Y>3,write('3-gallon Jug overflowed'),nl.

fill(X,Y):- X>4,Y>3,write('Both 3-gallon & 4-gallon Jug overflowed'),nl.
