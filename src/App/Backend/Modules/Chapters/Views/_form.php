<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="setupChapterNumber">Numéro du chapitre</label>
        <input type="text" class="form-control" id="setupChapterNumber" placeholder="Numéro du chapitre (ex. 1, 1.5, 10)" name="chapterNumber" value="<?=isset($chapters) ? $chapters['chapterNumber'] : ''?>">
    </div>
    <div class="form-group">
        <label for="setupChapterTitle">Titre du chapitre</label>
        <input type="text" class="form-control" id="setupChapterTitle" placeholder="Titre du chapitre" name="title" value="<?=isset($chapters) ? $chapters['title'] : ''?>" required>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea name="content" id="elm1" cols="80" rows="15"><?=isset($chapters) ? $chapters['content'] : ''?></textarea>
    </div>
    <div class="form-group">
        <label for="image">Insérer une image</label>
        <input type="file" class="form-control-file" id="file" name="image">
    </div>
    <?php
    if(isset($chapters) && !$chapters->isNew())
    {
    ?>
        <input type="hidden" name="id" value="<?= $chapters['id'] ?>" />
        <button type="submit" class="btn btn-primary" name="update">Modifier</button>
    <?php
    }
    else
    {
    ?>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    <?php
    }
    ?>
</form>
