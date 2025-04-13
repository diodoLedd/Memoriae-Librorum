<!DOCTYPE html>
<html lang="it">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Registrati</title>
      <link rel="icon" type="image/x-icon" href="../assets/favicon.ico"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="../css/styles.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
    
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: rgba(0, 0, 0, .9);">
      <div class="container px-3">
        <a class="navbar-brand" href="../index.html">Memoriae Librorum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item fw-bold"><a type="button" class="btn btn-outline-light fw-bold m-1" href="accedi.php">Accedi <i class="bi bi-box-arrow-in-right"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <section style="margin-top: 25vh;">
      <div class="container container-50">
        <?php session_start(); ?>
          <?php if (isset($_SESSION['alert'])): ?>
            <div class="container mt-4">
              <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-center" role="alert">
                <?= $_SESSION['alert']['message'] ?>
              </div>
            </div>
          <?php unset($_SESSION['alert']); ?>
        <?php endif; ?>
      </div>
    </section>

    <section style="margin-top: 3vh;">
      <div class="container container-50">
        <form action="../php/signup.php" method="POST" class="form row g-3 needs-validation my-5 mx-3" novalidate>
            <h2>Registrati</h2>
            <div class="col-lg-6 col-sm-12">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" minlength="2" maxlength="30" required>
              <div class="valid-feedback">
                Bel nome!
              </div>
              <div class="invalid-feedback">
                Inserisci un nome.
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <label for="cognome" class="form-label">Cognome</label>
              <input type="text" class="form-control" id="cognome" name="cognome" minlength="2" maxlength="30" required>
              <div class="valid-feedback">
                Bel cognome!
              </div>
              <div class="invalid-feedback">
                Inserisci un cognome.
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text " style="min-width: 20px; white-space: nowrap;" id="inputGroupPrepend">@</span>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" maxlength="100"required>
                <div class="invalid-feedback">
                  Scegli un'email valida / Potresti essere già registrato con questa email
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" maxlength="50" required>
              <div class="invalid-feedback">
                Inserisci una password
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="termini" required>
                <label class="form-check-label" for="termini">
                  Accetta termini e condizioni
                </label>
              </div>
            </div>
            <div class="col-12">
              <input class="btn btn-primary fc-white text-uppercase fw-bold text-white w-100 p-2" type="submit" value="registrati">
            </div>
            <div class="col-12 mb-1">
              Sei già registrato? <a href="accedi.php">Accedi</a>
            </div>
        </form>
      </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

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
