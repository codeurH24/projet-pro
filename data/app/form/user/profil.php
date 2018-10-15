<form method="post">
  <fieldset>
    <legend></legend>
    <div class="form-group">
      <label for="nom">Nom</label>
      <input name="name" type="text" class="form-control" id="nom" aria-describedby="nomHelp" placeholder="Entrer un nom">
      <small id="nomHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="prenom">Prénom</label>
      <input name="name" type="text" class="form-control" id="prenom" aria-describedby="nomPrenom" placeholder="Entrer un prénom">
      <small id="prenomHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="age">Age</label>
      <input name="age" type="number" class="form-control" id="age" aria-describedby="nomPrenom" placeholder="Indiquer votre age">
      <small id="ageHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Adresse e-mail</label>
      <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </fieldset>
</form>
