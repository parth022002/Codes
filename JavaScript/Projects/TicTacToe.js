const boxes = document.querySelectorAll(".box");
const resetBtn = document.querySelector("#reset-btn");
const newGameBtn = document.querySelector("#new-btn");
const msgContainer = document.querySelector(".msg-container");
const msg = document.querySelector("#msg");

let turnO = true; // true for User1, false for User2
let count = 0; // To Track Draw

const winPatterns = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
];

const resetGame = () => {
    turnO = true;
    count = 0;
    enableBoxes();
    msgContainer.classList.add("hide");
};

const handleClick = (box) => {
    if (turnO) {
        // User1
        box.innerText = "X";
        box.setAttribute('data-user', 'User 1');
        turnO = false;
    } else {
        // User2
        box.innerText = "O";
        box.setAttribute('data-user', 'User 2');
        turnO = true;
    }
    box.disabled = true;
    count++;

    let isWinner = checkWinner();

    if (count === 9 && !isWinner) {
        gameDraw();
    }
};

boxes.forEach((box) => {
    box.addEventListener("click", () => handleClick(box));
});

const gameDraw = () => {
    msg.innerText = `It's a Draw!`;
    msgContainer.classList.remove("hide");
    disableBoxes();
};

const disableBoxes = () => {
    boxes.forEach(box => box.disabled = true);
};

const enableBoxes = () => {
    boxes.forEach(box => {
        box.disabled = false;
        box.innerText = "";
        box.removeAttribute('data-user');
    });
};

const showWinner = (winner) => {
    msg.innerText = `Congratulations, ${winner} Wins!`;
    msgContainer.classList.remove("hide");
    disableBoxes();
};

const checkWinner = () => {
    for (let pattern of winPatterns) {
        const [a, b, c] = pattern;
        const boxA = boxes[a].getAttribute('data-user');
        const boxB = boxes[b].getAttribute('data-user');
        const boxC = boxes[c].getAttribute('data-user');

        if (boxA && boxA === boxB && boxB === boxC) {
            showWinner(boxA);
            return true;
        }
    }
    return false;
};

newGameBtn.addEventListener("click", resetGame);
resetBtn.addEventListener("click", resetGame);
