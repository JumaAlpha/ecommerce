<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Solutions</title>
    <link rel="stylesheet" href="main.css">
    <style>
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 280px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-info {
            margin: 10px 0;
        }

        .product-info h3 {
            font-size: 20px;
            color: #333;
        }

        .product-info p {
            font-size: 16px;
            color: #555;
        }

        .product-info .description {
            color: #777;
            font-size: 14px;
            margin-top: 10px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .product-actions button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-actions button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <span class="logo">IT_SOLUTIONS</span>
        </div>
        <div class="nav_Bar">
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="main">
        <div class="banner">
            <div class="banner-text">
                <span>M</span>
                <span>E</span>
                <span>E</span>
                <span>T</span>
                <span> </span>
                <span>I</span>
                <span>T</span>
                <span>_</span>
                <span>S</span>
                <span>O</span>
                <span>L</span>
                <span>U</span>
                <span>T</span>
                <span>I</span>
                <span>O</span>
                <span>N</span>
                <span>S</span>
            </div>
        </div>

        <div class="services">
            <div class="service hardware">
                <div class="title" style="color: aliceblue;">HARDWARE</div>
                <div class="body">
                    <p>Our hardware services encompass a wide range of solutions, from procurement and installation to
                        maintenance and upgrades. We specialize in providing robust hardware infrastructure tailored to
                        your business needs, ensuring reliability and performance.</p>
                    <p>Whether you require network components, servers, workstations, or peripherals, our expert team
                        ensures seamless integration and support throughout the lifecycle of your hardware assets.</p>
                </div>
            </div>

            <div class="service software">
                <div class="title">SOFTWARE</div>
                <div class="body">
                    <p>Our software services focus on delivering tailored solutions to enhance your operational
                        efficiency and business agility. From custom application development to software implementation
                        and support, we provide comprehensive solutions across various platforms.</p>
                    <p>Whether you need enterprise software solutions, web applications, or mobile apps, our experienced
                        developers and consultants are dedicated to meeting your unique business requirements with
                        scalable and innovative software solutions.</p>
                </div>
            </div>

            <div class="service consultancy">
                <div class="title">IT CONSULTANCY</div>
                <div class="body">
                    <p>Our IT consultancy services offer strategic guidance and expertise to optimize your IT
                        infrastructure and align technology with your business objectives. We provide advisory services,
                        IT project management, and IT strategy development to help you leverage technology effectively.
                    </p>
                    <p>From IT risk assessment to digital transformation initiatives, our consultants work closely with
                        your team to identify opportunities for improvement, implement best practices, and achieve
                        sustainable growth through technology.</p>
                </div>
            </div>
        </div>

        <div class="products-section">
            <h2>Available Products</h2>
            <div class="products-container">
                <?php
                include('config.php'); // Include database connection file

                // Fetch products from the database
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    // Loop through and display each product
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                <div class="product-card">
                    <div class="product-image">
                        <img src="' . $row['image_url'] . '" alt="' . $row['name'] . ' Image">
                    </div>
                    <div class="product-info">
                        <h3>' . $row['name'] . '</h3>
                        <p><strong>Model:</strong> ' . $row['model'] . '</p>
                        <p><strong>Price:</strong> $' . $row['price'] . '</p>
                        <p class="description">' . $row['description'] . '</p>
                    </div>
                    <div class="product-actions">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="view-details">View Details</button>
                    </div>
                </div>';
                    }
                } else {
                    echo "<p>No products available at the moment.</p>";
                }
                ?>
            </div>
        </div>

        <section id="about">
            <div class="popup">
                <div class="popup-content">
                    <h2>About IT Solutions</h2>
                    <p>IT Solutions is dedicated to providing cutting-edge technology solutions for businesses worldwide.
                    </p>
                    <p>Our team of experts is committed to delivering innovative software and hardware solutions tailored to
                        meet your unique business needs.</p>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="popup">
                <div class="popup-content">
                    <h2>Contact Us</h2>
                    <p>Have questions or inquiries? Contact our support team at support@itsolutions.com</p>
                </div>
            </div>
        </section>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 IT Solutions. All rights reserved.</p>
            <p>Solutions For all</p>
        </div>
    </footer>
</body>

</html>