<?php
include 'api/requests.php';
$mcu_data = get_mcu_data();
$json = $mcu_data['json'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Cuándo es el próximo lanzamiento del UCM?</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background">
        <div class="relative">
            <div class="absolute left"></div>
            <div class="absolute right"></div>
        </div>
    </div>

    <div class="container">

        <header>
            <h1 class="neon-text">¿Cuándo es el próximo lanzamiento del UCM?</h1>
        </header>

        <main>
            <section class="film">
                <h2><span class="film_title"><?= $json['title'] ?></span><span class="days_until"> se estrena en <?= $json['days_until'] ?> días</span></h2>
                <h3>Fecha de lanzamiento: <?= date('d-m-Y', strtotime($json['release_date'])) ?> </h3>
                <img src="<?= $json['poster_url'] ?>" alt="Poster de <?= $mcu_data['tipo_actual'] ?> <?= $json['title'] ?>">
                <p><span class="static_text">Sinopsis:</span> <?= $mcu_data['overviewActual'] ?></p>
                <p class="translation_note">Sinopsis traducida automáticamente del inglés - puede contener imprecisiones</p>
                <p><span class="static_text">Tipo:</span> <?= $mcu_data['tipo_actual'] ?></p>
            </section>

            <section class="next_film">
                <h2 class="next_film__header">¿Qué viene después?</h2>
                <details id="nextProduction">
                    <summary><span class="film_title"><?= $json['following_production']['title'] ?></span>
                        <span class="summary__days_until">
                            se estrena en <?= $json['following_production']['days_until'] ?> días
                        </span>
                    </summary>
                    <p>Fecha de lanzamiento: <?= date('d-m-Y', strtotime($json['following_production']['release_date'])) ?></p>
                    <img src="<?= $json['following_production']['poster_url'] ?>" alt="Poster de <?= $mcu_data['tipo_siguiente'] ?> <?= $json['following_production']['title'] ?>">
                    <p><span class="static_text">Sinopsis:</span> <?= $mcu_data['overviewSiguiente'] ?></p>
                    <p class="translation_note">Sinopsis traducida automáticamente del inglés - puede contener imprecisiones</p>
                    <p><span class="static_text">Tipo:</span> <?= $mcu_data['tipo_siguiente'] ?></p>
                </details>
            </section>
        </main>

        <footer>
            <p>Powered by <a rel="noopener noreferrer" href="https://github.com/DiljotSG/MCU-Countdown" target="_blank">MCU-Countdown</a></p>

            <p>&copy 2024 Luis Daniel Cutz Martinez. Todos los derechos reservados.</p>

            <div class="socialmedia__icons">
                <a href="https://github.com/luiscutz" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"></path>
                    </svg></a>

                <a href="https://www.linkedin.com/in/luis-daniel-cutz-martinez" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                        <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM8.339 18.337H5.667v-8.59h2.672v8.59zM7.003 8.574a1.548 1.548 0 1 1 0-3.096 1.548 1.548 0 0 1 0 3.096zm11.335 9.763h-2.669V14.16c0-.996-.018-2.277-1.388-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248h-2.667v-8.59h2.56v1.174h.037c.355-.675 1.227-1.387 2.524-1.387 2.704 0 3.203 1.778 3.203 4.092v4.71z"></path>
                    </svg></a>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const details = document.getElementById('nextProduction');
            const daysUntil = details.querySelector('.summary__days_until');
            details.addEventListener('toggle', function() {
                if (this.open) {
                    daysUntil.style.display = 'inline';
                } else {
                    daysUntil.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>