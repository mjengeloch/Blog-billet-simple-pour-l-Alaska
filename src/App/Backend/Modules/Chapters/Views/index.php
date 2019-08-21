<?php $title = 'Administration' ?>

<section id="information">
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Gestionnaire</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="message"> Vous avez <span class="bold">X</span> commentaires signalé à modérer.</p>
            </div>
        </div>
    </div>
</section>

<section id="5Chapters">
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Les 5 derniers chapitres</h2>
            </div>
        </div>
        <?php
        foreach($listeChapters as $Chapters)
        {
        ?>
        <div class="row separation">
            <div class="col-9">
                <h4>Chapitre <?=$Chapters['ChaptersNumber']?> – <?=$Chapters['title']?></h4>
                <p>Le <?=$Chapters['dateAdd']->format('d/m/Y à H:i')?> – X Commentaires </p>
            </div>
            <div class="col-3">
                <a href="modifier-chapitre-<?=$Chapters['id']?>.html">Modifier</a><br>
                <a class="report" href="supprimer-chapitre-<?=$Chapters['id']?>.html">Supprimer</a>
            </div>
        </div>
        <?php
        }?>
        
    </div>
</section>

<section id="5Comments">
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Les 5 derniers commentaires</h2>
            </div>
        </div>
        <div class="row separation">
            <div class="col-9">
                <h4>Auteur</h4>
                <p>Le commentaire</p>
                <p class="date">Le XX/XX/XXXX à XXhXX</p>
            </div>
            <div class="col-3">
                <a href="">Retirer le signalement</a><br>
                <a class="report" href="">Supprimer</a>
            </div>
        </div>
    </div>
</section>