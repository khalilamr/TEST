<?php

function ajouter($nom,$description,$etat)
{

if(require("inscription.php"))
{
$req= $access->prepare("INSERT INTO module(nom,description,etat) VALUES ($nom,$description,$etat )");
$req->execute(array($nom,$description,$etat));
$req->closeCursor();
}
}

function afficher()
{
   if(require("inscription.php"))
   {
    $req=$access->prepare(" SELECT * FROM module ORDER BY id DESC");
    $req->execute();
     $data = $req->fetchAll(PDO::FETCH_OBJ);

     return $data;
     $req->closeCursor();
     
   }

}

function supprimer($id)
{
    if(require("inscription.php"))
{

    $req=$access->prepare("DELETE  FROM module WHERE id=?")
     $req->execute(array($id));
}

}




?>