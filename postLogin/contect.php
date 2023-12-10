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
  <link rel="stylesheet" href="../sign up/style.css" />
</head>

<body>
    <section class="container">
        <header>Contact us</header>
        <form action="#" method="POST" class="form">

            <div class="input-box">
                <label>Name</label>
                <input type="text" name="name" placeholder="Enter your name" required />
            </div>
            
            <div class="input-box">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your Email" required />
            </div>

            <div class="input-box">
                <label>Phone no</label>
                <input type="number" name="phone_no" placeholder="Number" required maxlength="12"/>
            </div>
            
            <div class="input-box">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required maxlength="50"/>
            </div>
            
            <div class="input-box">
                <label>Message</label><br>
                <textarea name="message" placeholder="Enter Your Message" style="height: 50px;width: 100%; outline: none;font-size: 1rem;color: #707070;margin-top: 8px;border: 1px solid #ddd;border-radius: 6px;padding: 0 15px;" maxlength="500" required></textarea>
                <p style="text-align: right; font-size: .7rem; color: lightgray;">Mex:500 character</p>
            </div>

           


            <button type="Submit" class="btn" value="send" name="send">Send</button>
        </form>
    </section>
</body>
</html>


<!-- php database connection -->


<?php
  if (isset($_POST['send'])) {

    $f_name = $_POST['name'];
    $email  = $_POST['email'];
    $phone = $_POST['phone_no'];
    $subject  = $_POST['subject'];
    $message  = $_POST['message'];

      $data = "INSERT INTO contact VALUES('$f_name' , '$email' , '$phone' ,	'$subject' , '$message' )";
      $query = mysqli_query($connection, $data);
      if ($data) {
      echo '<script>alert("Message Send Successfully")</script>';
     }
  }
?>
