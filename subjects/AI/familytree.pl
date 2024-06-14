male(kanaiyalal).
male(suresh).
male(harsh).
male(parth).
male(dinesh).
male(mahek).

female(lajavanti).
female(kiran).
female(kanta).
female(anita).
female(hena).
female(palak).
female(payal).

parent_of(kanaiyalal,suresh).
parent_of(lajavanti,suresh).
parent_of(kanaiyalal,dinesh).
parent_of(lajavanti,dinesh).
parent_of(kanaiyalal,kanta).
parent_of(lajavanti,kanta).
parent_of(kanaiyalal,anita).
parent_of(lajavanti,anita).
parent_of(suresh,harsh).
parent_of(kiran,harsh).
parent_of(suresh,parth).
parent_of(kiran,parth).
parent_of(dinesh,mahek).
parent_of(hena,mahek).
parent_of(dinesh,palak).
parent_of(hena,palak).
parent_of(dinesh,payal).
parent_of(hena,payal).

father_of(X,Y) :- parent_of(X,Y), male(X).
mother_of(X,Y) :- parent_of(X,Y), female(X).
grandfather_of(X,Y) :- parent_of(Z,Y), father_of(X,Z).
grandmother_of(X,Y) :- parent_of(Z,Y), mother_of(X,Z).
sister_of(X,Y) :- father_of(Z,X), father_of(Z,Y), mother_of(U,X), mother_of(U,Y), female(X), not(X=Y).
brother_of(X,Y) :- father_of(Z,X), father_of(Z,Y), mother_of(U,X), mother_of(U,Y), male(X), not(X=Y).
aunt_of(X,Y) :- parent_of(Z,Y),sister_of(X,Z).
uncle_of(X,Y) :- parent_of(Z,Y),sister_of(X,Z).
cousin_of(X,Y) :- father_of(Z,X), father_of(W,Y), brother_of(Z,W).
grandson_of(X,Y) :- parent_of(Z,X), parent_of(Y,Z), male(X).
grandparent_of(X,Y) :- parent_of(X,Z), parent_of(Z,Y).
descendent_of(X,Y) :- father_of(Y,X).
