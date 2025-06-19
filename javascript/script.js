const slides = document.querySelectorAll('.slide');

let currentSlide = 0;

setInterval(() => {
  slides[currentSlide].classList.remove('active');
  currentSlide = (currentSlide + 1) % 2;
  slides[currentSlide].classList.add('active');
}, 3000);

 const boardElement = document.getElementById("board");
    const statusElement = document.getElementById("status");
    let board = ["", "", "", "", "", "", "", "", ""];
    let currentPlayer = "X";
    let gameOver = false;

    function createBoard() {
      boardElement.innerHTML = "";
      board.forEach((value, index) => {
        const cell = document.createElement("div");
        cell.classList.add("game-cell");
        cell.textContent = value;
        cell.addEventListener("click", () => handleClick(index));
        boardElement.appendChild(cell);
      });
    }

    function handleClick(index) {
      if (board[index] || gameOver) return;

      board[index] = currentPlayer;
      createBoard();
      if (checkWin()) {
        statusElement.textContent = `Speler ${currentPlayer} wint!`;
        gameOver = true;
      } else if (board.every(cell => cell !== "")) {
        statusElement.textContent = "Gelijkspel!";
        gameOver = true;
      } else {
        currentPlayer = currentPlayer === "X" ? "O" : "X";
        statusElement.textContent = `${currentPlayer} is aan de beurt`;
      }
    }

    function checkWin() {
      const winPatterns = [
        [0,1,2], [3,4,5], [6,7,8], 
        [0,3,6], [1,4,7], [2,5,8], 
        [0,4,8], [2,4,6]          
      ];
      return winPatterns.some(pattern =>
        pattern.every(index => board[index] === currentPlayer)
      );
    }

    function resetGame() {
      board = ["", "", "", "", "", "", "", "", ""];
      currentPlayer = "X";
      gameOver = false;
      statusElement.textContent = "X is aan de beurt";
      createBoard();
    }

    createBoard();