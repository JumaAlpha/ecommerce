<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - IT Solutions</title>
    <link rel="stylesheet" href="main.css">
    <style>
        
        .contact-section {
            padding: 50px 20px;
            text-align: center;
        }

        .contact-section h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .contact-section p {
            font-size: 18px;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .contact-form {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .contact-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <span>IT_SOLUTIONS</span>
        </div>
        <div class="nav_Bar">
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="aboutus.html">About</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="contactus.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="contact-section">
        <h2>Contact Us</h2>
        <p>
            Have questions or inquiries? Feel free to reach out to us. Our team is here to assist you with any
            information or support you may need. You can also email us directly at
            <a href="mailto:support@itsolutions.com">support@itsolutions.com</a>.
        </p>
        <div class="contact-form">
            <form action="#" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 IT Solutions. All rights reserved.</p>
            <p>Solutions For all</p>
        </div>
    </footer>
</body>

</html>