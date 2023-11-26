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
  <title>Sign up</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <section class="container">
    <header>Registration Form</header>
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
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter full name" required />
      </div>

      <div class="input-box">
        <label>Email Address</label>
        <input type="Email" name="email" placeholder="Enter email address" required />
      </div>
      <div class="column">
        <div class="input-box">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" required />
        </div>
        <div class="input-box">
          <label>confirm password</label>
          <input type="password" name="conf_pass" placeholder="Confirm Password" required />
        </div>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Phone Number</label>
          <input type="number" name="phone_no" placeholder="Enter phone number" required />
        </div>
        <div class="input-box">
          <label>Birth Date</label>
          <input type="date" name="dob" placeholder="Enter birth date" required />
        </div>
      </div>

      <div class="input-box">
        <label>Gender</label>
        <div class="select-box">
          <select name="gender" required>
            <option value="not_selected" hidden>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
      </div>

      <div class="input-box address">
        <label>Address</label>
        <input type="text" name="street" placeholder="Enter street address" required />
        <input type="text" name="landmark" placeholder="Landmark " required />
        <div class="column">
          <div class="select-box">
            <select name="country" required>
              <option value="not_selected" hidden>Country</option>
              <option value="America">America</option>
              <option value="japan">Japan</option>
              <option value="India">India</option>
              <option value="Nepal">Nepal</option>
            </select>
          </div>
          <input type="text" name="city" placeholder="Enter your city" required />
        </div>
        <div class="column">
          <input type="text" name="state" placeholder="Enter your state" required />
          <input type="number" name="zip" placeholder="Enter zip code" required />
        </div>
      </div>
      <button type="Submit" class="btn" value="Register" name="Register">Submit</button>
    </form>
  </section>
</body>

</html>

<!-- php database connection -->


<?php
if (isset($_POST['Register'])) {

  $signup_as = $_POST['signup_as'];
  $f_name = $_POST['name'];
  $email  = $_POST['email'];
  $password  = $_POST['password'];
  $con_pass = $_POST['conf_pass'];
  $phone = $_POST['phone_no'];
  $dob  = $_POST['dob'];
  $gender = $_POST['gender'];
  $street = $_POST['street'];
  $landmark = $_POST['landmark'];
  $country = $_POST['country'];
  $city  = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];

  $result = "SELECT * FROM signup WHERE phone = '$phone' AND password = '$password'";
  $none = mysqli_query($connection,$result);
  $no = mysqli_num_rows($none);
  if($no != 0){
    echo '<script>alert("User already exist")</script>';
  }else{
    if( $password != $con_pass ){
      echo '<script>alert("Password do not matched")</script>';
    }else{
      $data = "INSERT INTO signup VALUES('$signup_as' , '$f_name' ,	'$email' ,	'$password' ,	'$con_pass' ,	'$phone' ,	'$dob' ,	'$gender' ,	'$street' ,	'$landmark' ,	'$country' ,	'$city' ,	'$state' ,'$zip')";
      $query = mysqli_query($connection, $data);
      if ($data) {
      echo '<script>alert("Registered Successfully")</script>';
  }else{
    echo '<script>alert("Something Went Wrong!!Please Try Later")</script>';
  }
}
  }
}
 ?>