<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

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

        <h1>Login</h1>

        <div id="loginContainer">
            <label>Username: </label>
            <input type="text" id="username" placeholder="Username" value="" required>
            <br>
            <label>Password: </label>
            <input type="password" id="pw" placeholder="Password" value="" required>
            <br>
            <button type="button" name="button" onclick="login()">Log-in</button>
        </div>

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