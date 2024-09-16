<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <!--custom font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .dbox-container {
            overflow-x: auto;
            white-space: nowrap;
        }

        .dbox-wrapper {
            display: inline-block;
            vertical-align: top;
        }

        .dbox {
    display: inline-block;
    width: 200px; /* Increased width to accommodate larger images */
    margin-right: 30px; /* Increased margin for proper spacing */
}

.dbox img {
    max-width: 100%;
    height: 250px; /* Increased height for larger images */
    width: 100%; /* Set width to 100% to maintain aspect ratio */
}


        .doctor-image {
            position: relative;
            overflow: hidden;
        }

        .doctor-details {
            position: absolute;
            bottom: 0;
            left: 100%;
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            transition: left 0.3s ease;
        }

        .dbox:hover .doctor-details {
            left: 0;
        }

    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> MERCY HEALTHY-WEST HOSPITAL </a>
        <nav class="navbar">
            <a href="index.php">Home</a></li>
            <a href="doctor_login.php">Doctor Login</a></li>
            <a href="patient_login.php">Patient Login</a></li>
            <a href="admin_login.php">Administrator Login</a></li>
        </nav>
        <div id="menu-btn>" class="fas fa-bars"></div>
    </header>
    <!---Header section ends----->
    <!----Home section starts----->
    <section class="Home" id="Home">

        <div class="image">
            <img src="images/images1.svg" alt="">
        </div>
        <div class="content">
            <h3>
                Stay Safe Stay Healthy
                <p>With Our team of over 200 doctors join us in giving you the best of modern healthcare to ensure you
                    stay
                    healthy.</p>
                <a href="#" class="btn"> contact us <span class="fas fa-chevron-right"></span> </a>
            </h3>
        </div>
    </section>
    <!---Home section Ends----->
    <!---Icon Section starts-->
    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-user-md"></i>
            <h3>250+</h3>
            <p>Doctors avilable 24/7</p>
        </div>
        <div class="icons">
            <i class="fas fa-users"></i>
            <h3>1500+ </h3>
            <p>Satisfied Patients </p>
        </div>
        <div class="icons">
            <i class="fas fa-procedures"></i>
            <h3>700+</h3>
            <p>Bed Facility </p>
        </div>
        <div class="icons">
            <i class="fas fa-hospital"></i>
            <h3>80+</h3>
            <p>Hospital Branches</p>

        </div>
    </section>
    <!--Icon section Ends--->
    <!---Service section starts-->
    <section class="services" id="services">
        <h1 class="heading"><span>Our</span>Services</h1>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <h3>Low-Fee Checkups</h3>
                <p>You will pay a low fee on your first checkup with .</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>

            <div class="box">
                <i class="fas fa-calendar-check"></i>
                <h3>Online Appointment Booking</h3>
                <p>Book appointments online for your convenience.</p>
                <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <i class="fas fa-hospital-user"></i>
                <h3>Specialized Departments</h3>
                <p>Provide specialized departments for various medical conditions.</p>
                <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <i class="fas fa-heartbeat"></i>
                <h3>Health Check-up Packages</h3>
                <p>Offer comprehensive health check-up packages for individuals and families.</p>
                <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <i class="fas fa-ambulance"></i>

                <h3>24/7 Ambulance</h3>
                <p>24/7 Ambulance facility available with our vast network of ambulance. we ensure fast and safe
                    ambulance service</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
            <div class="box">
                <i class="fas fa-user-md"></i>
                <h3>Expert Doctors </h3>
                <p>Out team of Best Doctors from accross the country to ensure the quality of
                    healthcare we provide.</p>
                <a href="#" class="btn"> learn more<span class="fas fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <i class="fas fa-pills"></i>
                <h3>Medicines</h3>
                <p>We treat patients with government certified medicines and we have stock of all medicines available in
                    the hospital. </p>
                <a href="#" class="btn"> learn more<span class="fas fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <i class="fas fa-procedures"></i>
                <h3>Bed Facility</h3>
                <p>We have a facility of 700+ beds ensuring that every patient gets a bed even in tough times.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>

        </div>
    </section>
    <!---service -section ends here---->

    <!------About section starts here----->
    <section class="about us" id="about">

        <h1 class="heading"><span>About</span> us</h1>
        <div class="row">

            <img src="images2.svg" alt="">

        </div>
        <div class="content">
            <h3>we take care of your healthy life</h3>
            <p> As healthcare finance leaders focus on charting a path forward, they must assess their organization’s
                current financial situation and evaluate how to adapt business strategies prior to COVID-19 demands and
                challenges. Leaders need insights into performance trends across clinical service lines to make both
                tactical and strategic planning decisions.

                For many organizations, this will require more timely feedback across a broader set of key operational
                and clinical stakeholders. To establish an effective feedback loop, organizations need more integrated
                reporting that provides a comprehensive view of service line trends, bringing together market data,
                accurate financial and cost information, and clinical quality and safety measures.</p>

            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <!----About us section ends------>
        <!-----Doctor section starts----->
        <!-----Booking Section Starts------>

        <section class="doctors" id="doctors">

            <h1 class="heading"> meet <span></span>our <span>doctors</span> </h1>

            <p align="center" style="font-size: 15px; font-weight: ;">The experienced Doctors and Surgeons in our Hospitals</p>


            <div class="dbox-container">
                <div class="dbox-wrapper">
                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img1.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Marie Durocher</h3>
                                <span>General Surgeon</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img2.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Charles</h3>
                                <span>Cardiologist</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img3.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Will Griever</h3>
                                <span>Paediatrician</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img4.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Joseph William</h3>
                                <span>Dermatologist</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img6.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr. Emily Stove</h3>
                                <span>Neurologist</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img5.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr. David Anderson</h3>
                                <span>ENT Specialist</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img9.png" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Russel</h3>
                                <span>Orthopedic</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img7.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Anita Jennings</h3>
                                <span>Gynecologist</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img8.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Maria Francisca</h3>
                                <span>Psychiatry</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img-9.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr.Jessica Parker</h3>
                                <span>Paediatrician</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img-11.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr. Catherine Smith</h3>
                                <span>Ophthalmologist</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dbox">
                        <div class="doctor-image">
                            <img src="images/img-12.jpg" alt="">
                            <div class="doctor-details">
                                <h3>Dr. Andrew Wilson</h3>
                                <span>Endocrinologist</span>
                                <div class="share">
                                    <a href="#" class="fab fa-facebook-f"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </section>
            <!----Booking section starts-->

            
            <!-----Booking Section Ends----->

            <!-----Client review-->
            <section class="review" id="review">

                <h1 class="heading"> Review's <span></span> </h1>

                <div class="box-container">

                    <div class="box">
                        <img src="images/img12.jpg" alt="">
                        <h3>John Deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="text">It was very wonderful experience to be there, I was there for delivery of my wife.
                            All staff and Dr are very cooperative and humble specially Dr Neha Sirohi and Dr Himanshu Kumar,
                            even security guards was very cooperative. Food provided by the hospital was very good and
                            hygiene was up to the mark. Cleanliness of hospital was very good. Over all environment of
                            hospital was best. They celebrate baby's Birthday, it was surprise for us. Thankyou ❤️ Highly
                            recommended
                        </p>
                    </div>

                    <div class="box">
                        <img src="images/img11.jpg" alt="">
                        <h3>Jessica Anderson</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="text">Very good service.
                            Emergency room always busy as with any hospital which makes for great experience. Management can
                            be better trained and more organized. The workers are full of life and willing to help each
                            other. The emergency room doctors and nurse staff are amazing with patients and patient care.
                            Hospital liaisons are great also. </p>
                    </div>

                    <div class="box">
                        <img src="images/img13.jpg" alt="">
                        <h3>Steven Taylor</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="text">Very experienced doctor and highly sophisticated environment. Good patient care. And
                            helpful staff. Overall very good experience</p>
                    </div>
                </div>

        </section>

        <!-- review section ends -->


        <!-- footer section starts  -->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>quick links</h3>
                    <a href="#"> <i class="fas fa-chevron-right"></i> home </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> services </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> about </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> doctors </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> book </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> review </a>
                </div>
                <div class="box">
                    <h3>Services</h3>
                    <a href="#"> <i class="fas fa-chevron-right"></i> Skin care </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> Mental Health </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> cardiology </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
                    <a href="#"> <i class="fas fa-chevron-right"></i> ambulance service </a>
                </div>
                <div class="box">
                    <h3>contact info</h3>
                    <a href="#"> <i class="fas fa-phone"></i> +1 564-567-890 </a>
                    <a href="#"> <i class="fas fa-phone"></i> +1 6203342454 </a>
                    <a href="#"> <i class="fas fa-envelope"></i> mercyhealthywest11@gmail.com </a>
                    <a href="#"> <i class="fas fa-envelope"></i> mercyhealthywest11@gmail.com</a>
                    <a href="#"> <i class="fas fa-map-marker-alt"></i> 3300 Mercy Health Blvd.
                        Cincinnati, Ohio 45211</a>
                </div>
                <div class="box">
                    <h3>Social Media Handles</h3>
                    <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                    <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                    <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                </div>
            </div>
        </section>
        <script src="Hospital.js"></script>


</body>

</html>