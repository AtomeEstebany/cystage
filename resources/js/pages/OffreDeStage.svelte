<script lang="ts">
    let { offre = $bindable() }= $props();

</script>
    <div>

        <h1>{offre.nom}<br></h1>
        <h1>{offre.entreprise}<br></h1>
        <h2>{offre.adresse}</h2>
        <br>
        <h1>{offre.description}<br></h1>
        <br>

    </div>

    <style>
        h1 {
            font-size: 2em;
        }
        div {
            border: 1px solid black;
            border-radius: 1%;
            margin-left: 20%;
            margin-right: 20%;
        }
    </style>