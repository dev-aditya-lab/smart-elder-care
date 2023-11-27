<!-- php database connection -->
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location:login.php");
}
?>

<?php
include('../conn.php');
error_reporting(0);
$query = 'select * from signup';
$result = mysqli_query($connection, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>admin panel </title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" alt="Logo" width="50pc">
                </a>
                <a href="index.php" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">

                </a>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>
            <!-- <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div> -->

            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>


            <ul class="nav user-menu">

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/logo-0small.png"
                                width="31" alt="Logo"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/logo-0small.png" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Smart Elder Care</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                        </li>
                        <li class="active">
                            <a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="">
                            <a href="users.php"><i class="fe fe-users"></i> <span>Users</span></a>
                        </li>
                        <li class="">
                            <a href="helpers.php"><i class="fe fe-users"></i> <span>Helpers</span></a>
                        </li>
                        <li class="">
                            <a href="payment.php"><i class="fe fe-money"></i> <span>Payment</span></a>
                        </li>
                        <li class="">
                            <a href="con_message.php"><i class="fe fe-messanger"></i> <span>Contect message</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-primary">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a href="" class="count-title">User Count</a>
                                        <a href="" class="count">

                                            <?php
                                            $data = "SELECT * FROM signup where signup_as = 'user'";
                                            $query = mysqli_query($connection, $data);
                                            $total = mysqli_num_rows($query);
                                            echo $total;
                                            ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-warning">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a href="" class="count-title">Helper Count</a>
                                        <a href="" class="count">
                                            <?php
                                            $data = "SELECT * FROM signup where signup_as = 'helper'";
                                            $query = mysqli_query($connection, $data);
                                            $total = mysqli_num_rows($query);
                                            echo $total;
                                            ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-danger">
                                        <i class="fe fe-activity"></i>
                                    </span>
                                    <div class="dash-count">
                                        <a href="" class="count-title">Total registration</a>
                                        <a href="#" class="count"> 
                                        <?php
                                            $data = "SELECT * FROM signup";
                                            $query = mysqli_query($connection, $data);
                                            $total = mysqli_num_rows($query);
                                            echo $total;
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">

                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title float-start">User List</h4>
                                <div class="table-search float-end">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive no-radius">
                                    <table class="table table-hover table-center">
                                        <thead>
                                            <tr>
                                                <th>Signup as</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone No.</th>
                                                <th>DOB</th>
                                                <th>Gender</th>
                                                <th>Street</th>
                                                <th>Landmark</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th class="text-end">zip</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <td>
                                                        <?php echo $row['signup_as']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['f_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['phone']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['dob']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['gender']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['street']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['landmark']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['country']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['city']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['state']; ?>
                                                    </td>
                                                    <td class="text-end">
                                                        <?php echo $row['zip']; ?>
                                                    </td>
                                                </tr>

                                                <?php
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>