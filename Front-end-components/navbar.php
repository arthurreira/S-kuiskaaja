<link rel="stylesheet" href="css/navbar.css">


<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-scroll mb-5">
    <div class="container-fluid">
        <a class="navbar-brand fw-bolder text-center" href="#!">Sääkuiskaaja</a>
        <a class=" navbar-brand fw-bolder text-center  " id="digital-clock"></a>
        <!-- Clock -->

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-cloud"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#!">Koti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Tietoa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Palvelut</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Nähtävyydet</a>
                </li>

            </ul>
            <ul class="navbar-nav  d-flex flex-row">
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#!">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#!">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<script>
    // Function to update the clock
    function updateClock() {
        let today = new Date();
        let day = today.getDay();
        let daylist = ["Ma", "Ti", "Kes", "Tor ", "Pe", "La", "Su"];
        let hour = today.getHours();
        let minute = today.getMinutes();
        let second = today.getSeconds();

        if (hour >= 13) {
            hour = hour;
        }
        if (minute < 10) {
            minute = "0" + minute;
        }
        if (second < 10) {
            second = "0" + second;
        }

        let timer = daylist[day] + "    " + hour + " : " + minute + " : " + second;
        document.getElementById('digital-clock').innerHTML = timer;
    }

    // Update the clock every second
    setInterval(updateClock, 1000);

    // Call the function once to initialize the clock
    updateClock();
</script>