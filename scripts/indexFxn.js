function createUserDB() {
    // Creates the DB with entries from the keyboards.json file
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if(req.readyState == 4 && req.status == 200){
            alert("Creating new databases");
        }
    }
    req.open("POST", "./scripts/database.php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("callDBCreate=true");
}

function resetDB() {
    // Creates the DB with entries from the keyboards.json file
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if(req.readyState == 4 && req.status == 200){
            alert("Creating new databases");
            
        }
    }
    req.open("POST", "./scripts/database.php", true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("callReset=true");
}

function display(x) {
    switch(x) {
        case 0:
            document.getElementById("menuPic").src = "images/lan.png";
            document.getElementById("menuDesc").innerHTML = "<p>Play Gomoku locally on the same computer</p>"
            break;
        case 1:
            document.getElementById("menuPic").src = "images/online.png";
            document.getElementById("menuDesc").innerHTML = "<p>Play Gomoku against an online opponent</p>"
            break;
        case 2:
            document.getElementById("menuPic").src = "images/contact.png";
            document.getElementById("menuDesc").innerHTML = "<p>View developer contact page</p>"
            break;
        case 3:
            document.getElementById("menuPic").src = "images/howtoplay.png";
            document.getElementById("menuDesc").innerHTML = "<p>Learn how to play Gomoku</p>"
            break;
        case 4:
            document.getElementById("menuPic").src = "images/leaderboard.png";
            document.getElementById("menuDesc").innerHTML = "<p>View leaderboard standings</p>"
            break;
        case 5:
            document.getElementById("menuPic").src = "images/login.png";
            document.getElementById("menuDesc").innerHTML = "<p>Login to an existing account</p>"
            break;
        case 6:
            document.getElementById("menuPic").src = "images/register.png";
            document.getElementById("menuDesc").innerHTML = "<p>Register a new Gomoku online account</p>"
            break;
        case 7:
            document.getElementById("menuPic").src = "images/gomoku.jpg";
            document.getElementById("menuDesc").innerHTML = "<p>Welcome to Gomoku</p>"
            break;
        default:
            return;
    }
}