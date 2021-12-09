<?php   
    // requires testing

    // create a database with the name $databaseName
    // grant Data and Structure permissions then run this file

    $servername = "localhost"; // hostname
    $username = "AdminLab12";
    $password = "4VPnroTOC6wOU3mn";
    $userDB = "userDB";
    $gomokuDB = "gomokuDB";


    // DB Creation function
    function createDB($name) {
        global $servername, $username, $password;
        // Create connection
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error ."<br>");
        }
        echo "Connected successfully <br>";
        // Creation of the database
        $sql = "CREATE DATABASE ". $name;
        if ($conn->query($sql)) {
            echo "Database ". $name ." created successfully<br>";
        } else {
            echo "Error creating database ". $name ." : " . $conn->error ."<br>";
        }
        // close the connection
        $conn->close();
    }

    // Create a user table
    function createUsersTable($db){
        global $servername, $username, $password;
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "CREATE TABLE users (	
        idx INT(300) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(30) NOT NULL,
        pw VARCHAR(300) NULL DEFAULT NULL,
        gamesplayed INT(300) NULL DEFAULT 0,
        gameswon INT(300) NULL DEFAULT 0,
        timeplayed TIME NULL DEFAULT 0,
        tilecolor VARCHAR(3000) NOT NULL,
        reg_date TIMESTAMP )";

        echo $sql . '<br>';
        if ($conn->query($sql) === TRUE) {
            echo "Table Users created successfully<br>";
        } else {
            echo "Error creating table: " . $conn->error ."<br>";
        }

        $conn->close();
    }

    // Clear User data
    function truncateUsersTable($db){
        GLOBAL $servername, $username, $password;
        $conn = new mysqli($servername, $username, $password, $db);
	    // Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
	    }

		$sql = "TRUNCATE users;";
		$conn->query($sql);

        /* close connection */
        $conn->close();
    }

    // Clear Lobby data
    function truncateGomoTable($db){
        GLOBAL $servername, $username, $password;
        $conn = new mysqli($servername, $username, $password, $db);
	    // Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
	    }

		$sql = "TRUNCATE lobby;";
		$conn->query($sql);

        /* close connection */
        $conn->close();
    }


    if(isset($_POST['callDBCreate']) && $_POST['callDBCreate'] == 'true'){
        createDB($userDB);
        createDB($gomokuDB);
        createKeyboardsTable($userDB);
    }

    if(isset($_POST['callReset']) && $_POST['callReset'] == 'true'){
        truncateUsersTable($userDB);
        truncateGomoTable($gomokuDB);

    }

?>