<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Appointment Scheduling</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/appointment-scheduling-app/index" class="header__logo">APPOINTMENTS</a>
            <nav class="header__menu">
                <ul class="header__menu-list">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="header__menu-item"><a href="index" class="header__menu-link">Appointments</a></li>
                        <li class="header__menu-item"><a href="add" class="header__menu-link">Add appointment</a></li>
                        <li class="header__menu-item"><a href="search" class="header__menu-link">Search</a></li>
                    <?php endif ?>
                </ul>
            </nav>
            <?php if (!isset($_SESSION['user_id'])) : ?>
                <a href="login" class="header__button">Login</a>
                <a href="register" class="header__button">Register</a>
            <?php else : ?>
                <a href="logout" class="header__button">Logout</a>
            <?php endif ?>
        </div>
    </header>

    <section class="content">
        <div class="content__inner">
            <?php echo $content; ?>
        </div>
    </section>
</body>

</html>