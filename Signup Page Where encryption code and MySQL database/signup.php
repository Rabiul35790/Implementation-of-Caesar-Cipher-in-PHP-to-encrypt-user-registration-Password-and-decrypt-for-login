<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>SignUp Page</title>
</head>
<body class = "sbd">
    <div class="nav">
        <b>CineMagic</b>
    </div>
    
    <div class="navbar"> 
        <div class="menu"> 
            <a href="signup.php">Home</a> 
            <a href="signup.php">Show Time</a> 
            <a href="signup.php">Movie List</a> 
            <a href="signup.php">Ticket price</a> 
            <a href="signup.php">About Us</a>
            <a href="signup.php">Contact</a>
            <a class="logs" href="signup.php">Signup</a>
            <a href="login.php">Login</a>
            
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

    if (isset($_POST['submit'])) {
        if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];

            $check_existing = $mysqli->prepare("SELECT * FROM tb_user WHERE username = ? OR email = ?");
            $check_existing->bind_param("ss", $username, $email);
            $check_existing->execute();
            $result = $check_existing->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Username or Email already exists. Please use different credentials.');</script>";
                $check_existing->close();
            } else {
                $check_existing->close();

                if ($password === $confirmpassword) {
                    // Encrypt the password using Caesar Cipher (for example, shifting each character by 3 positions)
                    $encrypted_password = '';
                    $shift = 3;
                    for ($i = 0; $i < strlen($password); $i++) {
                        $char = $password[$i];
                        if (ctype_alpha($char)) {
                            $ascii = ord($char);
                            $ascii += $shift;
                            if (ctype_upper($char) && $ascii > ord('Z')) {
                                $ascii -= 26;
                            } elseif (ctype_lower($char) && $ascii > ord('z')) {
                                $ascii -= 26;
                            }
                            $encrypted_password .= chr($ascii);
                        } else {
                            $encrypted_password .= $char;
                        }
                    }
                
                    $sql = "INSERT INTO tb_user (fname, lname, username, email, password) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("sssss", $fname, $lname, $username, $email, $encrypted_password);
                    
                    if ($stmt->execute()) {
                        echo "<script>alert('Registration Successful');</script>";
                        echo "<script>window.location = 'login.php';</script>";
                    } else {
                        echo "<script>alert('Error occurred. Please try again.');</script>";
                    }
                
                    $stmt->close();
                } else {
                    echo "<script>alert('Password does not match.');</script>";
                }
            }
        } else {
            echo "<script>alert('All fields are required.');</script>";
        }
    }
    ?>
    
    <form action="" class="box" method="post">
        <h1>Sign Up</h1>
        <div class="row">
            <!-- Input fields for registration -->
            <div class="input-data">
                <input class="write" id="f1" type="text" required name="fname">
                <div class="underline"></div>
                <label>First Name</label>
            </div>
            <div class="input-data" style="padding-left: 40px;">
                <input type="text" id="f11" required name="lname">
                <div class="underline"></div>
                <label style="padding-left: 40px;">Last Name</label>
            </div>
        </div>
        </div>
        <div class="column">
        <div class="input-sdata">
                <input type="text" id="f2" required name="username">
                <div class="underline"></div>
                <label>Username</label>
             </div>
             <div class="input-sdata">
                <input type="text" id="f3" required name="email">
                <div class="underline"></div>
                <label>E-mail</label>
             </div>
             <div class="input-sdata">
                <input type="password" id="f4" required name="password" onclick="showPasswordRequirements()">
                <div class="underline"></div>
                <label>Password</label>
                <div id="requirements" class="requirements">
                    <h3>Password Requirements:</h3>
                    <ul>
                    <li><input type="checkbox" id="containsLowercase"> Contains a-z</li>
                        <li><input type="checkbox" id="containsUppercase"> Contains A-Z</li>
                        <li><input type="checkbox" id="containsNumber"> Contains 0-9</li>
                        <li><input type="checkbox" id="containsSpecialChar"> Contains special</ul>
                </div>
             </div>
             <div class="input-sdata">
                <input type="password" id="f5" required name="confirmpassword">
                <div class="underline"></div>
                <label>Password Confirmation</label>
             </div>
        </div>
       <input type="submit" name="submit" value="Register">
    </form>
    
    <script src="script.js"></script>
</body>
</html>
