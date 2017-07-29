<?php
    /*
     * HOMEPAGE
     *      - visualizza eventi più seguiti del sistema
     *      - ricerca eventi con filti
     *      - se autorizzati:
     *          + seguire un evento
     *          + segnalare un evento
     *          + accedere al profilo del proprietario dell'evvento
     */

    require("shared/accessManager.php");
    require("shared/header.php");
?>
    <script>
        var events = <?php require("script/mainEvents.php"); ?>;
    </script>

    <div class="container text-center liteOrange borderRadius">
        <h1>Event Around</h1>
        <h3>The events that surround you!</h3>
    </div>

<br>
<div class="container liteBackground text-center borderRadius padding20">
    <h2>Idea generale</h2>
    <h3>Problema</h3>
    <h4>
        Nel corso dei nostri anni nella struttura universitaria, ci siamo ritrovati spesso
        a analizzare le bacheche messe a disposizione per i volantini alla ricerca di eventi
        interessanti, incontri o anche solo seminari riguardanti il nostro corso di studi.
        Spesso però questi rimangono disordinati e un volantino rischia di strapparsi in breve
        tempo o essere coperto da nuovi volantini prima che abbia ricevuto la giusta attenzione.
        L’attività stessa di affiggere volantini su più bacheche, in diverse strutture, comporta anche
        un discreto dispendio di risorse cartacee oltre che finanziarie.<br/>
        Possiamo fare qualcosa per ottenere una visuale più pratica sugli eventi e gli incontri
        che ci circondano? Da questa domanda nasce il nostro progetto.
    </h4>
    <h3>EventAround</h3>
    <h4>
        Il nostro applicativo web si pone l’obbiettivo di semplificare la ricerca
        di attività formative e ludiche agli utenti.<br/>
        Sfruttando informazioni come data e luogo delle attività si possono fare ricerche mirate
        non solo definendo una determinata posizione ma anche una distanza massima che si vuole percorrere
        e un intervallo di giorni dalla data odierna.<br/>
        Come per qualsiasi bacheca pubblica il monopolio dell’affissione dei volantini non sarà riservato
        solamente agli amministratori del sistema ma un qualsiasi utente registrato potrà pubblicare
        la propria proposta e questa sarà subito visibile da tutti.<br/>
        Il sistema gestisce anche un’area personale per ogni utente registrato dalla quale potrà gestire
        gli eventi che gli interessano, modificare i propri eventi pubblicati o semplicemente decidere
        quali informazioni rendere pubbliche della propria persona agli altri utenti.<br/>
        Per favorire la crescita di una comunità che si auto gestisca è presente anche un sistema di
        messaggistica interna per permettere un dialogo tra gli utenti.<br/>
    </h4>
</div>

<br>

<?php require("shared/footer.php"); ?>




