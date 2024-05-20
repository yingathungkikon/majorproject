<?php
    require 'header.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        #welcome {
            background-image: url('image/inventory.png'); /* Path to your image */
            background-size: cover; /* Ensure the image covers the entire section */
            background-position: center; /* Center the background image */
        }

        .card-img-top:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease;

        }
        .about-section {
          background-color: #f8f9fa;
          padding: 50px 0;
        }
        .heading {
            padding: 10px 20px; 
            font-size: 24px; 
            transform: perspective(500px) rotateY(0deg);
            animation: rotateIn 3s ease-in-out forwards;
        }


        @keyframes rotateIn {
            from {
                transform: perspective(500px) rotateY(-180deg);
            }
            to {
                transform: perspective(500px) rotateY(0deg);
            }
        }

        .about-content {
            display: flex;
            align-items: center;
        }

        .about-image {
            flex: 0 0 auto;
            margin-right: 20px;
        }

        .about-text {
            flex: 1;
        }


        .line-by-line span {
            display: inline-block;
            opacity: 0;
            transform: rotateY(90deg);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
            margin-right: 5px; 
        }

        .line-by-line span.show {
            opacity: 1;
            transform: rotateY(0); 
        }
        .animated-text span {
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

    </style>

</head>
<body>
    <main>
        <section id="welcome" class="py-5 text-center text-white bg-primary">
            <div class="container">
                <h1 class="line-by-line">WELCOME TO NU-SET INVENTORY SYSTEM</h1>
                <a href="#about" class="btn btn-light btn-lg">Learn More</a>
            </div>
        </section>


        <section id="about" class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                    <h2 class="text-center bg-info heading">About Us</h2>
                        <div class="about-content">
                            <div class="about-image">
                                <img src="image/aboutus.jpg" alt="About Us Image">
                            </div>
                            <div class="about-text">
                                <div class="line-by-line">
                                    <p>We are a leading provider of inventory management solutions for computer, laptop, and printer businesses.</p>
                                    <p>Our system allows you to efficiently track your inventory, manage stock levels, and streamline your operations.</p>
                                    <p>With our user-friendly interface and robust features, you can easily add new products, update quantities, and generate detailed reports to gain insights into your inventory performance.</p>
                                    <p>Whether you're a small business or a large enterprise, our inventory system is designed to meet your needs and help you stay organized and efficient.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="Departments" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center bg-info mb-4 heading">Departments</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/agriimg.jpg" class="card-img-top" alt="Agri Image">
                            <div class="card-body">
                                <h5 class="card-title">AGRI Department</h5>
                                <p class="card-text">Information about AGRI Department.</p>
                                <a href="admin/aetdept/home.php" class="btn btn-primary">Go to AGRI Department</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/bioimg.jpg" style="height:250px" class="card-img-top" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">BIOTECH Department</h5>
                                <p class="card-text">Information about BIOTECH Department.</p>
                                <a href="admin/btdept/home.php" class="btn btn-primary">Go to BIOTECH Department</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/cseimg1.png" class="card-img-top" style="height:250px" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">CSE Department</h5>
                                <p class="card-text">Information about CSE Department.</p>
                                <a href="admin/csedept/home.php" class="btn btn-primary">Go to CSE Department</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/eceimg.jpg" class="card-img-top" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">ECE Department</h5>
                                <p class="card-text">Information about ECE Department.</p>
                                <a href="admin/ecedept/home.php" class="btn btn-primary">Go to ECE Department</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="image/itimg.jpg" class="card-img-top" alt="Biotech Image">
                            <div class="card-body">
                                <h5 class="card-title">IT Department</h5>
                                <p class="card-text">Information about IT Department.</p>
                                <a href="admin/itdept/home.php" class="btn btn-primary">Go to IT Department</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="contact" class="py-5">
            <div class="container">
                <h2 class="bg-info text-center heading mb-4">Contact Us</h2>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="card my-3">
                            <img src="image/mypic.jpg" style="height:300px" class="card-img-top" alt="Contact Image">
                            <div class="card-body">
                                <h5 class="card-title">Contact Information</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="email"><i class="fa fa-envelope mr-2"></i>Email:</label>
                                        <a href="mailto:yingathungk@gmail.com">yingathungk@gmail.com</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"><i class="fa fa-phone-square mr-2"></i>Phone:</label>
                                        <a href="tel:+916909811459">+91 6909811459</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="image/mypic.jpg" style="height:300px" class="card-img-top" alt="Contact Image">
                            <div class="card-body">
                                <h5 class="card-title">Contact Information</h5>
                                <form>
                                    <div class="form-group">
                                        <label for="email"><i class="fa fa-envelope mr-2"></i>Email:</label>
                                        <a href="mailto:yingathungk@gmail.com">kobhu@gmail.com</a>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"><i class="fa fa-phone-square mr-2"></i>Phone:</label>
                                        <a href="tel:+916909811459">+91 6909811459</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const paragraphs = document.querySelectorAll('.line-by-line p');
            let delay = 0;

            paragraphs.forEach(paragraph => {
                const words = paragraph.innerText.split(' ');
                paragraph.innerHTML = ''; 

                words.forEach((word, index) => {
                    const span = document.createElement('span');
                    span.innerText = word;
                    paragraph.appendChild(span);

                    setTimeout(() => {
                        span.classList.add('show');
                    }, delay);
                    delay += 200; 
                });
                const spaces = paragraph.querySelectorAll('span');
                spaces.forEach((span, index) => {
                    if (index !== spaces.length - 1) {
                        const space = document.createElement('span');
                        space.innerHTML = '&nbsp;';
                        paragraph.insertBefore(space, span.nextSibling);
                    }
                });
            });
        });

    </script>

    <?php
            require 'footer.php';
    ?>

</body>
</html>
