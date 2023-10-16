<?php
  session_start();

  include "koneksi.php";

  $username = $_SESSION['username'];

  $sql = "SELECT * FROM user WHERE username='$username'";

  $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Website Sepatu</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="#about-us">About Us</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="index.php" class="logout">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="banner">
    
      <h1>Welcome <i><?php echo $_SESSION['name'] ?></i> to Dream Shoes</h1>
      <p>Find your perfect pair of shoes for any occasion.</p>
      <a href="#product" class="btn">Shop Now</a>
    </section>

    <section class="featured-products" id="product">
      <h2>Featured Products</h2>
    </section>
    <section class="featured-products">
      <div class="product">
        <img src="img/nike_bj.jpeg" alt="Product 1">
        <h3>Nike Blazzer</h3>
        <p>Rp.1.500.000</p>        
      </div>
      <div class="product">
        <img src="img/nike_af1.jpeg" alt="Product 2">
        <h3>Nike Air Force 1</h3>
        <p>Rp1.800.000</p>        
      </div>
      <div class="product">
        <img src="img/1.jpg" alt="Product 3">
        <h3>Nike Dunk Reverse Panda</h3>
        <p>Rp2.000.000</p>        
      </div>
    </section>

    <section class="about-us" id="about-us">
      <h2>About Us</h2>
      <p>Dream Shoes is a Retailer that sells various Brands Of Shoes. Dream Shoes Since At 2023. Here we sell various Brands Of Shoes that can be purchased from various circles.</p>
    </section>

    <section class="contact" id="contact">
      <h2>Contact Us</h2>
      <form action="#" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" class="form-control" required></textarea>
        <button type="submit">Send Message</button>
      </form>
    </section>
  </main>

  <footer>
    <p>Copyright &copy; 2023 Dream Shoes.</p>
  </footer>
</body>
</html>
