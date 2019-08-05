
<?php require_once 'include/header.inc.php' ?>
<div class="form-group container col-md-4">
<h4 class="user-inscription text text-primary">Login</h4>
    <div class="form-group">
        <i class="fas fa-user-alt text-light"></i>
        <label for="usr" placeholder="First name">Votre prenom</label>
        <input type="text" class="form-control hover border-primary text-light" name="value" id="firstname">
        <br>
    <!------------------------------------First-name-------------------------------------->
        <i class="fas fa-user-alt text-light"></i>
        <label for="usr" placeholder="Last name" >Votre nom</label>
        <input type="text" class="form-control hover border-primary text-light" name="value" id="lastname">
        <br>
    <!------------------------------------Lastname-------------------------------------->
        <i class="far fa-envelope-open text-light"></i>
        <label for="usr" placeholder="Email">Votre email</label>
        <input type="text" class="form-control hover border-primary text-light" name="value" id="email">
    <br>
    <!------------------------------------Email-------------------------------------->
        <i class="fas fa-unlock-alt text-light"></i>
        <label for="usr" placeholder="password">Votre mot de pass</label>
        <input type="text" class="form-control hover border-primary text-light" name="value" id="password">
    <br>
    <!------------------------------------Password-------------------------------------->
    <input class="btn btn-default bg-outlight hover border-primary col-md auto " type="button" value="Input">
    </div>
</div>
<?php require_once 'include/footer.inc.php' ?>