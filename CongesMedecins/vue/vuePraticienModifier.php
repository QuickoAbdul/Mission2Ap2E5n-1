<?php header( 'content-type: text/html; charset=utf-8' ); ?>

<h1>Modifier un praticien</h1>
<h2>Entrer le:
                <form  action="./?action=praticiensupprission" method="POST">
                    <div class="form-group">
                        <label for="produit">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prenom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                    </div>
                    <input type="submit" value="Modifier">
                </form>
</h1>
<br />