# 📚 Memoriae Librorum

*Memoriae Librorum* è un'applicazione web scolastica pensata per aiutare gli utenti a gestire e tenere traccia della propria esperienza di lettura. L'app permette di organizzare i libri da leggere, in lettura e letti, oltre a registrare recensioni e citazioni significative.

> **"Esplora, Traccia e Ricorda"**

---

## 📘 Informazioni sul Progetto

- 👨‍💻 Autore: **Lorenzo Ledda**
- 🏫 Classe: 5°A
- 📚 Materia: Tecnologie e Progettazione di Sistemi Informatici e di Telecomunicazioni
- 📅 Inizio sviluppo: 13/03/2025
- 🔥 Difficoltà: Fottutamente alta

Lo scopo è fornire un archivio digitale per appassionati di libri che vogliono catalogare le loro letture, recensioni, voti e citazioni, in un'interfaccia moderna, responsiva e accessibile.

---

## 👨‍💻 Esperienza Utente

- ✅ Registrazione e login sicuri (con hash delle password)
- ✅ Dashboard personale per ogni utente con tutti i libri tracciati divisi per stato di avanzamento della lettura
- ✅ Ricerca per titolo del libro con risultati
- ✅ Aggiunta dei libri alla propria libreria
- ✅ Modifica dello stato di lettura, recensioni, voti e date con validazione date
- ✅ Gestione di citazioni con testo e pagina
- ✅ Modalità scura attivabile e persistente
- ✅ Eliminazione di citazioni e tracciamenti con conferma
- ✅ Eliminazione dell’account con verifica password

---

## 📌 Database e Validazioni

**Entità principali:**
- `Utenti`: si registrano e usufruiscono del servizio
- `Libri`: vengono scelti dall'utente per essere tracciati
- `Autori`: uno principale per libro
- `Generi`: uno principale per libro
- `Tracciamenti`: uno per utente/libro
- `Citazioni`: citazioni personali per libro

**Validazioni dello stato di avanzamento di lettura di un libro in tracciamento**
L'utente verrà avvisato con appositi avvisi rossi se non rispetterà i seguenti vincoli:
- 📚 *Da leggere*: nessuna data di inizio e fine lettura
- 📖 *In lettura*: solo data inizio 
- ✅ *Completato*: data inizio + fine obbligatorie
- ⚠️ La data inizio deve essere precedente a quella di fine

---

## 🗂️ Struttura del Progetto

```bash
MemoriaeLibrorum/
├── analisi testuale/                # documentazione
│   ├── import DB/                   # Caricamento DB
│   │   └── memoriae_librorum.sql    # Database MYSQL caricato di libri, autori, generi e immagini di copertine
│   └── Memoriae Librorum.md         # Analisi e requisiti funzionali del progetto
├── assets/                          # Favicon e immagini
│   ├── img/                         # Immagini statiche
│       └── copertine-libri/         # Copertine dei libri                   
├── css/                             # Fogli di stile
│   └── styles.css                   # CSS generico
├── js/                              # Script JavaScript
│   └── darkmode.js                  # Toggle dark/light mode con Bootstrap 5
├── pages/                           # Pagine principali accessibili via browser
│   ├── accedi.php                   # Pagina login
│   ├── dashboard.php                # Dashboard utente con libri
│   ├── libro.php                    # Dettagli libro + tracciamento
│   ├── profilo.php                  # Profilo utente
│   ├── registrati.php               # Pagina registrazione
│   └── risultati.php                # Risultati ricerca
├── php/                             # Script PHP lato server
│   ├── aggiungi-citazione.php       # Aggiunta di una citazione per un determinato tracciamento
│   ├── aggiungi-libro.php           # Aggiunta di un libro da tracciare nella propria dashboard
│   ├── cancella-account.php         # Cancellazione dell'account, dei tracciamenti e delle citazioni
│   ├── cancella-citazione.php       # Cancellazione delle citazioni di un determinato tracciamento
│   ├── cancella-libro.php           # Cancellazione di un libro e delle sue citazioni dai propri tracciamenti
│   ├── carica-citazione.php         # Mostra le citazioni nella pagina del tracciamento
│   ├── carica-dashboard.php         # Mostra i libri tracciati nella dashboard
│   ├── carica-dati-profilo.php      # Mostra i dati del profilo dell'utente
│   ├── carica-tracciamento.php      # Mostra i dati del tracciamento di un determinato libro
│   ├── cerca.php                    # Reindirizzamento alla pagina di ricerca
│   ├── db.php                       # Connessione al Database
│   ├── login.php                    # Verifica dell'accesso
│   ├── logout.php                   # Disconnessione dall'account
│   ├── modifica-dati-profilo.php    # Modifica dati personali dell'utente
│   ├── modifica-password.php        # Modifica la password dell'utente
│   ├── modifica-tracciamento.php    # Modifica tracciamento di un determinato libro
│   ├── risultati-ricerca.php        # Mostra i risultati di una ricerca per Titolo del libro
│   └── signup.php                   # Registrazione al servizio
├── index.html                       # Pagina iniziale di introduzione al sito
└── README.md                        # Documentazione del progetto (questo file)
```

## Tecnologie Utilizzate

- **MySQL** - Gestione del database relazionale
- **VSCodium** - Editor di testo guidato dalla comunità e con licenza libera dell'editor VS Code di Microsoft.
- **HTML e CSS** - Realizzazione delle pagine e dello stile
- **JavaScript** - Interazioni lato client 
- **Bootstrap 5.3** - Componenti HTML/CSS/JS
- **PHP** - Interazioni lato server
- **XAMPP** - Web server locale
- **GitHub** - verion control

---

## 🚀 Come Utilizzare il Progetto

1. Scarica il progetto (clonalo o scarica lo zip)
2. Inseriscilo nella cartella `/htdocs/` di XAMPP (es: `/opt/lampp/htdocs/progetti/Memoriae Librorum/` su Linux)
3. Avvia **Apache** e **MySQL** da XAMPP (es `sudo /opt/lampp/lampp start` su Linux o da applicazione per Windows)
4. Crea il database da `/localhost/phpmyadmin/` importando il file `memoriae_librorum.sql` dentro a `/analisi testuale/import DB/`
6. Digita `http://localhost/progetti/Memoriae Librorum/index.html` nel browser
7. Goditi l'esperienza

---
