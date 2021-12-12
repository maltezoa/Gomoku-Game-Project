// Game in-process flag
var game = true;

// Turn count value initial @ 1 for first turn
var turnCount = 1;

// Event listener for adding a piece (addPiece will be a function)
document.addEventListener("click", addPiece);

// Player global variable
var p = 1

// size variable 
var size = 0;

// Board 2darray 
var matrix = [];
// Populate board 2darray with 0 values 
// This will eventually be turned into a function for the players to choose between a 15x15 or 19x19 board
function createMatrix(num) {   
    for (var i =0; i<num; i++){
        matrix.push([]);
        // fill array with 0 value flags (for open slot)
        for (var j=0; j<num; j++){
            matrix[i].push(0);
        }
    }
}


// function to create a board
// Inspect the page to find the log. Function works. Just needs stylizing for the cells to show the table like a grid
function createBoard(num){
    size = num;
    if(num == 15){
        board = document.getElementById("board");
        board.innerHTML = "";
        board.className = "container15"

    } else {
        board = document.getElementById("board");
        board.innerHTML = "";
        board.className = "container19"
    }

    // if num == 15 use class tile, else use class cell for 19x19

    for(let j = 0; j < parseInt(num); j++){ // for each row
        for(let i = 0; i < parseInt(num); i++ ){ // for each column
            newCell = document.createElement("div");
                
            newCell.setAttribute("class","tile");
            newCell.setAttribute("id","cell_" + i + "_" + j);
            newCell.setAttribute("onclick","addPiece(" + i + "," + j + ")");

            board.appendChild(newCell);
        }
    } 
        console.log(board);
        matrix = [];
        createMatrix(num);
        console.log(matrix);                
}



// Next turn function
function nextTurn(){
    if (p === 2){
        p = 1;
    }
    else {
        p = 2;
    }
    checkWinner();
}

// Check winner based on 2dArray values
// Create checkif3 and checkif4. These will be similar to this function but with 1-2 less variable 
// checks and will change the background color of those cells
function checkWinner(){
    if (!game){
        alert("Game has ended");
        return;
    }
    var player = "<?php echo  $host; ?>";
    for (var i=0; i<matrix.length; i++){
        for (var j=0; j<(matrix.length-5); j++){
            var z = matrix[i][j];
            var y = matrix[j][i];
            // If 5 in left -> right direction or left -> right diagonal direction (and is not going to go over the limit of the board)
            // get the value of the cell/player, end game, break, output winner
            if (z != 0 && ((z === matrix[i][j+1] && z === matrix[i][j+2] && z === matrix[i][j+3] && z === matrix[i][j+4]) || (i<=10 && z != -1 && z === matrix[i+1][j+1] && z === matrix[i+2][j+2] && z === matrix[i+3][j+3] && z === matrix[i+4][j+4]))){
                p = z;
                game = false;
                break;
            }
            // If 5 in top -> bottom direction, or 5 in right -> left diagonal direction (and is not going over the limit of the board) 
            // get the value of the cell/player, end game, break, output winner
            else if (y != 0 && ((y === matrix[j+1][i] && y === matrix[j+2][i] && y === matrix[j+3][i] && y === matrix[j+4][i]) || (i>=4 && y != -1 && y === matrix[j+1][i-1] && y === matrix[j+2][i-2] && y === matrix[j+3][i-3] && y === matrix[j+4][i-4]))){
                p = y;
                game = false;
                break;
            }
        }
        // If game is false, break for loop
        if (!game){
            break;
        }
}

    // if game is false, remove event listener, announce with player wins (p+1)
    if (!game){
        document.removeEventListener("click", addPiece());
        if(p === 1){
            updateHostWins();
            setTimeout(function(){alert("Host wins!");},10);
       } else {
            updateHostGames();
            setTimeout(function(){alert("Host loses!");},10);
       }
    }
}

// Add piece function
// Add piece will need stylizing for the pieces placed on the board. It will also take into account 
// of the turn that the piece is placed in and put that number on top the piece.
function addPiece(row,col){
    if(game === true){
        //  check if spot is empty (-1), if not then alert a message saying a piece has already been placed there
        if (matrix[row][col] !== 0){
            alert("A piece has already been placed here.");
        }
        else{
            // place a piece, put the player value in the 2dArray, increment turn count, advance into next player
            matrix[row][col] = p;
            if (p === 1){
                var piece = document.getElementById("cell_" + row + "_" + col);
                piece.innerHTML = '<img src="./images/red.png" width="30"/>';
                piece.classList.add("playerX")
            } else{
                var piece = document.getElementById("cell_" + row + "_" + col);
                piece.innerHTML = '<img src="./images/blue.png" width="30"/>';
                piece.classList.add("playerO")
            }
            turnCount += 1;
            nextTurn();
        }
    }

}

// Reset board and game
function reset(){
    game = true;
    p = 1;
    document.addEventListener("click", addPiece);
    createBoard(size);
}

// Function DB update on Win
function updateHostWins(){
    // Creates the DB with entries from the keyboards.json file
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if(req.readyState == 4 && req.status == 200){
            alert("Updating host's games");
            var response = req.responseText;
            alert(response);
        }
    }
    req.open("POST", "./scripts/updateStats.php");
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("callGameWin=true");
}

// Function DB update on loss
function updateHostGames(){
    // Creates the DB with entries from the keyboards.json file
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if(req.readyState == 4 && req.status == 200){
            alert("Updating host's games");
            var response = req.responseText;
            alert(response);
        }
    }
    req.open("POST", "./scripts/updateStats.php");
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("callGameLoss=true");
}