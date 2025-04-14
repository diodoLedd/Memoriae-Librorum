# 📚 **Memoriae Librorum**

*Memoriae Librorum* è un'applicazione web scolastica sviluppata per aiutare gli utenti a **gestire, tracciare e riflettere** sulla propria esperienza di lettura 📖.  
Il sito permette di organizzare i libri **da leggere**, **in lettura** e **letti**, oltre a raccogliere **recensioni** ✍️ e **citazioni memorabili** 💬.

> ✨ **"Esplora, Traccia e Ricorda"** – perché ogni lettura merita memoria.

---

✨ Questo progetto è stato sviluppato con passione❤️‍🔥, amore🥰 e odio😡 per PHP, errori🪲 (troppi zio pera) e caffè☕ (ormai sono socio in affari di Lavazza ).

✨ Quindi, per favore mettetemi un bel voto‼️ (tipo non sotto il 10 🙏🙏🙏) 

✨ Non accetto contestazioni 😀 (è già troppo se ho finito il progetto in un mese).

---

## 📘 **Informazioni sul Progetto**

- 👨‍💻 **Autore:** Lorenzo Ledda  
- 🏫 **Classe:** 5°A 2024/2025 "I.I.S Michele Giua" Cagliari
- 📚 **Materia:** Tecnologie e Progettazione di Sistemi Informatici e di Telecomunicazioni (materia jolly dell'indirizzo informatico, paragonabile a _"Uno, nessuno e centomila"_ di L. Pirandello)
- 📅 **Data di inizio sviluppo:** 13/03/2025  
- 🔥 **Difficoltà percepita:** Fottutamente alta 😤 (citazione onesta)

🎯 **Obiettivo**: creare un archivio digitale semplice, moderno e accessibile per gli amanti della lettura, dove poter **catalogare** le proprie letture, **scrivere recensioni**, **salvare citazioni** e **monitorare i progressi**, tutto in un'interfaccia curata, responsiva e user-friendly. 🌐📱

---

## 🧱 **Entità del Sistema**

Le entità principali che costituiscono l'anima del progetto sono:

- 👤 **Utenti**: si registrano, accedono e utilizzano il servizio con credenziali protette 🔐  
- 📚 **Libri**: selezionati e tracciati da ciascun utente  
- ✍️ **Autori**: ogni libro è legato a un autore principale  
- 🏷️ **Generi**: un solo genere per ogni libro (per semplificare la categorizzazione)  
- 📈 **Tracciamenti**: ogni utente può monitorare lo stato dei suoi libri  
- 💬 **Citazioni**: frasi, estratti o pensieri personali associati a ogni libro

---

## 💡 **Esperienza Utente**

L’interfaccia è progettata per offrire:

- ✅ **Registrazione e accesso sicuro** (con hashing delle password)
- 📊 **Dashboard personale** con tutti i libri tracciati, organizzati per stato:
  - 🔜 *Da leggere*
  - 📖 *In lettura*
  - ✅ *Completato*
- 🔍 **Motore di ricerca** interno per trovare libri tracciati
- 🧠 **Recensioni** personali su ogni libro
- 💌 **Citazioni personali** salvate per ispirazione futura
- 📥 **Caricamento e modifica dei dati del profilo**
- 🔒 **Modifica password**, **cancellazione account**, e gestione tracciamenti in autonomia
- ⚠️ **Sistema di validazione intelligente con alert visivi** rossi quando:
  - Le date non sono coerenti con lo stato di avanzamento del libro 📅
  - L’email è già registrata durante la creazione account 📧
  - L’accesso fallisce per credenziali errate ❌
  - Il libro è già presente nei tracciamenti 🚫
  - La password inserita è errata 🔑
  - La password di conferma per cancellazione account non è corretta 💥

---

## 📂 Struttura del Progetto

```bash
MemoriaeLibrorum/
├── analisi testuale/                # documentazione
│   ├── import DB/                   # Caricamento DB
│   │   └── memoriae_librorum.sql    # Database MYSQL caricato di libri, autori, generi e immagini di copertine
│   └── Memoriae Librorum.md         # Analisi e requisiti funzionali del progetto
├── assets/                          # Favicon e immagini
│   └── img/                         # Immagini statiche
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

---

## 🧰 Tecnologie Utilizzate

- 🐬 **MySQL** – Sistema di gestione del database relazionale.
- 🧠 **VSCodium** – Editor di codice open source basato su VS Code, per uno sviluppo libero e controllato.
- 🧱 **HTML & CSS** – Struttura e stile delle pagine web, per un’interfaccia chiara e responsive.
- ⚙️ **JavaScript** – Logica lato client, per rendere l’esperienza interattiva.
- 🎨 **Bootstrap 5.3** – Framework per componenti predefiniti e stile moderno mobile-first.
- 🐘 **PHP** – Linguaggio server-side per gestire login, registrazioni e CRUD dei dati.
- 🌐 **XAMPP** – Ambiente locale completo per testare il progetto con Apache + MySQL.
- 🧬 **GitHub** – Sistema di versionamento per tracciare l’evoluzione del progetto.

---

## 🧪 Come Provare il Progetto

1. 📥 **Scarica** il progetto (clonalo da GitHub o scarica lo ZIP).
2. 📂 **Inseriscilo** nella directory `/htdocs/` di XAMPP  
   - _Linux_: `/opt/lampp/htdocs/progetti/Memoriae Librorum/`
   - _Windows_: `C:\xampp\htdocs\progetti\Memoriae Librorum`
3. 🔥 **Avvia Apache e MySQL**:
   - _Linux terminale_: `sudo /opt/lampp/lampp start`  
   - _Windows_: Avvia da XAMPP Control Panel
4. 🛠️ **Crea il database** da `http://localhost/phpmyadmin/`
   - Nome DB: `memoriae_librorum`
   - Importa il file SQL da: `/analisi testuale/import DB/memoriae_librorum.sql`
5. 🌐 **Avvia il sito** nel browser: `http://localhost/progetti/Memoriae Librorum/index.html`
6. ✨ **Esplora l'app** e prova tutte le funzionalità

---

## 🚧 Funzionalità Future & Miglioramenti

- 🛡️ **Pannello Admin** per inserire libri tramite interfaccia grafica (evitando di doverli aggiungere manualmente da DB)
  - 🔍 In alternativa l'**integrazione con API esterne** (Google Books / OpenLibrary) per popolare automaticamente i dati dei libri
- 🎯 **Filtri avanzati** nella dashboard (per genere, autore, voto, stato...)
- 🖼️ **Anteprime copertine** direttamente nelle card dei libri
- 🧾 **Esportazione dati** personali in PDF o CSV
- 💬 Pagine di modifica differenziate dalle pagine di visualizzazione dei dati (es. una pagina di tracciamento per la visualizzazione e una per la modifica dei dati)
- 💌 Condivisione dei propri tracciamenti e citazioni
- 📧 Verifica account con email
- 📧 Recupero password via email

