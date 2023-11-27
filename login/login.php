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
        <header>Login</header>
        <form action="#" method="POST" class="form">

            <div class="input-box">
                <label>SignUp As</label>
                <div class="select-box">
                    <select name="signup_as" required>
                        <option value="not_selected" hidden>SignUp As</option>
                        <option value="user">User</option>
                        <option value="helper">Helper</option>
                    </select>
                </div>
            </div>

            <div class="input-box">
                <label>phone no</label>
                <input type="number" name="phone_no" placeholder="Number" required />
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label><a href="../sign up/index.php">create an account</a></label>
                </div>
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
if (isset($_POST['login'])) {

    $phone = $_POST['phone_no'];
    $password  = $_POST['password'];
    $su = $_POST['signup_as'];

    $data = "SELECT * FROM signup WHERE phone='$phone' && password='$password'";
    $query = mysqli_query($connection, $data);
    $total = mysqli_num_rows($query);

    if ($total != 0 ) {
        if ($su =='user'){
            header("Location: ../user.php");
        }else{
            header("Location: ../helper.php");
        }
    }  else {
        echo '<script>alert ("Entry is invalid!! Please check your Username and password");</script>';
    }
}



?>