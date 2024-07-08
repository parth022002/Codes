<?php
session_start();
include 'components/_dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- logo -->
    <link rel="icon" href="/PHP/Project 3 Forum/images/icons.png" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa;
        }

        .ftco-section {
            padding: 2em 0;
        }

        .wrapper {
            display: flex;
            background: #343a40;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .contact-wrap,
        .info-wrap {
            width: 100%;
            padding: 40px;
        }

        .contact-wrap {
            background: #343a40;
            color: white;
        }

        .info-wrap {
            background: #1d2124;
            color: white;
        }

        .contactForm .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .contactForm .form-control {
            background: none;
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            color: white;
            padding: 10px 0;
        }

        .contactForm .form-control:focus {
            border-color: #f8b133;
            box-shadow: none;
        }

        .contactForm input::placeholder,
        .contactForm textarea::placeholder {
            color: #ced4da;
        }

        .contactForm .btn-primary {
            background: #f8b133;
            border: none;
            padding: 10px 20px;
        }

        .contactForm .btn-primary:hover {
            background: #e6a019;
        }

        .info-wrap h3 {
            color: #f8b133;
        }

        .info-wrap .dbox {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info-wrap .icon {
            background: #f8b133;
            color: white;
            padding: 15px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .info-wrap .text {
            color: #ced4da;
        }

        .info-wrap a {
            color: #ced4da;
            text-decoration: none;
        }

        .info-wrap a:hover {
            color: white;
        }
    </style>
</head>

<body>
    <?php include 'components/_nav.php'; ?>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Contact Us</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4 py-5">
                                    <h3 class="mb-4">Write us</h3>
                                    <div id="form-message-warning" class="mb-4" style="display:none;"></div>
                                    <div id="form-message-success" class="mb-4" style="display:none;">
                                        Your message was sent, thank you!
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                        placeholder="Subject" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="message" cols="30"
                                                        rows="6" placeholder="Message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary" />
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-md-5 p-4 py-5 img">
                                    <h3>Contact information</h3>
                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span> <a
                                                    href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/_footer.php'; ?>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function () {
            $("#contactForm").validate({
                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "contact_form_handler.php",
                        data: $(form).serialize(),
                        success: function (response) {
                            $("#form-message-success").fadeIn().text(response);
                            $("#form-message-warning").fadeOut();
                            $("#contactForm")[0].reset();
                        },
                        error: function () {
                            $("#form-message-warning").fadeIn().text("Something went wrong. Please try again.");
                            $("#form-message-success").fadeOut();
                        },
                    });
                },
            });
        });
    </script>
</body>

</html>