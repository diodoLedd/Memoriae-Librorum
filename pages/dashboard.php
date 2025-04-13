<?php require '../php/carica-dashboard.php'?>

<!DOCTYPE html>
<html lang="it" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        
        <div class="d-flex">
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
        </div>
    </section>
    <?php if (!empty($inLettura) || !empty($daLeggere) || !empty($letti) ): ?>
        <section style="margin-top: 15vh;">
            <div class="container">
                <div class="btn-group col-12" role="group" aria-label="Basic outlined example">
                    <a type="button" class="btn btn-outline-primary" href="#libri-in-lettura">In Lettura</a>
                    <a type="button" class="btn btn-outline-primary" href="#libri-da-leggere">Da Leggere</a>
                    <a type="button" class="btn btn-outline-primary" href="#libri-letti">Completati</a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($inLettura)): ?>
        <section id="libri-in-lettura" style="margin-top: 6vh; margin-bottom: 4vh;">
            <h1 class="col-lg-12 text-center">Libri in lettura</h1>
            <hr>
            <div class="container">
                <div class="row g-1 justify-content-center">
                    <?php foreach ($inLettura as $tracciamento): ?>
                        <div class="col-lg-3 col-md-6 col-sd-12">
                            <div class="p-3 h-100">
                                <div class="card text-center h-100 d-flex flex-column">
                                    <div class="card-body">
                                        <h5 class="card-title mb-0 fw-bold"><?= $tracciamento['titolo']; ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="fw-bold">Autore</span>: <?= $tracciamento['nome'] . " " . $tracciamento['cognome'] ?></li>
                                    </ul>
                                    <div class="card-footer p-3">
                                        <a href="libro.php?idTracciamento=<?= $tracciamento['idTracciamento'] ?>" class="btn btn-primary fc-white text-uppercase fw-bold text-white w-100 p-2">Vedi Dettagli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <?php if (!empty($daLeggere)): ?>
        <section id="libri-da-leggere" style="margin-top: 6vh; margin-bottom: 4vh;">
            <h1 class="col-lg-12 text-center">Libri da leggere</h1>
            <hr>
            <div class="container">
                <div class="row g-1 justify-content-center">
                    <?php foreach ($daLeggere as $tracciamento): ?>
                        <div class="col-lg-3 col-md-6 col-sd-12">
                            <div class="p-3 h-100">
                                <div class="card text-center h-100 d-flex flex-column">
                                    <div class="card-body">
                                        <h5 class="card-title mb-0 fw-bold"><?= $tracciamento['titolo']; ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="fw-bold">Autore</span>: <?= $tracciamento['nome'] . " " . $tracciamento['cognome'] ?></li>
                                    </ul>
                                    <div class="card-footer p-3">
                                        <a href="libro.php?idTracciamento=<?= $tracciamento['idTracciamento'] ?>" class="btn btn-primary fc-white text-uppercase fw-bold text-white w-100 p-2">Vedi Dettagli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($letti)): ?>
        <section id="libri-letti" style="margin-top: 6vh; margin-bottom: 4vh;">
            <h1 class="col-lg-12 text-center">Libri letti</h1>
            <hr>
            <div class="container">
                <div class="row g-1 justify-content-center">
                    <?php foreach ($letti as $tracciamento): ?>
                        <div class="col-lg-3 col-md-6 col-sd-12">
                            <div class="p-3 h-100">
                                <div class="card text-center h-100 d-flex flex-column">
                                    <div class="card-body">
                                        <h5 class="card-title mb-0 fw-bold"><?= $tracciamento['titolo']; ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="fw-bold">Autore</span>: <?= $tracciamento['nome'] . " " . $tracciamento['cognome'] ?></li>
                                    </ul>
                                    <div class="card-footer p-3">
                                        <a href="libro.php?idTracciamento=<?= $tracciamento['idTracciamento'] ?>" class="btn btn-primary fc-white text-uppercase fw-bold text-white w-100 p-2">Vedi Dettagli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <script src="../js/dark-mode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>