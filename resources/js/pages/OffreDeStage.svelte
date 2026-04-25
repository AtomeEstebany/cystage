<script lang="ts">
    import Modal from "./Modal.svelte";
    import "./ModalPoste.svelte";
    import ModalPoste from "./ModalPoste.svelte";
    import { createInertiaApp,page } from '@inertiajs/svelte';

    let { offre = $bindable(), entreprise = $bindable(), doms , skills, etudiant = $bindable()}= $props();
//'user_id','nom','siret','adresse','code_postal','ville','pays','num_tel'
//'nom','ent_id','nb_week','week_hour','paye_hour','teletrav','poste_desc','profil_desc'
    let showModalPostuler = $state(false);
    function modalPostuler() {
        console.log("test");
        showModalPostuler=!showModalPostuler;
    }

    let user = $derived($page.props.auth?.user);


</script>
    <div class="main">
       <header>
        <h1><b>{offre.nom}</b></h1>
        de {entreprise?.nom}
         <div class="location">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <p class="information">{entreprise?.adresse}, {entreprise?.code_postal}, {entreprise?.ville}, {entreprise?.pays}<br></p>
         </div>
       </header>
       <hr>
       <h2>Informations utiles: <br></h2>
            <p>Durée de travail : {offre.nb_week} semaines</p>
            <p>par semaine: {offre.week_hour}h payées {offre.paye_hour} € </p>
            <p>Télétravail: {#if offre.teletrav}✅{:else}❌{/if}</p>
       <br>

        <p>Tâches: {offre.poste_desc}<br></p>
        <br>
        <p>Qualités requises: {offre.profil_desc}<br></p>
        <br>
        <p>Pour plus d'informations, appeler le {entreprise?.num_tel}</p>
        <br>
        <p>Compétences demandées :</p>
        <p> {#each skills as s}
            {s.name}&nbsp;
        {/each}</p>
        <br>
        {#each doms as d}
            <p>#{d.name}</p>
        {/each}

        {#if user?.role_id == 3}
            <input type="submit" class="button" value="Postuler" onclick={modalPostuler}/>

            {#if showModalPostuler}
                <ModalPoste etudiant={etudiant} bind:showModalPostuler={showModalPostuler} offre={offre}/>
            {/if}
        {/if}


    </div>

    <style>
        :global(body) {
            --primary-700: #1d4ed8;
            --primary-600: #2563eb;
            --primary-100: #dbeafe;
            --ink-900: #0f172a;
            --ink-600: #475569;
            --border-200: #e2e8f0;
            margin: 0;
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        h1 { font-size: clamp(1.35rem, 2.4vw, 1.9rem); margin: 0; color: var(--ink-900); }
        h2 { font-size: 1.1rem; color: var(--ink-900); margin: 0.5rem 0; }

        div.main {
            padding: 1.4rem;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border-200);
            border-radius: 16px;
            margin-left: 10%;
            margin-right: 10%;
            background: #fff;
        }

        div.location {
            display: flex;
            align-items: left;
            vertical-align: bottom;
            gap:5px;
        }
        div.location svg {
            margin-top: 2px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 0.25rem;
            box-shadow: 0 14px 30px rgba(37, 99, 235, 0.24);
        }

        input[type="submit"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 35px rgba(37, 99, 235, 0.28);
        }

        p.information {
            color: var(--ink-600);
        }

        p {
            margin: 0.35rem 0;
            color: var(--ink-900);
            line-height: 1.6;
        }

        @media (max-width: 600px) {
            div.main {
                margin: 0;
                padding: 1rem;
            }
        }
    </style>