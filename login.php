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
            Here we will have have users allowed to login for online play
            Dependencies:
                ID: Username
                ID: Password
                Tools: Login Sessions
        -->

    <div class="menuBox">
       <div class="header">
           <h1>Login</h1>
       </div> 
        
        <div id="loginField">
            <label class="loginLabel" for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="Username" value="" required>
            <br>
            <label class="loginLabel" for="pw">Password: </label>
            <input type="password" id="pw" name="pw" placeholder="Password" value="" required>
            <br>
            <button type="button" name="button" class="buttonClass" onclick="login()">Log-in</button>
        </div>
        <a class="backLink" href="index.php">Go Back</a>



        <!-- AJAX post functions for login -->
        <script>
            function login() {
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
                        if (response == "Success"){
                            window.location.href = "index.php";
                            alert("Welcome " + username + "!");
                        }
                        }
                    }
                    } catch (e) {
                    console.log("Caught exception: " + e.description + ", while attempting to log in");
                    }
                }
                httpRequest.open('POST','scripts/login.php');
                httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                httpRequest.send('username=' + username + '&pw=' + pw);
                }
        </script>
        
    </body>
</html>