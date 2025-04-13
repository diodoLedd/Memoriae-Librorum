<?php require '../php/risultati-ricerca.php' ?>

<!DOCTYPE html>
<html lang="it" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Risultati</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        const theme = localStorage.getItem("theme") || "light";
        document.documentElement.setAttribute("data-bs-theme", theme);
    </script>
</head>

<body id="reset">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: rgba(0, 0, 0, .9);">
        <div class="container px-3">
            <a class="navbar-brand" href="#">Memoriae Librorum</a>
            <buttn class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></buttn>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a style="width:150px" type="button" class="btn btn-outline-light fw-bold m-1" href="dashboard.php">Dashboard <i class="bi bi-book"></i> </a></li>
                    <li class="nav-item"><a type="button" class="btn btn-outline-light fw-bold m-1" href="profilo.php"><?= $_SESSION["nome"], " ", $_SESSION["cognome"]; ?> <i class="bi bi-person-circle"></i> </a></li>
                    <li class="nav-item">
                        <button style="width:150px" id="themeToggle" class="btn btn-outline-light fw-bold m-1">
                            Tema
                            <svg id="themeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="19" fill="currentColor" class="bi">
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section style="margin-top: 20vh;">
        <div class="container">
            <?php session_start(); ?>
              <?php if (isset($_SESSION['alert'])): ?>
                <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-center" role="alert">
                    <?= $_SESSION['alert']['message'] ?>
                </div>
              <?php unset($_SESSION['alert']); ?>
            <?php endif; ?>
        </div>
    </section>
    <section id="barra-ricerca" style="margin-top: 4vh;">
        <form class="d-flex" role="search">
            <div class="container">
            <form action="../php/cerca.php" method="POST" class="row">
                    <div class="col-12">
                        <input type="text" class="form-control p-2" placeholder="Cerca un libro" name="query">
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary fc-white text-uppercase fw-bold text-white w-100 p-2">Cerca</button>
                    </div>
                </form>
            </div>
        </form>
    </section>

    <section id="Risultati" style="margin-top: 6vh;">
        <div class="container my-5">
            <h1 class="text-center mb-4">Risultati per: <em><?= $richiesta ?></em></h1>

            <?php if ($results->num_rows > 0): ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Titolo</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Genere</th>
                        <th scope="col" class="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($result = $results->fetch_assoc()): ?>
                        <tr>
                            <td class="align-middle"><?= $result['titolo'] ?></td>
                            <td class="align-middle"><?= $result['nomeAutore'] . " " . $result['cognomeAutore'] ?></td>
                            <td class="align-middle"><?= $result['nomeGenere'] ?></td>
                            <td class="text-end">
                                <form action="../php/aggiungi-libro.php" method="POST">
                                    <input type="hidden" name="idLibro" value="<?= $result['idLibro'] ?>">
                                    <input type="hidden" name="richiesta" value="<?= $richiesta ?>">
                                    <button class="btn btn-success fc-white text-uppercase fw-bold text-white w-100 p-2" type="submit">
                                        <i class="bi bi-plus-square"></i> Aggiungi
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <?php else: ?>
                <p class="text-center">Nessuna corrispondenza.</p>
            <?php endif; ?>
        </div>
    </section>
    <script src="../js/dark-mode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>