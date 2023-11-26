<!-- php database connection -->
<?php
include('conn.php');
error_reporting(0);
?>
<!-- html code -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Payment Details</title>
  <link rel="stylesheet" href="sign up/style.css" />
</head>

<body>
  <section class="container">
    <header>Payment Details</header>
    <form action="#" class="form" method="POST">
      <div class="input-box">
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter full name" required />
      </div>

      <div class="input-box">
        <label>Email Address</label>
        <input type="Email" name="email" placeholder="Enter email address" required />
      </div>

      <div class="input-box">
        <label>Phone No.</label>
        <input type="number" name="phone_no" placeholder="Enter Phone Number" required />
      </div>

      <div class="input-box">
        <label>UPI ID</label>
        <input type="text" name="upi" placeholder="Enter Your Upi (Ex:- 12365479@upi)" required />
      </div>

      <div class="input-box">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <button type="Submit" class="btn" value="submit" name="submit">Submit</button>
    </form>
  </section>
</body>

</html>

<!-- php database connection -->


<?php
if (isset($_POST['submit'])) 
{

  $f_name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone_no'];
  $upi = $_POST['upi'];
  $password = $_POST['password'];


  $login_data = "SELECT * FROM signup WHERE phone='$phone' && password='$password'";
  $login_query = mysqli_query($connection, $login_data);
  $login_total = mysqli_num_rows($login_query);


  $result = "SELECT * FROM payment_d WHERE phone = '$phone' or email = '$email'";
  $none = mysqli_query($connection, $result);
  $no = mysqli_num_rows($none);


  $data = "INSERT INTO `payment_d` (`f_name`, `email`, `phone_no`, `upi`, `password`) VALUES ('$f_name' , '$email' , '$phone' , '$upi' , '$password');";


  if ($login_total == 0) 
  {
    echo '<script>alert("check your phone and password")</script>';
  } else 
  {
    if ($no != 0) 
    {
      echo '<script>alert("your email or phone no is already exists")</script>';
    } else 
    {
      $query = mysqli_query($connection, $data);
      echo '<script>alert("payment Infomation submited Successfully")</script>';
    }
  }
}

?>