<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <!-- Insert CSS File for Login/Register Page here-->        
    </head>
    <body>
        <h1>Registration</h1>
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
        <div id="formContainer">
            <label for="username">Username: </label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>
            <br>
            <label for="pw">Password: </label>
            <input type="password" placeholder="Enter Password" name="pw" id="pw" required>
            <br>
            <p>Pick a Default Tile Color: </p>
            <select id="tilecolor" name="tilecolor" required>
                <option value="red">Red</option>
                <option value="green">Green</option>
                <option value="blue">Blue</option>
                <option value="yellow">Yellow</option>
            </select>
            <br><br>
            <button type="button" name="signup" onclick="submit()">Register</button>
        </div>

        <script>
            function submit() {
                let username = document.getElementById('username').value;
                let pw = document.getElementById('pw').value;
                let select = document.getElementById('tilecolor');
                let tilecolor = select.options[select.selectedIndex].value;
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
                httpRequest.send('username=' + username + '&pw=' + pw + '&tilecolor=' + tilecolor);
                }
        </script>
        
    </body>
</html>