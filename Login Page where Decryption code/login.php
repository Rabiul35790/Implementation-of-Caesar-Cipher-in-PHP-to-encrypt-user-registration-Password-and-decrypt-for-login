<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body class = "sbd">
    <div class="nav">
        <b>CineMagic</b>
    </div>
    
    <div class="navbar"> 
        <div class="menu"> 
            <a href="login.php">Home</a> 
            <a href="login.php">Show Time</a> 
            <a href="login.php">Movie List</a> 
            <a href="login.php">Ticket price</a> 
            <a href="login.php">About Us</a>
            <a href="login.php">Contact</a>
            <a href="signup.php">Signup</a>
            <a class="logs" href="login.php">Login</a>
            <a href="admin.php">Admin</a>
        </div>
    </div>
    
    <?php 
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "janina";

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (isset($_POST['login'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $sql = "SELECT * FROM tb_user WHERE username = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                //Decryption is done from here 
                $stored_password = $result->fetch_assoc()['password'];
                $shift = 3;
                $decrypted_password = '';
                for ($i = 0; $i < strlen($stored_password); $i++) {
                    $char = $stored_password[$i];
                    if (ctype_alpha($char)) {
                        $ascii = ord($char);
                        $ascii -= $shift;
                        if (ctype_upper($char) && $ascii < ord('A')) {
                            $ascii += 26;
                        } elseif (ctype_lower($char) && $ascii < ord('a')) {
                            $ascii += 26;
                        }
                        $decrypted_password .= chr($ascii);
                    } else {
                        $decrypted_password .= $char;
                    }
                }
    
                if ($decrypted_password === $password) {
                    echo "<script>window.location = 'home.php';</script>";
                } else {
                    echo "<script>alert('Invalid credentials. Please try again.');</script>";
                }
            } else {
                echo "<script>alert('Invalid credentials. Please register first.');</script>";
            }
    
            $stmt->close();
        } else {
            echo "<script>alert('Please enter both username and password.');</script>";
        }
    }
    
?>
    
    <form class="boxs" action="" method="post">
    <h1>Login</h1>
    <div class="column">
        <div class="input-sdata">
            <input type="text" required name="username">
            <div class="underline"></div>
            <label>Username</label>
        </div>
        <div class="input-sdata">
            <input type="password" required name="password">
            <div class="underline"></div>
            <label>Password</label>
        </div>
    </div>
    <input type="submit" name="login" value="Login"><br/>
</form>

</body>
</html>
