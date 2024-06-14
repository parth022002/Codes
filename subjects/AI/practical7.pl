move(1,X,Y,_) :-
    write('Move top disk from '), write(X), write('to'),write(Y),nl.
move(N,X,Y,Z) :-
    N>1,
    M is N-1,
    move(M,X,Z,Y), /*Recursively move N-1 disks from X to Z using Y.*/
    move(1,X,Y,_), /*Move the largest disk from X to Y.*/
    move(M,Z,Y,X). /*Recursively move N-1 disks from Z to Y using X.*/
