<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    uploadData();
}

function uploadData() {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $credit = $_POST['credit'];
        $cvc = $_POST['cvc'];
    }
//tulung sesuaikan nama dalam kurung sama nama tabel di databasenya

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dbmebel";//kasih nama sesuai database

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die('Server tidak terhubung: ' . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($conn, $name);
    $credit = mysqli_real_escape_string($conn, $credit);
    $cvc = mysqli_real_escape_string($conn, $cvc);
//insert into itu nama tabelnya

    $sql = "INSERT INTO `payment` (`name`, `credit`, `cvc`) VALUES ('$name', '$credit', '$cvc')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Payment has been recorded!')</script>";
        echo "<script>window.location = 'payment.php''</script>";
    } else {
        echo "<script>alert('Payment has not been recorded!')</script>";
        echo "<script>window.location = 'payment.php''</script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/payment.css">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <section id="header">
        <div class="header header">
            <div class="header-1">
                <a href="Homepage.html" class="logo">
                    <img src="../Images/logo.png" alt="Logo" width="100">
                </a>

                <form action="" class="search-form">
                    <input type="search" name="" placeholder="search here..." id="search-box">
                    <label for="search-box" class="fas fa-search"></label>
                </form>

                <div class="icons">
                    <div id="search-btn" class="fas fa-search"></div>
                    <a href="Wishlist.php" class="fa-regular fa-heart"></a>
                    <a href="#" class="fa-solid fa-cart-plus"></a>
                    <a href="../../Account.php" class="fa-regular fa-user"></a>
                </div>
            </div>

            <div class="header-2">
                <nav class="navbar">
                    <a href="../Homepage.html">HOME</a>
                    <a href="produk.php">SHOP</a>
                    <a href="../AboutUs.html">ABOUT US</a>
                    <a href="contact.php">CONTACT</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- contact -->
    <section class="contact">
        <div class="content">
            <h2>Payment</h2>
        </div>
        <div class="container">
            <div class="contactForm">
                <form method="POST" action="">
                    <h2>Payment Details</h2>
                    <div class="inputBox">
                        <input type="text" name="name" id="name" required="required">
                        <span>Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="credit" id="credit" required="required">
                        <span>Credit Card No</span>
                    </div>
                    <div class="inputBox">
                        <input type="number" name="cvc" id="cvc" required="required" max="999" min="0">
                        <span>CVC</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- footer -->
    <div class="footer">
        <div class="footer-left">
            <div class="footer-logo">
                <img src="../Images/logo.png" alt="Logo">
            </div>
            <div>
                <p>Email: example@example.com</p>
                <br>
                <p>Alamat: Jalan Contoh No. 123</p>
                <br>
                <p>Nomor HP: 08123456789</p>
            </div>
        </div>
        
        <div class="footer-center">
            <div class="useful-links">
                <h4>Useful Links</h4>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Blog</a>
            </div>
            <div class="idea-advice">
                <h4>Idea & Advice</h4>
                <a href="#">Reviews</a>
                <a href="#">Get Design Help</a>
                <a href="#">Material Care</a>
            </div>
        </div>

        <div class="footer-right">
            <div class="payment-methods">
                <h4>Payments Method</h4>
                <img src="../Images/pay.png" alt="pay">
            </div>
        </div>
    </div>
</body>
</html>
