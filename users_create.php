<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->createUser();
?>



<style>
    body{
        background: linear-gradient(-45deg, #041C32, #04293A, #064663, #ECB365);
        animation: gradientBackground 15s ease infinite;
        height: 100%;
        background-size: 400% 400%;
        font-family: 'Roboto', sans-serif;
    }
    form{
        padding: 15px;
        margin: 20px auto 20px auto;
        width: 35%;
        height: auto;
        background-color: #fff;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    @keyframes gradientBackground {
	    0% {
		    background-position: 0% 50%;
	    }
	    50% {
		    background-position: 100% 50%;
	    }
	    100% {
		    background-position: 0% 50%;
	    }
    }

    input{
        border-radius: 25px;
        border: 1px solid #e3e3e3;
        background: #eeeeee;
        font-size: 20px;
        padding: 5px;
    }

    p{
        color: #fff;
        font-size: 36px;
        text-transform: uppercase;
        font-weight: bold;
        text-align: center;
        font-family: 'Smooch Sans', sans-serif;
        padding: 15px;
    }

    p:after{
        content: "";
        display: block;
        position: relative;
        left: 40%;
        width: 20%;
        height: 3px;
        background-color: #fff;
    }

    input[type="submit"]{
        color: #fff;
        font-size: 15px;
        background-color: #041C32;
        padding: 10px;
        border: 2px solid #e3e3e3;
        transition: color 0.5s, background-color 0.5s, border 0.5s;
    }
    input[type="submit"]:hover{
        color: #041C32;
        background-color: #fff;
        border: 2px solid #041C32;
        cursor: pointer;
    }

    @media screen and (max-width: 1000px) {
        form{
            width: 70%;
        }
    }

    @media screen and (max-width: 400px) {
        form{
            width: 90%;
        }
    }
</style>

<p>Création d'un utilisateur</p>
<form method="post" action="users_create.php" name ="userCreateForm">
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname">
    <br />
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname">
    <br />
    <label for="email">Email :</label>
    <input type="text" name="email">
    <br />
    <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
    <input type="text" name="birthday">
    <br />
    <input type="submit" value="Créer un utilisateur">
</form>