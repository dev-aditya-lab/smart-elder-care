<!-- php database connection -->
<?php
include('../conn.php');
error_reporting(0);
?>

<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login up</title>
    <link rel="stylesheet" href="../sign up/style.css" />
</head>

<body>
    <section class="container">
        <header>Admin Login</header>
        <form action="#" method="POST" class="form">

            <div class="input-box">
                <label>phone no</label>
                <input type="text" name="username" placeholder="Username" required autocomplete="off"/>
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label><a href="#">Forget Password?</a></label>
                </div>
            </div>


            <button type="Submit" class="btn" value="login" name="login">Login</button>
        </form>
    </section>
</body>

</html>


<!-- php database connection -->

<?php
// if (isset($_POST['login'])) {

//     $username = $_POST['username'];
//     $password  = $_POST['password'];

//     $data = "SELECT * FROM admin WHERE phone='$username' && password='$password'";
//     $query = mysqli_query($connection, $data);
//     $total = mysqli_num_rows($query);

//     echo $data;
//     if ($total ==0){
//         echo 'script>alert ("Entry is invalid!! Please check your Username and password");</script>';
//     }
//      if ($total != 0 ) {
//              header("Location: index.php");
//      }  else {
//          echo '<script>alert ("Entry is invalid!! Please check your Username and password");</script>';
//      }
// }



?>


<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check if the user exists
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        // User exists, redirect to index.php
        // echo 'login successfully';
         session_start();
         $_SESSION['username'] = $username;
         header('location: index.php');
        exit();
    } else {
        // User not found, display an error message
        echo "Invalid username or password. Please try again.";
    }

}
?>