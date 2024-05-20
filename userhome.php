<?php

    require 'userheader.php'

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .card-img-top:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease;

        }
        .about-section {
          background-color: #f8f9fa;
          padding: 50px 0;
        }

    </style>

   
</head>
<body>

    <main>
        <section id="hero" class="py-5 text-center text-white bg-primary">
            <div class="container">
                <!-- <img src="image/inventory.png" class="width:100px"> -->
                <h1 class="display-4">WELCOME TO NU-SET INVENTORY SYSTEM</h1>
                <a href="#about" class="btn btn-light btn-lg">Learn More</a>
            </div>
        </section>
        <section id = "about" class="about-section">
          <div class="container">
            <div class="row">
              <div class="col-lg-10 mx-auto">
                <h2 class="text-center bg-info">About Us</h2>
                <p>We are a leading provider of inventory management solutions for computer, laptop, and printer businesses. Our system allows you to efficiently track your inventory, manage stock levels, and streamline your operations.</p>
                <p>With our user-friendly interface and robust features, you can easily add new products, update quantities, and generate detailed reports to gain insights into your inventory performance.</p>
                <p>Whether you're a small business or a large enterprise, our inventory system is designed to meet your needs and help you stay organized and efficient.</p>
              </div>
            </div>
          </div>
        </section>

        <section id="Departments" class="py-5 bg-light">
            <div class="container">
                <h2 class="display-4 text-center bg-info mb-4">Departments</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/agriimg.jpg" class="card-img-top" alt="Agri Image">
                            <div class="card-body">
                                <h5 class="card-title">AGRI Department</h5>
                                <p class="card-text">Information about AGRI Department.</p>
                                <a href="admin/aetdept/userviewall.php" class="btn btn-primary">Go to AGRI Department</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/bioimg.jpg" style="height:250px" class="card-img-top" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">BIOTECH Department</h5>
                                <p class="card-text">Information about BIOTECH Department.</p>
                                <a href="admin/btdept/userhome.php" class="btn btn-primary">Go to BIOTECH Department</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/cseimg1.png" class="card-img-top" style="height:250px" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">CSE Department</h5>
                                <p class="card-text">Information about CSE Department.</p>
                                <a href="admin/csedept/userhome.php" class="btn btn-primary">Go to CSE Department</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/eceimg.jpg" class="card-img-top" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">ECE Department</h5>
                                <p class="card-text">Information about ECE Department.</p>
                                <a href="admin/ecedept/userhome.php" class="btn btn-primary">Go to ECE Department</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/itimg.jpg" class="card-img-top" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">IT Department</h5>
                                <p class="card-text">Information about IT Department.</p>
                                <a href="admin/itdept/userhome.php" class="btn btn-primary">Go to IT Department</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="contact" class="py-5">
            <div class="container">
                <h2 class="display-4 mb-4">Contact Us</h2>
                <p>Email:<i class="fa-solid fa-envelope"></i> <a href="mailto:yingathungk@gmail.com">yingathungk@gmail.com</a></p>
                <p>Phone: <a href="tel:+916909811459">+91 6909811459</a></p>
            </div>
        </section>

    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <?php
            require 'footer.php';
    ?>
</body>
</html>
