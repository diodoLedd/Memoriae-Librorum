<?php include "../php/carica-dati-profilo.php" ?>

<!DOCTYPE html>
<html lang="it" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profilo</title>
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
  <section style="margin-top: 15vh;">
    <div class="container container-50">
      <?php session_start(); ?>
        <?php if (isset($_SESSION['alert'])): ?>
          <div class="container mt-4" style="padding:15px">
            <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-center" role="alert">
              <?= $_SESSION['alert']['message'] ?>
            </div>
          </div>
        <?php unset($_SESSION['alert']); ?>
      <?php endif; ?>
    </div>
  </section>
  <section>
    <div class="container container-50">
        <form method="POST" action="../php/modifica-dati-profilo.php" class="form row g-3 needs-validation my-4 mx-3" novalidate>
            <h2>Profilo</h2>
            <div class="col-6">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $utente['nome']; ?>">
              <div class="invalid-feedback">
                Inserisci un nome
              </div>
            </div>
            <div class="col-6">
              <label for="cognome" class="form-label">Cognome</label>
              <input type="text" class="form-control" id="cognome" name="cognome" required value="<?php echo $utente['cognome'];?>" >
              <div class="invalid-feedback">
                Inserisci un cognome
              </div>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" style="min-width: 20px; white-space: nowrap;" id="inputGroupPrepend">@</span>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required value="<?php echo $utente['email']; ?>">
                <div class="invalid-feedback">
                  Inserisci un'email
                </div>
              </div>
            </div>
            <div class="col-12">
              <input class="btn btn-success fc-white text-uppercase fw-bold text-white w-100 p-2 mb-3" type="submit" value="salva">
            </div>
        </form>

        <form method="POST" action="../php/modifica-password.php" class="form row g-3 needs-validation my-5 mx-3" novalidate>
            <h2>Modifica Password</h2>
            <div class="col-12">
                <label for="password-vecchia" class="form-label">Password vecchia</label>
                <input type="password" class="form-control" id="password-vecchia" name="password-vecchia" required>
                <div class="invalid-feedback">
                  Inserisci la password
                </div>
            </div>
            <div class="col-12">
                <label for="password-nuova" class="form-label">Password nuova</label>
                <input type="password" class="form-control" id="password-nuova" name="password-nuova" required>
                <div class="invalid-feedback">
                  Inserisci una password
                </div>
            </div>
            <div class="col-12">
                <input class="btn btn-success fc-white text-uppercase fw-bold text-white w-100 p-2 mb-3" type="submit" value="cambia">
            </div>
        </form>

        <form class="form row g-3 needs-validation mt-5 mb-2 mx-3" method="POST" action="../php/cancella-account.php" novalidate>
            <h2>Cancella Account</h2>
            <div class="col-12">
                <label for="password-conferma" class="form-label">Conferma password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">
                  Inserisci la password
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-danger fc-white text-uppercase fw-bold text-white w-100 p-2 mb-3" type="submit">Cancella</button>
            </div>
        </form>
    </div>
    <div class="container container-50 mb-4">
      <div class="row" style="padding: 15px">
        <div class="col-12">
          <a type="button" class="btn btn-outline-danger text-uppercase fw-bold w-100 p-2" href="../php/logout.php">logout <i class="bi bi-box-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </section>
  <script src="../js/dark-mode.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })()
  </script>
</body>

</html>