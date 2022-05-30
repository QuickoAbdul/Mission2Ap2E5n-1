<?php header( 'content-type: text/html; charset=utf-8' ); ?>

<h1>
<h1>Ajouter un praticien</h1>
                <form  action="./?action=praticiencreation" method="POST">
                    <div class="form-group">
                        <label for="produit">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prenom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="nombre">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">coefnotoriete</label>
                        <input type="text" id="coefnotoriete" name="coefnotoriete" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">codepraticien</label>
                        <input type="text" id="codepraticien" name="codepraticien" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">salaire</label>
                        <input type="number" id="salaire" name="salaire" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">identifiant</label>
                        <input type="text" id="identifiant" name="identifiant" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">mdp</label>
                        <input type="text" id="mdp" name="mdp" class="form-control">
                    </div>
                    <input type="submit" value="Enregistrer">
                </form>
</h1>
<br />