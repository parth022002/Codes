% render solutions nicely.
:- use_rendering(chess).

%	   queens(+N, -Queens) is nondet.
%
%	@param	Queens is a list of column numbers for placing the queens.
%	@author Richard A. O'Keefe (The Craft of Prolog)

/*These lines provide documentation for the queens/2 predicate. It specifies that queens/2 takes an integer N and outputs a list of column numbers Queens representing the placement of queens on a chessboard*/

queens(N, Queens) :-
    length(Queens, N),
	board(Queens, Board, 0, N, _, _),
	queens(Board, 0, Queens).

/*This is the main entry point for the N-Queens problem solver. It specifies that there should be N queens on the chessboard, and it calls board/6 to generate the board and queens/3 to find the queen placements.*/

board([], [], N, N, _, _).

/*This clause defines the base case for the board/6 predicate when the placement of queens is complete. It specifies that when there are no queens left to place, the board and related variables are empty.*/

board([_|Queens], [Col-Vars|Board], Col0, N, [_|VR], VC) :-
	Col is Col0+1,
	functor(Vars, f, N),
	constraints(N, Vars, VR, VC),
	board(Queens, Board, Col, N, VR, [_|VC]).

/*This clause defines how to build the chessboard and related variables while placing queens. It recurses through the list of queens, incrementing the column, creating variables for the row constraints, and recursively building the board.*/


constraints(0, _, _, _) :- !.

/*This clause defines the base case for the constraints/4 predicate when there are no constraints left. The cut operator (!) is used to prevent backtracking in this case.*/

constraints(N, Row, [R|Rs], [C|Cs]) :-
	arg(N, Row, R-C),
	M is N-1,	constraints(M, Row, Rs, Cs).

/*This clause defines how to generate row and column constraints for the queens. It uses the arg/3 predicate to access the Nth element of the Row and builds the constraints recursively. */

queens([], _, []).

/*This clause defines the base case for the queens/3 predicate when all queens are placed. It specifies that the solution is an empty list. */

queens([C|Cs], Row0, [Col|Solution]) :-
	Row is Row0+1,
	select(Col-Vars, [C|Cs], Board),
	arg(Row, Vars, Row-Row),
	queens(Board, Row, Solution).




























