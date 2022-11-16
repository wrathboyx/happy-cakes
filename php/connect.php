<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connect.css">
    <link rel="icon" href="../img/iconcake.png">
    <title>Happy Cakes</title>
</head>

<body>
    <!-- CSS NAVBAR -->
    <nav class="navigation">
        <img src="../img/logo2.jpeg" class="logo" align="center">
        <li class="header"><a href="../html/index.html">
                <h2>Happy Cakes</h2>
            </a></li>

        <ul class="navbar">
            <li><a href="../html/index.html">Home</a></li>
            <li><a href="#">Menu</a>
                <ul class="drop-down">
                    <li><a href="#">Appetizer</a></li>
                    <li><a href="#">Main Course</a></li>
                    <li><a href="#">Side Dish</a></li>
                    <li><a href="#">Dessert</a></li>
                </ul>
            </li>
            <li><a href="../html/about.html">About</a>
            <li><a href="../html/contactus.html">Contact Us</a></li>
        </ul>
    </nav>
    <br><br><br><br><br><br><br>

    <!-- PHP -->
    <section class="section-contact">
        <div class="container-form">
            <h1>
                <?php

                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                # Connect To Database Xampp
                $conn = new mysqli('localhost','root','','happycake');
                if($conn->connect_error){
                    die('Connection Failed ... '.$conn->connect_error);
                }else{
                    $stmt = $conn->prepare("insert into contactus(name, email, subject, message)
                    values(?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $name, $email, $subject, $message);
                    $stmt->execute();
                    echo "The message has been sent <br> Thank you $name";
                    $stmt->close();
                    $conn->close();
                }

                ?>
            </h1>
        </div>
    </section>
    <!-- Footer -->
    <section class="footer">
        <ul class="list">
            <li><a href="../html/index.html">Home</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="../html/about.html">About</a></li>
            <li><a href="../html/contactus.html">Contact Us</a></li>
        </ul>
        <p class="copyright">
            Copyright @2022, All Right Reserved
        </p>
    </section>
</body>

</html>