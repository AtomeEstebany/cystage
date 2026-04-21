<script lang="ts">
    import Header from '@/components/Header.svelte';
    import AppHead from '@/components/AppHead.svelte';
    import { useForm } from '@inertiajs/svelte';

    let postulation = [1,2,3,4,5,6,7,8,9,10];
</script>

<AppHead title="Postulations"/>

<Header/>
<main class="page-container">

    {#each postulation as p}
        <div class="main">
            <h2>Voir cv : file.cv</h2>
            <h1>Théo Maynadier</h1>
             <button class="close"><p>✅</p></button>
             <button class="close"><p>❌</p></button>
        </div>
    {/each}
</main>

<style>
        div.main {
            padding: 1rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            border-radius: 12px;
            margin-left: 15%;
            margin-right: 15%;
            margin-bottom: 30px;
            margin-top: 30px;
        }


        .close {
        
        background: none;
        border: none;
        font-size: 1.1rem;
        color: #94a3b8;
        cursor: pointer;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        transition: background 0.15s;
        }

        .close:hover {
        background: #f1f5f9;
        color: #1e293b;
        }
</style>
