
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <title>Constat Accident</title>
</head>

<body>
    <section id="home" class="home-container">
        <header id="header" class="header">
            <img src="images/logo.png" alt="Nature" class="logo">
            <ul class="nav-links">
                <li>
                    <a href="#" data-text="A Propos" class="menu">A Propos</a>
                </li>
                <li>
                    <a href="pages/login.php" data-text="Faire un constat" class="menu">Faire un constat!!!</a>

                </li>
                <li>
                    <a href="#plants" data-text="Constat" class="menu">Contact</a>
                </li>
            </ul>
            <div class="burger-container">
                <div class="burger"></div>
            </div>
        </header>
        <div class="landing">
            <h1 class="big-title">Constat Amiable, D'accident Automobiles.</h1>
            <a href="#delivery" class="delivery-link">
                <span class="scroll-text" data-text="Scroll">Scroll</span>
                <i class="scroll-icon fas fa-angle-down"></i>
            </a>
        </div>
    </section>
    <section id="delivery" class="delivery-container">
        <div class="shop">
            <i class="delivery-icon fas fa-store"></i>
            <p class="box-content">
                Nos agents à votre service
            </p>
        </div>
        <div class="withdrawal">
            <i class="delivery-icon fas fa-people-carry"></i>
            <p class="box-content">
                votre propre constat sans contact
            </p>
        </div>
        <div class="delivery">
            <i class="delivery-icon fas fa-truck"></i>
            <p class="box-content">
                Constat amiable sur place , rapide et fiable
            </p>
        </div>
    
    
    </section>
    
    <footer id="footer" class="footer">
        <span class="copyrights">&copy; 2021-TDSI CONSTAT ACCIDENT</span>
        <a href="#" class="conditions"> Plus</a>
    </footer>
    <script>
        const burgerContainer = document.querySelector('.burger-container');
        const navLinks = document.querySelector('.nav-links');

        burgerContainer.addEventListener('click', () => {
            burgerContainer.classList.toggle('active');
            navLinks.classList.toggle('active');
        })
    </script>
</body>

</html>