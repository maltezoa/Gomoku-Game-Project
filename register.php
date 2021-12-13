<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./CSS/newdesign.css">
        <!-- Insert CSS File for Login/Register Page here-->        
    </head>
    <body> 
        <!-- 
            Here we will have have users allowed to Register for online play and insert into MySQL
            Dependencies:
                ID: Username
                ID: Password
                ID: Wins (Default 0)
                ID: Time played (Default 00:00)
                ID: Games played (Default 0)
                ID: Tile Color (Drop down: Red, Green, Blue, Yellow registered as an image stored in the folder)
        -->

    <div class="menuBox">
       <div class="header">
           <h1>Registration</h1>
       </div>
       <div id="loginField">
            <label class="loginLabel" for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="Enter a Username" value="" required>
            <br>
            <label class="loginLabel" for="pw">Password: </label>
            <input type="password" id="pw" name="pw" placeholder="Enter a Password" value="" required>            
            <br><br>
            <button type="button" name="signup" class="buttonClass" onclick="submit()">Register</button>
        </div>
</div>
<a class="backLink" href="index.php">Go Back</a>

        <script>
            function submit() {
                let username = document.getElementById('username').value;
                let pw = document.getElementById('pw').value;
                httpRequest = new XMLHttpRequest();
                if (!httpRequest) {
                    alert('Cannot create an XMLHTTP instance');
                    return false;
                }
                httpRequest.onreadystatechange = function() {
                    try {
                    if (httpRequest.readyState == XMLHttpRequest.DONE) {
                        if (httpRequest.status == 200) {
                        var response = httpRequest.responseText;
                        alert(response);
                        if (response == "Success") {
                            window.location.href = "login.php";
                        }
                        }
                    }
                    } catch (e) {
                    console.log("Caught exception: " + e.description + ", while attempting to register");
                    }
                }
                httpRequest.open('POST','scripts/register.php');
                httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                httpRequest.send('username=' + username + '&pw=' + pw);
                }
        </script>
        
    </body>
</html>