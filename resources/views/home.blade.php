<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>ShowVibes Movie</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400&family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
</head>

<style>
    * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

.header {
    min-height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url(img/header-nav.jpeg);
    background-position: center;
    background-size: cover;
    position: relative;
}

nav {
    display: flex;
    padding: 2% 6%;
    justify-content: space-between;
    align-items: center;
}

nav img {
    width: 150px;
}

.nav-links {
    flex: 1;
    text-align: right;
}

.nav-links ul li {
    list-style: none;
    display: inline-block;
    padding: 8px 12px;
    position: relative;
}

.nav-links ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 15px;
}

.nav-links ul li::after {
    content: '';
    width: 0%;
    height: 2px;
    background: #A9A9A9;
    display: block;
    margin: auto;
    transition: 0.2s;
}

.nav-links ul li:hover::after {
    width: 100%;
}

.text-box {
    width: 90%;
    color: #fff;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.text-box h1 {
    font-size: 62px;
}

.text-box p {
    margin: 10px 0 40px;
    font-size: 18px;
    color: #fff;
}

.hero-btn {
    display: inline-block;
    text-decoration: none;
    color: #fff;
    border: 1px solid #fff;
    padding: 12px 34px;
    font-size: 13px;
    background: transparent;
    position: relative;
    cursor: pointer;
}

.hero-btn:hover {
    border: 1px solid #A9A9A9;
    background: #A9A9A9;
    transition: 0.5s;
}

nav .fa {
    display: none;
}

@media(max-width: 700px) {
    .text-box h1 {
        font-size: 20px;
    }
    .nav-links ul li {
        display: block;
    }
    .nav-links {
        position: absolute;
        background: #A9A9A9;
        height: 100vh;
        width: 200px;
        top: 0;
        right: -200px;
        text-align: left;
        z-index: 2;
        transition: 1s;
    }
    nav .fa {
        display: block;
        color: #fff;
        margin: 10px;
        font-size: 22px;
        cursor: pointer;
    }
    .nav-links ul {
        padding: 30px;
    }
}

/* Course */
.course {
    width: 80%;
    margin: auto;
    text-align: center;
    padding-top: 100px;
}

h1 {
    font-size: 36px;
    font-weight: 600;
}

p {
    color: #777;
    font-size: 14px;
    font-weight: 300;
    line-height: 22px;
    padding: 10px;
}

.row {
    margin-top: 5%;
    display: flex;
    justify-content: space-between;
}

.course-col {
    flex-basis: 45%;
    background: #fff3f3;
    border-radius: 10px;
    margin-bottom: 5%;
    padding: 20px 12px;
    box-sizing: border-box;
    transition: 0.5s;
}

h3 {
    text-align: center;
    font-weight: 600;
    margin: 10px 0;
}

.course-col:hover {
    box-shadow: 0 0 20px 0px rgba(0,0,0,0.2);
}

@media(max-width: 700px) {
    .row {
        flex-direction: column;
    }
}

/* Campus */
.movie {
    width: 80%;
    margin: auto;
    text-align: center;
    padding-top: 50px;
}

.movie-col {
    flex-basis: 32%;
    border-radius: 10px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.movie-col img {
    width: 100%;
    display: block;
}

.layer {
    background: transparent;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    transition: 0.5s;
}

.layer:hover {
    background: rgb(169, 169, 169);
}

.layer h3 {
    width: 100%;
    font-weight: 500;
    color: #fff;
    font-size: 26px;
    bottom: 0;
    left: 50%;
    transform: translate(-50%);
    position: absolute;
    opacity: 0;
    transition: 0.5s;
}

.layer:hover h3 {
    bottom: 49%;
    opacity: 1;
}

/* Contact */
.contact {
    margin: 100px auto;
    width: 80%;
    background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(img/contactus.jpg);
    background-position: center;
    background-size: cover;
    border-radius: 10px;
    text-align: center;
    padding: 100px 0;
}

.contact h1 {
    color: #fff;
    margin-bottom: 40px;
    padding: 0;
}

/* Footer */
.footer {
    width: 100%;
    text-align: center;
    padding: 30px 0;
}

.footer h4 {
    font-size: 30px;
    margin-bottom: 25px;
    margin-top: 20px;
    font-weight: 600;
}

.footer p {
    margin-left: 15%;
    margin-right: 15%;
}
</style>

<body>
    <section class="header">
    <nav>
        <a href="index.php"><img src=""></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="#course">HOME</a></li>
                <li><a href="#contact">ABOUT</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <div class="text-box">
        <h1>The World Biggest Movie</h1>
        <p>Find out your movie just for a second!<br>Enjoy this website. If you interested this website<br>You have to:</p>
        <a href="#" class="hero-btn">Login First</a>
    </div>

    </section>
    
    <!-- Course -->
    <section class="course" id="course">
        <h1>The Options I Show</h1>
        <p>Some options you can find in this website</p>

        <div class="row">
            <div class="course-col">
                <h3>Movie's Photo</h3>
                <p>You can see photos if you login that website.</p>
            </div>
            <div class="course-col">
                <h3>Description</h3>
                <p>You can see the description if you login that website.</p>
            </div>
        </div>

    </section>

    <!-- Campus -->
    <section class="movie" id="movie">
        <h1>The Spoiler That I Can Show You</h1>
        <p>This viral movie will make you more interest with this website</p>
    
        <div class="row">
            <div class="movie-col">
                <img src="img/godzilla.jpeg">
                <div class= "layer">
                    <h3>AVENGERS</h3>
                </div>
            </div>
            <div class="movie-col">
                <img src="img/godzilla.jpeg">
                <div class= "layer">
                    <h3>AVENGERS</h3>
                </div>
            </div>
            <div class="movie-col">
                <img src="img/godzilla.jpeg">
                <div class= "layer">
                    <h3>AVENGERS</h3>
                </div>
            </div>
        

    </section>

    <!-- Contact -->
    <section class="contact" id="contact">
        <h1>If you want to join this website, <br> You can contact us:</h1>
        <a href="#" class="hero-btn">In here!</a>
    </section>

    <!-- Footer -->
    <section class="footer">
        <h4>About Us</h4>
        <p>Thankyou so much for visiting my website, i hope this website doesn't disappoint you, and i hope that you'll like my website a lot.
            <br>Dont forget to visit this website again, i'll keep waiting!
        </p>
        <p>Copyright @2023-2024 | Made by Vibes Team</p>
    </section>


    <!-- JavaScript for Toggle Menu -->
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>

</body>
</html>