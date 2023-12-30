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
    padding: 20px;
    margin: 0 auto;
}

.text-box h1 {
    font-size: 50px;
}

.text-box p {
    margin: 10px 0 20px;
    font-size: 30px;
    line-height: 1.5;
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
    background: #a9a9a9;
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

/* Slider */
.slider {
    width: 100%;
    max-height: 100%;
    overflow: hidden;
}

.slider img {
    width: 100%;
    height: auto;
}
</style>


<body>
    <section class="header">
    <nav>
        <a href="index.php"><img src=""></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="/login">LOGIN</a></li>
                <li><a href="/register">REGISTER</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>

        <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> DashBoard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item">
                          <i class="bi bi-box-arrow-right"></i> Logout
                      </button>
                  </form>
              </ul>
            </li>
            @else
              <li class="nav-item">
                  <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              </li>
              @endauth
          </ul>
    </nav>

    <body>
        <section class="header">
            <div class="slider">
                <img src="img/slider1.jpg" alt="Film 1">
                <img src="img/slider2.jpg" alt="Film 2">
                <img src="img/slider3.jpg" alt="Film 3">
            </div>
        <div class="text-box">
            <h1>Film Terbesar di Dunia</h1>
            <p>Cari tahu film Anda sebentar!<br>Nikmati situs web ini. Jika Anda tertarik dengan situs web ini?</p>
        </div>
        </section>
    </section>
        
        <!-- Slider -->
    
    <!-- Course -->
    <section class="course" id="course">
        <h1>Opsi yang di Tampilkan</h1>
        <p>Beberapa opsi dapat Anda temukan di situs web ini</p>

        <div class="row">
            <div class="course-col">
                <h3>Movie's Photo</h3>
                <p>Anda dapat melihat foto jika Anda masuk ke situs web itu.</p>
            </div>
            <div class="course-col">
                <h3>Description</h3>
                <p>Anda dapat melihat deskripsinya jika Anda login ke situs tersebut.</p>
            </div>
        </div>

    </section>

    <!-- Campus -->
    <section class="movie" id="movie">
        <h1>Spoiler yang bisa kami tunjukkan kepada Anda</h1>
        <p>Film viral ini akan membuat Anda semakin tertarik dengan website ini</p>
    
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
        <h1>Jika Anda ingin bergabung dengan situs ini, <br> Anda dapat menghubungi kami:</h1>
        <a href="#" class="hero-btn">Disini!</a>
    </section>

    <!-- Footer -->
    <section class="footer">
        <h4>Tentang kami</h4>
        <p>Terima kasih banyak telah mengunjungi situs web kami, kami harap situs web ini tidak mengecewakan Anda, dan saya harap Anda sangat menyukai situs web saya.
            <br>Jangan lupa kunjungi website ini lagi, kami tunggu terus!
        </p>
        <p>Copyright @2023-2024 | Dibuat oleh Vibes Team</p>
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

<script>
    var currentSlide = 0;
    var slides = document.querySelectorAll('.slider img');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.style.display = 'block';
            } else {
                slide.style.display = 'none';
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Set interval to change slide every 3 seconds (adjust as needed)
    setInterval(nextSlide, 3000);

    // Initially show the first slide
    showSlide(currentSlide);
</script>
</body>
</html>