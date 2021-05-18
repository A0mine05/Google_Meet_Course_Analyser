<?php
    
    ini_set('display_errors', 1);
    error_reporting( E_ALL );  //pour signaler les erreurs
    $from = "adresse mail de lexpediteur";
    $to = "adresse mail du destinataire";
    $subject = "objet ou sujet du mail";
    $message = "contenu du mail";
    $headers = "De :". $from;   //precise les informations essentielles(adresse expediteur, lieu de reponse etc...)

    mail($to,$subject,$message,$headers);

    echo "L'email a été envoyé."; //accusé de reception

?>