<?php $title = 'Chapitre' ?>

<section id="Chapter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Chapitre <?=$chapters['chapterNumber']?> – <?=$chapters['title']?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="date">Sorti le <?=$chapters['dateAddFr']?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="chapters-picture">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><?=nl2br($chapters['content'])?></p>
            </div>
        </div>
    </div>
</section>

<section id="Comment">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Commentaires</h2>
            </div>
        </div>
        <!-- foreach -->
        <div class="row comment">
            <div class="col-12">
                <div class="row">
                    <div class="col-10">
                        <p><span class="bold">NOM</span> – Posté le XX/XX/XXXX à XXhXX</p>
                    </div>
                    <div class="col-2 reportBloc">
                        <a href="" class="report">Signaler</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p> Ceci est un commentaire</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row comment">
            <div class="col-12">
                <div class="row">
                    <div class="col-10">
                        <p><span class="bold">NOM</span> – Posté le XX/XX/XXXX à XXhXX</p>
                    </div>
                    <div class="col-2 reportBloc">
                        <a href="" class="report">Signaler</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p> Ceci est un commentaire</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Ajouter un commentaire</h2>
            </div>
        </div>

        <form action="">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <label for="commentArea">Commentaire</label>
                <textarea class="form-control" id="commentArea" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="commentCheck" required>
                    <label class="form-check-label" for="commentCheck">En cochant cette case, je certifie que mon commentaire est respectueux</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Poster le commentaire</button>
        </form>
    </div>
</section>