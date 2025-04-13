<?php require '../php/carica-tracciamento.php';  require '../php/carica-citazione.php'?>
<!DOCTYPE html>
<html lang="it" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracciamento</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
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
    <section style="margin-top: 11vh; margin-bottom: 15vh;">
        <div class="container">
            <div class="row mx-3">
                <div id="copertina" class="col-lg-4 col-md-4 col-sm-12 p-3">
                    <img src="../assets/<?= $tracciamenti['copertina']?>" class="img-thumbnail rounded mx-auto d-block">
                </div>
                <div id="info" class="col-lg-8 col-md-8 col-sd-12 p-3">
                    <h1 class="mb-3">Informazioni</h1>
                    <ul class="list-group list-group-flush rounded">
                        <li class="list-group-item py-3 border-1"><span class="fw-bold">Titolo</span>: <?php echo $tracciamenti['titolo']; ?> </li>
                        <li class="list-group-item py-3 border-1"><span class="fw-bold">Autore</span>: <?php echo $tracciamenti['nomeAutore']." ".$tracciamenti['cognomeAutore']; ?></li>
                        <li class="list-group-item py-3 border-1"><span class="fw-bold">Genere</span>: <?php echo $tracciamenti['nomeGenere'] ?></li>
                    </ul>
                </div>
                <hr>
                <div id="tracciamento" class="col-lg-12 col-md-12 col-sm-12 p-3">
                    <div>
                        <?php session_start(); ?>
                        <?php if (isset($_SESSION['alert'])): ?>
                            <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-center" role="alert">
                                <?= $_SESSION['alert']['message'] ?>
                            </div>
                        <?php unset($_SESSION['alert']); ?>
                        <?php endif; ?>
                    </div>
                    <h1 class="mb-3">Tracking</h1>
                    <form action="../php/modifica-tracciamento.php" method="POST">

                        <input type="hidden" name="idTracciamento" value="<?= $tracciamenti['idTracciamento'] ?>">

                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text fw-bold flex-shrink-0" style="min-width: 130px; white-space: nowrap;" id="inputGroupPrepend">Data di inizio:</span>
                                <input type="date" class="form-control" name="dataInizio" aria-describedby="inputGroupPrepend" value="<?= $tracciamenti['dataInizio'] ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text fw-bold flex-shrink-0" style="min-width: 130px; white-space: nowrap;" id="inputGroupPrepend">Data di fine:</span>
                                <input type="date" class="form-control" name="dataFine" aria-describedby="inputGroupPrepend" value="<?= $tracciamenti['dataFine'] ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text fw-bold flex-shrink-0" style="min-width: 130px; white-space: nowrap;" id="inputGroupPrepend">Voto:</span>
                                <select name="voto" class="form-control">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <option value="<?= $i ?>" <?= ($tracciamenti['voto'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text fw-bold flex-shrink-0" style="min-width: 130px; white-space: nowrap;" id="inputGroupPrepend">Stato lettura:</span>
                                <select name="stato-lettura" class="form-control">
                                    <option value="2" <?= ($tracciamenti['stato'] == '2') ? 'selected' : '' ?>>Non iniziato</option>
                                    <option value="1" <?= ($tracciamenti['stato'] == '1') ? 'selected' : '' ?>>In lettura</option>
                                    <option value="3" <?= ($tracciamenti['stato'] == '3') ? 'selected' : '' ?>>Completato</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text fw-bold flex-shrink-0" style="min-width: 130px; white-space: nowrap;" id="inputGroupPrepend">Recensione:</span>
                                <textarea name="recensione" class="form-control"><?= $tracciamenti['recensione'] ?></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary fc-white text-uppercase fw-bold text-white w-100 p-2 mt-4">Modifica</button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="mt-2"></div>
                </div>
                <hr>
                <div id="citazioni" class="col-lg-12 col-md-12 col-sm-12 p-3">
                    <h1 class="mb-3">Citazioni</h1>


                    <form action="../php/aggiungi-citazione.php" method="POST" class="row">
                        <input type="hidden" name="idTracciamento" value="<?= $tracciamenti['idTracciamento'] ?>">
                        <div class="col-lg-2 col-sm-12 my-2">
                            <label for="pagina" class="form-label">Pagina</label>
                            <input type="number" min="0" class="form-control" name="pagina" id="pagina" required>
                        </div>
                        <div class="col-lg-10 col-sm-12 my-2">
                            <label for="testo" class="form-label">Testo</label>
                            <textarea class="form-control" name="testo" id="testo" aria-label="With textarea" maxlength="500" placeholder="max 500 caratteri"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary fc-white text-uppercase fw-bold text-white w-100 p-2 mb-3 mt-1" type="submit">Aggiungi</button>
                        </div>
                    </form>
                    
                    <div class="accordion">
                        <?php foreach($citazioni as $index => $citazione): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $index ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                                        <span class="fw-bold">Pagina</span>: <?= $citazione['pagina']; ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $index ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $index ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?= $citazione['testo']; ?>
                                        
                                        <div class="text-end">
                                            <button type="button" class="btn btn-danger fc-white text-uppercase fw-bold text-white" data-bs-toggle="modal" data-bs-target="#confirmDeleteCitation<?= $citazione['idCitazione'] ?>">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>

                                        <div class="modal fade" id="confirmDeleteCitation<?= $citazione['idCitazione'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel<?= $citazione['idCitazione'] ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <form method="POST" action="../php/cancella-citazione.php" class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteLabel<?= $citazione['idCitazione'] ?>">Conferma eliminazione</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler cancellare questa citazione?
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="idCitazione" value="<?= $citazione['idCitazione'] ?>">
                                                    <input type="hidden" name="idTracciamento" value="<?= $tracciamenti['idTracciamento'] ?>">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <hr>
                <div class="col-12">
                    <button type="button" class="btn btn-danger fc-white text-uppercase fw-bold text-white w-100 p-2 mt-4 mb-3" data-bs-toggle="modal" data-bs-target="#confirmDeleteBook">
                        <i class="bi bi-trash3"></i> Cancella libro
                    </button>

                    <div class="modal fade" id="confirmDeleteBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteBookLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <form method="POST" action="../php/cancella-libro.php" class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteBookLabel">Conferma eliminazione</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                            </div>
                            <div class="modal-body">
                                Vuoi davvero rimuovere questo libro e tutte le sue citazioni dal tuo tracciamento?
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="idTracciamento" value="<?= $tracciamenti['idTracciamento'] ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <button type="submit" class="btn btn-danger">Conferma</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/dark-mode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>