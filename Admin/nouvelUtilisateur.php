<?php

require_once("connexiondb.php");
require_once("../les_fonctions/fonctions.php");

//echo 'Nombre des  user1 :  '.rechercher_par_login('user1');
//echo 'Nombre des  user1@gmail.com :  '.rechercher_par_email('user1@gmail.com');
$validationErrors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = $_POST['login'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $email = $_POST['email'];
    //$test = $_POST['test'];
    // test pour les champs du formumaire client
$date_accident = $_POST['date_accident'];
 $heure = $_POST['heure'];
 $ville = $_POST['ville'];
 $lieu = $_POST['lieu'];
 $blesse = implode(',',$_POST['blesse']);
 $dega = implode(',',$_POST['dega']);
 $temoin = $_POST['temoin'];
// //
    //mon 2 eme test pour les formulaires
                 $prenom_a = $_POST['prenom_a'];
                 $nom_a = $_POST['nom_a'];
                 $adresse_a = $_POST['adresse_a'];
                 $tel_a = $_POST['tel_a'];
                 $mail_a = $_POST['mail_a'];
                
                  $marque_a = $_POST['marque_a'];
                  $type_a = $_POST['type_a'];
                  $numero_im_a = $_POST['numero_im_a'];
                  $numero_contrat_a = $_POST['numero_contrat_a'];
                  $nom_assure_a = $_POST['nom_assure_a'];
                  $prenom_assure_a = $_POST['prenom_assure_b'];
                  $code_postal_a = $_POST['code_postal_a'];

                  $observation_a = $_POST['observation_a'];
                  $point_choc_a = $_POST['point_choc_a'];
                  $degat_matriel_a = $_POST['degat_matriel_a'];
                 //mon 3 eme test pour les formulaires

             $ch1 = implode(',',$_POST['ch1']);
             $ch2 = implode(',',$_POST['ch2']);
             $ch3 = implode(',',$_POST['ch3']);
             $ch4 = implode(',',$_POST['ch4']);
             $dt1 = implode(',',$_POST['dt1']);
             $dt2 = implode(',',$_POST['dt2']);
             $dt3 = implode(',',$_POST['dt3']);
             $dt4 = implode(',',$_POST['dt4']);
             $ch5 = implode(',',$_POST['ch5']);
             $ch6 = implode(',',$_POST['ch6']);

            // //mon 4 eme test pour les formulaires
                      $prenom_b = $_POST['prenom_b'];
                      $nom_b = $_POST['nom_b'];
                      $adresse_b = $_POST['adresse_b'];
                      $tel_b = $_POST['tel_b'];
                      $mail_b = $_POST['mail_b'];

              $marque_b = $_POST['marque_b'];
              $type_b = $_POST['type_b'];
              $numero_im_b = $_POST['numero_im_b'];

                      $numero_contrat_b = $_POST['numero_contrat_b'];
                      $nom_assure_b = $_POST['nom_assure_b'];
                      $prenom_assure_b = $_POST['prenom_assure_b'];
                      $code_postal_b = $_POST['code_postal_b'];

                       $observation_b = $_POST['observation_b'];
                       $point_choc_b = $_POST['point_choc_b'];
                      // $degat_matriel_b = $_POST['degat_matriel_b'];

//  fin d'ajout formulaire
   
// 47+4

    if (isset($login)) {
        $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

        if (strlen($filtredLogin) < 4) {
            $validationErrors[] = "Erreur!!! Le login doit contenir au moins 4 caratères";
        }
    }

    if (isset($pwd1) && isset($pwd2)) {

        if (empty($pwd1)) {
            $validationErrors[] = "Erreur!!! Le mot ne doit pas etre vide";
        }

        if (md5($pwd1) !== md5($pwd2)) {
            $validationErrors[] = "Erreur!!! les deux mot de passe ne sont pas identiques";

        }
    }

    if (isset($email)) {
        $filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);

        if ($filtredEmail != true) {
            $validationErrors[] = "Erreur!!! Email  non valid";

        }
    }

    if (empty($validationErrors)) {
        if (rechercher_par_login($login) == 0 & rechercher_par_email($email) == 0) {
            $requete = $pdo->prepare("INSERT INTO utilisateur(login,email,date_accident,heure,ville,lieu,blesse,dega,temoin,prenom_a,nom_a,adresse_a,tel_a,mail_a,marque_a,type_a,numero_im_a,numero_contrat_a,nom_assure_a,prenom_assure_a,code_postal_a,observation_a,point_choc_a,dega_matriel_a,ch1,ch2,ch3,ch4,dt1,dt2,dt3,dt4,ch5,ch6,prenom_b,nom_b,adresse_b,tel_b,mail_b,marque_b,type_b,numero_im_b,numero_contrat_b,nom_assure_b,prenom_assure_b,code_postal_b,observation_b,point_choc_b,pwd,role,etat)
            VALUES(:plogin,:pemail,:pdate_accident,:pheure,:pville,:plieu,:pblesse,:pdega,:ptemoin,:pprenom_a,:pnom_a,:padresse_a,:ptel_a,:pmail_a,:pmarque_a,:ptype_a,:pnumero_im_a,:pnumero_contrat_a,:pnom_assure_a,:pprenom_assure_a,:pcode_postal_a,:pobservation_a,:ppoint_choc_a,:pdega_matriel_a,:pch1,:pch2,:pch3,:pch4,:pdt1,:pdt2,:pdt3,:pdt4,:pch5,:pch6,:pprenom_b,:pnom_b,:padresse_b,:ptel_b,:pmail_b,:pmarque_b,:ptype_b,:pnumero_im_b,:pnumero_contrat_b,:pnom_assure_b,:pprenom_assure_b,:pcode_postal_b,:pobservation_b,:ppoint_choc_b,:ppwd,:prole,:petat)");
            //     -- date_accident,heure,ville,lieu,blesse,dega,temoin,
            // --     prenom_a,nom_a,adresse_a,tel_a,marque_a,type_a,numero_im_a,numero_contrat_a,nom_assure_a,prenom_assure_a,code_postal_a,observation_a,point_choc_a,dega_matriel_a,ch1,ch2,ch3,ch4,dt1,dt2,dt3,dt4,ch5,ch6,prenom_b,nom_b,adresse_b,tel_b,marque_b,type_b,numero_im_b,
            // -- numero_contrat_b,nom_assure_b,prenom_assure_b,code_postal_b,observation_b,point_choc_b,dega_matriel_b,
            // pwd,role,etat)
            // VALUES(:plogin,:pemail,:ppwd,:prole,:petat)");
           //  -- :pdate_accident,:pheure,:pville,:plieu,:pblesse,:pdega,:ptemoin,
           //  -- :pprenom_a,:pnom_a,:padresse_a,:ptel_a,:pmarque_a,:ptype_a,:pnumero_im_a,
           //  -- :pnumero_contrat_a,:pnom_assure_a,:pprenom_assure_a,:pcode_postal_a,
           //  -- :pobservation_a,:ppoint_choc_a,:pdega_matriel_a,
           //  -- :pch1,:pch2,:pch3,:pch4,:pdt1,:pdt2,:pdt3,:pdt4,:pch5,:pch6,
           //  -- :pprenom_b,:pnom_b,:padresse_b,:ptel_b,:pmarque_b,:ptype_b,:pnumero_im_b,
           //  -- :pnumero_contrat_b,:pnom_assure_b,:pprenom_assure_b,:pcode_postal_b,
           //  -- :pobservation_b,:ppoint_choc_b,:pdega_matriel_b,
           // -- :ppwd,:prole,:petat)");

            $requete->execute(array('plogin' => $login,
                'pemail' => $email,
                'pdate_accident' => $date_accident,
                'pheure' => $heure,
                'pville' => $ville,
                'plieu' => $lieu,
                'pblesse' => $blesse,
                'pdega' => $dega,
                'ptemoin' => $temoin,
                'pprenom_a' => $prenom_a,
                 'pnom_a' => $nom_a,
                 'padresse_a' => $adresse_a,
                 'ptel_a' => $tel_a,
                 'pmail_a' => $mail_a,
            'pmarque_a' => $marque_a,
            'ptype_a' => $type_a,
            'pnumero_im_a' => $numero_im_a,
            'pnumero_contrat_a' => $numero_contrat_a,
            'pnom_assure_a' => $numero_contrat_a,
            'pprenom_assure_a' => $prenom_assure_a,
            'pcode_postal_a' => $code_postal_a,
              'pobservation_a' => $observation_a,
              'ppoint_choc_a' => $point_choc_a,
              'pdega_matriel_a' => $degat_matriel_a,
              'pch1' => $ch1,'pch2' => $ch2,
              'pch3' => $ch3,'pch4' => $ch4,
              'pdt1' => $dt1,'pdt2' => $dt2,
              'pdt3' => $dt3,'pdt4' => $dt4,
              'pch5' => $ch5, 'pch6' => $ch6,
                 'pprenom_b' => $prenom_b,
                 'pnom_b' => $nom_b,
                 'padresse_b' => $adresse_b,
                 'ptel_b' => $tel_b,
                 'pmail_b' => $mail_b,
                 'pmarque_b' => $marque_b,
                 'ptype_b' => $type_b,
                 'pnumero_im_b' => $numero_im_b,
             'pnumero_contrat_b' => $numero_contrat_b,
              'pnom_assure_b' => $numero_contrat_b,
              'pprenom_assure_b' => $prenom_assure_b,
              'pcode_postal_b' => $code_postal_b,
           'pobservation_b' => $observation_b,
           'ppoint_choc_b' => $point_choc_b,
          // 'pdega_matriel_b' => $degat_matriel_b,
          // 
                 'ppwd' => md5($pwd1),
                 'prole' => 'VISITEUR',
                 'petat' => 0));
            //     'pdate_accident' => $date_accident,
            //     'pheure' => $heure,
            //     'pville' => $ville,
            //     'plieu' => $heure,
            //     'pblesse' => $blesse,
            //     'pdega' => $dega,
            //     'ptemoin' => $temoin,
            //     'pprenom_a' => $prenom_a,
            //     'pnom_a' => $nom_a,
            //     'padresse_a' => $adresse_a,
            //     'ptel_a' => $tel_a,
            //     'pmarque_a' => $marque_a,
            //     'ptype_a' => $type_a,
            //     'pnumero_im_a' => $numero_im_a,
            // 'pnumero_contrat_a' => $numero_contrat_a,
            // 'pnom_assure_a' => $numero_contrat_a,
            // 'pprenom_assure_a' => $prenom_assure_a,
            // 'pcode_postal_a' => $code_postal_a,
            // 'pobservation_a' => $observation_a,
            // 'ppoint_choc_a' => $point_choc_a,
            // 'pdega_matriel_a' => $degat_matriel_a,
            // 'pch1' => $ch1,'pch2' => $ch2,'pch3' => $ch3,'pch4' => $ch4,
            // 'pdt1' => $dt1,'pdt2' => $dt2,'pdt3' => $dt3,'pdt4' => $dt4, 'pch5' => $ch5, 'pch6' => $ch6,
            // 'pprenom_b' => $prenom_b,
            //     'pnom_b' => $nom_b,
            //     'padresse_b' => $adresse_b,
            //     'ptel_b' => $tel_b,
            //     'pmarque_b' => $marque_b,
            //     'ptype_b' => $type_b,
            //     'pnumero_im_b' => $numero_im_b,
            // 'pnumero_contrat_b' => $numero_contrat_b,
            // 'pnom_assure_b' => $numero_contrat_b,
            // 'pprenom_assure_b' => $prenom_assure_b,
            // 'pcode_postal_b' => $code_postal_b,
            // 'pobservation_b' => $observation_b,
            // 'ppoint_choc_b' => $point_choc_b,
            // 'pdega_matriel_b' => $degat_matriel_b,
            //     'ppwd' => md5($pwd1),
                // 'prole' => 'VISITEUR',
                // 'petat' => 0));

            $success_msg = "Félicitation, votre compte est crée, mais temporairement inactif jusqu'a activation par l'admin";
        } else {
            if (rechercher_par_login($login) > 0) {
                $validationErrors[] = 'Désolé le login exsite deja';
            }
            if (rechercher_par_email($email) > 0) {
                $validationErrors[] = 'Désolé cet email exsite deja';
            }
        }

    }

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <!-- <meta charset="utf-8"/>

    <title> Nouvel utilisateur </title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
 -->
 <head>

    <meta charset="utf-8"/>
    <title> Nouvel utilisateur </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css
    /font-awesome.min.css">
    <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.css">
    <link rel="stylesheet" href="../css/monStyle.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/jquery-ui-1.10.4.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/school.js"></script>

    <script src="js/jquery-ui-i18n.min.js"></script>
    <script>
        $(function () {
            // définit les options par défaut du calendrier
            $.datepicker.setDefaults({
                showButtonPanel: true,// affiche des boutons sous le calendrier
                showOtherMonths: true, // affiche les autres mois
                selectOtherMonths: true // possibilités de sélectionner les jours des autres mois
            });

            //$("#calendar").datepicker(); // affiche le calendrier par défaut
            //$("#calendar").datepicker($.datepicker.regional["fr"]); // affiche le calendrier en fr
            $("#calendar").datepicker({
                dateFormat: "yy-mm-dd",

            });
            $("#calendar1").datepicker({
                dateFormat: "yy-mm-dd",

            });
        });
    </script>


</head>

</head>
<body>

<br><br>
<div class="contaiiner">

    <div class="panel panel-success">
        <div class="panel-heading" align="center" id="panel-headingg"> CONSTAT AMIABLE D'ACCIDENT AUTOMOBILES</div>
<br><hr><br>
        <div class="panel-body">

<div class="container col-md-6 col-md-offset-3">
    <h1 class="text-center"> Création d'un nouveau compte utilisateur</h1>

    <form class="form" method="post">

        <div class="input-container">

            <input type="text"
                   required="required"
                   minlength="4"
                   title="Le login doit contenir au moins 4 caractères..."
                   name="login"
                   placeholder="Taper votre nom d'utilisateur"
                   autocomplete="off"
                   class="form-control">
        </div>

        <div class="input-container">
            <input type="password"
                   required="required"
                   minlength="3"
                   title="Le Mot de passe doit contenir au moins 3 caractères..."
                   name="pwd1"
                   placeholder="Taper votre mot de passe"
                   autocomplete="new-password"
                   class="form-control">
        </div>

        <div class="input-container">
            <input type="password"
                   required="required"
                   minlength="3"
                   name="pwd2"
                   placeholder="retaper votre mot de passe pour le confirmer"
                   autocomplete="new-password"
                   class="form-control">
        </div>

        <div class="input-container">

            <input type="email"
                   required="required"
                   name="email"
                   placeholder="Taper votre email"
                   autocomplete="off"
                   class="form-control">
        </div>

       <!--  <div class="input-container">

            <input type="text"
                 
                   name="test"
                   placeholder="Taper votre quelq chose"
                   class="form-control">
        </div>
 -->
        <!-- remplissage des dega ùatériel sur lieu de l'accident  -->
       <!--  <div class="container col-md-4  ">			
                                    <div class="panel panel-primary">
                <div class="panel-heading">Dégats matériéls a des Véhiculs ou Autres qu A et B : </div>
                    <div class="panel-body">
                        <label class="form-check-label" for="dega"> Oui</label>
                        <input class="form-check-input" type="radio" name="dega[]" id="possionA" value="op3" >
                                    <div id="positionB">
                                    <label class="form-check-label" for="dega"> Non</label>
                                    <input class="form-check-input" type="radio" name="dega[]" value="op4" > 
                                    </div>     
                                    </div>
                                        </div>
                                    </div> -->
        <!-- ***************   fin  dega ùatériel **********************************************  -->
    <input class="btn btn-success" value="Enregistrer">
    </div>
    <br><hr><br>

     <!--  *************//////////////*************//////// COMMENCEMENT /////////////////**************** -->     <div class="container col-md-4 ">            
                        <div class="panel panel-primary">
                            <div class="panel-heading">Date et L'Heure de l'accident</div>
                                <div class="panel-body">
                                    <label for="calendar" class="control-label col-sm-1"> Date</label>
                                     <div class="col-sm-5">
                        <input required type="text" name="date_accident" id="calendar" class="form-control">
                                     </div>            
                                        <label for="heure" class="control-label col-sm-1"> Heure </label>
                                        <div class="col-sm-3">
                        <input required type="time" name="heure" id="heure" class="form-control">
                                        </div>
                                    </div>
                        </div>
                </div>
                            <!-- formulaire pour remplir le pays -->
          
            <div class="container col-md-5  ">          
                <div class="panel panel-primary">
                    <div class="panel-heading">Localisation</div>
                                        <div class="panel-body">
                                   
                                        <label for="ville" class="control-label col-sm-1"> Ville</label>
                                                <div class="col-sm-4">
                                    <input required type="text" name="ville" id="ville" class="form-control">
                                                </div>        
                                    <label for="lieu" class="control-label col-sm-1">Lieu</label>
                                                <div class="col-sm-6">
                                    <input required type="text" name="lieu" id="lieu" class="form-control">
                                            </div>
                                            </div>
                                </div>
                            </div>
                <!-- presiser s'il ya des bléssé oubien -->
                            
                            <!-- presiser s'il ya des bléssé oubien -->
<!--
                                    <div class="container col-md-2  ">          
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">Bélessé(s) et meme legé(s)</div>
                                            <div class="panel-body">
                                                <label class="form-check-label" for="blesse"> Oui</label>
                                                <input class="form-check-input" type="radio" name="blesse[]" id="possionA" value="op1" >
                                                <div id="positionB">
                                                <label class="form-check-label" for="blesse"> Non</label>
                                                <input class="form-check-input" type="radio" name="blesse[]" value="op2" > 
                                                </div>     
                                                </div>
                                            </div>
                                        </div>
-->
            <!-- remplissage des dega ùatériel sur lieu de l'accident  -->
                              <!-- presiser s'il ya des bléssé oubien -->
                                    <div class="container col-md-2  ">          
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Bélessé(s) et meme legé(s)</div>
                                        <div class="panel-body">
                                            <label class="form-check-label" for="blesse"> Oui</label>
                                    <input class="form-check-input" type="radio" name="blesse[]" id="possionA" value="op1" >
                                            <div id="positionB">
                                            <label class="form-check-label" for="blesse"> Non</label>
                                    <input class="form-check-input" type="radio" name="blesse[]" value="op2" > 
                                            </div>     
                                            </div>
                                        </div>
                                    </div>
            <!-- remplissage des dega ùatériel sur lieu de l'accident  -->
                            
         <!-- remplissage des dega ùatériel sur lieu de l'accident  -->
                                    <div class="container col-md-4  ">          
                                    <div class="panel panel-primary">
                <div class="panel-heading">Dégats matériéls a des Véhiculs ou Autres qu A et B : </div>
                    <div class="panel-body">
                        <label class="form-check-label" for="dega"> Oui</label>
                        <input class="form-check-input" type="radio" name="dega[]" id="possionA" value="op3" >
                                    <div id="positionB">
                                    <label class="form-check-label" for="dega"> Non</label>
                                    <input class="form-check-input" type="radio" name="dega[]" value="op4" > 
                                    </div>     
                                    </div>
                                        </div>
                                    </div>
        <!-- ***************   fin  dega ùatériel **********************************************  -->
                            
                            <div class="container col-md-6  ">          
                            <div class="panel panel-primary">
                            <div class="panel-heading"><strong>Témoins :</strong>Noms,Adresses,et Tél.</div>
                            <div class="panel-body">
                    <textarea name="temoin" id="temoin" class="form-control rounded-0" rows="2"> </textarea>
                            </div>
                            </div>
                            </div>
           
            <!-- Formulaire secondaire a replir important  -->
           <!-- ***************   fin  dega matériel **********************************************  -->
            <!-- ***************   fin  dega matériel **********************************************  -->
            <!-- ***************   fin  dega matériel **********************************************  -->
            <br>
                        <h2><hr>
            <marquee>********** !!!!!!! fin et debut du 1er partie et debut du deuxieme partie ************</marquee>
                        <hr></h2>
                            <br>
        
<table>
    
            <tr>
             <td>
            <!-- Les formulaire pour la voitur A  -->
                 <fieldset class="fies">
                     <legend class="legs">Véhicule A !</legend>

                <!-- formulaire nom prenom adresse et tel -->

                    <label for="prenom_a" class="control-label col-sm-3"> Prenom </label>
                    <div class="col-sm-6">
                        <input required type="text" name="prenom_a" id="prenom_a" class="form-control">
                    </div>
                    <br><br>
                    <label for="nom_a" class="control-label col-sm-3"> Nom </label>
                    <div class="col-sm-6">
                        <input required type="text" name="nom_a" id="nom_a" class="form-control">
                    </div>
                    <!--  -->
                    <br><br>
                    <label for="adresse_a" class="control-label col-sm-3"> Adress </label>
                    <div class="col-sm-6">
                        <input required type="text" name="adresse_a" id="adresse_a" class="form-control">
                    </div>
                    <br><br>
                    <!--  -->
                    <label for="tel_a" class="control-label col-sm-3"> Tél </label>
                    <div class="col-sm-6">
                        <input required type="text" name="tel_a" id="tel_a" class="form-control">
                     </div>
                     <!--  -->
                    <br><br>
                    <label for="mail_a" class="control-label col-sm-3"> Mail </label>
                    <div class="col-sm-6">
                        <input type="text" name="mail_a" id="mail_a" class="form-control">
                    </div>
                         <h3>Véhicule </h3>
                    <br><hr><br>
                    <label for="numero_contrat_a" class="control-label col-sm-3"> Marque </label>
                    <div class="col-sm-6">
                        <input required type="text" name="marque_a" id="numero_contrat_a" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="nom_assure_a" class="control-label col-sm-3"> Type </label>
                    <div class="col-sm-6">
                        <input type="text" name="type_a" id="nom_assurance" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="prenom_assure_a" class="control-label col-sm-3">Numéro d'immatriculation :</label>
                    <div class="col-sm-6">
                        <input required type="text" name="numero_im_a" id="prenom_assure_a" class="form-control">
                    </div>
        
                     <br><hr><br>
                    <h3>Société d'Assurance</h3>
                    <br>
                    <label for="numero_contrat_a" class="control-label col-sm-3"> Numéro du Contrat </label>
                    <div class="col-sm-6">
                        <input required type="text" name="numero_contrat_a" id="numero_contrat_a" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="nom_assure_a" class="control-label col-sm-3"> Nom de l'Assurance</label>
                    <div class="col-sm-6">
                        <input required type="text" name="nom_assure_a" id="nom_assurance" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="prenom_assure_a" class="control-label col-sm-3">Téléphone ou mail </label>
                    <div class="col-sm-6">
                        <input required type="text" name="prenom_assure_a" id="prenom_assure_a" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="code_postal_a" class="control-label col-sm-3">Code_Postale </label>
                    <div class="col-sm-6">
                        <input type="text" name="code_postal_a" id="code_postal_a" class="form-control">
                    </div>
                    <br><hr><br>
<!--                     
                    <fieldset class=fieldsett>
                    <div class="form-group">
                    <legend class="legendd"> Date et l'heure de l'accident</legend>
                    <label for="calendar" class="control-label col-sm-2"> Date </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_accident" id="calendar" class="form-control">
                    </div>
                    <br><br>
                    <label for="heure" class="control-label col-sm-2"> L'heure </label>
                    <div class="col-sm-4">
                        <input required type="text" name="heure" id="heure" class="form-control">
                    </div>
                    </div>            
            </fieldset>
            <br> -->

            <fieldset class="fieldsett">
         <div class="form-group">
                <legend class="legendd">Observation et Description du lien de L'accident </legend>
                  
                <label for="observation"> Observation :</label>
                    <textarea name="observation_a" id="observation_a" class="form-control rounded-0" rows="3"> 
                </textarea>
                <br>
                <label for="point_choc"> Point de Choc :</label>
                    <textarea name="point_choc_a" id="point_choc_a" class="form-control rounded-0" rows="2"> 
                </textarea>
                <br>
                <label for="degat_matriel_a"> Dégats apparents du véhicule B :</label>
                    <textarea name="degat_matriel_a" id="degat_matriel_a" class="form-control rounded-0" rows="2"> 
                </textarea>
         </div>
            </fieldset>
            <br>

            <div class="row my-row">
                    <label for="photo" class="control-label col-sm-2">Ajouter des PHOTOS </label>
                    <div class="col-sm-8">
                        <input type="file" name="photo_a" id="photo" class="form-control">
                    </div>
            </div>
    </fieldset>
    </td>

<!-- ********************** les circonstance de l'accident ***************************** -->

    <td class="dia">
        <fieldset class="circonstance">
            <legend class="circonstances"> 12 Circonstances </legend>
            <h3>Mettez une Croix dans chacune des cases utils pour préciser le croquis </h3>
            <label><h1>A</h1></label><label id="positionB"><h1>B</h1></label>
           
            <!-- detaille 1 pour la base de donnee  -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="ch1[]" id="ch1A" value="option1" >
            <label class="form-check-label" for="ch1"> En Stationnement</label>
            <input class="form-check-input" type="radio" name="ch1[]" id="positionB" value="option2" >
        </div>
            
        <div class="form-check">
            <input class="form-check-input" type="radio" name="ch2[]" id="choix2" value="option3" >
            <label class="form-check-label" for="ch2"> A l'arret</label>
            <input class="form-check-input" type="radio" name="ch2[]" id="positionB" value="option4" >
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="ch3[]" id="choix3" value="option5" >
            <label class="form-check-label" for="ch3">Quittait un Stationnement</label>
            <input class="form-check-input" type="radio" name="ch3[]" id="positionB" value="option6" >
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="ch4[]" id="choix4" value="option7" >
            <label class="form-check-label" for="ch4"> Ouvrait une Portiere </label>
            <input class="form-check-input" type="radio" name="ch4[]" id="positionB" value="option8" >
        </div>
        <hr>
        <!-- detaille 1 pour base de donnee  -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="detaille1" name="dt1[]" value="option9">
        <label for="dt1" class="form-check-label" >Prenait Un Stationnement </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt1[]" value="optio8"> 
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dt1" name="dt1[]" value="optio7">
        <label for="dt1" class="form-check-label" > Sortait d'une Parking, un lieu privé, un chemin de terre </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt1[]" value="optio6">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="detaille3" name="dt1[]" value="optio5">
        <label for="dt1" class="form-check-label" > S'engageait dans d'une Parking, un lieu privé, un chemin de  </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt1[]" value="optio4">
    </div>
    <!-- detaille 2 pour base de donnee  -->

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="detaille2" name="dt2[]" value="optio3">
        <label for="dt2" class="form-check-label" > S'engageait sur une place gigatoire </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt2[]" value="optio1">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="choix54" name="dt2[]" value="optio">
        <label for="dt2" class="form-check-label" > Roulait sur une place a sens gigatoire </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt2[]" value="option017">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="choix66" name="dt2[]" value="option016">
        <label for="dt2" class="form-check-label" > Heurtait a l'arriere en roulant dans le meme sens et sur une file</label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt2[]" value="option015">
    </div>
<!-- detaille 3 pour la base de donnee  -->

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="detaille3" name="dt3[]" value="option014">
        <label for="dt3" class="form-check-label" >Roulair dans le meme sens et sur une file differente </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt3[]" value="option013">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="choix9" name="dt3[]" value="option012">
        <label for="dt3" class="form-check-label" > Changait de file </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt3[]" value="option011">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="choix10" name="dt3[]" value="option010">
        <label for="ch3" class="form-check-label" > Reculait </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt3[]" value="option09">
    </div>
    <!-- detaille 4 pour la base de donnees  -->
    
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="detaille4" name="dt4[]" value="option08">
        <label for="dt4" class="form-check-label" > Virait a gauche </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt4[]" value="option07">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="choix12" name="dt4[]" value="option06">
        <label for="dt4" class="form-check-label" > Doublait </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt4[]" value="option05">
    </div>
    <!-- detaille 4 pour la base de donnees  -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="choix13" name="dt4[]" value="option04">
        <label for="dt4" class="form-check-label" > Empietait sur une voie reservee a la circulation en sens inverse </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt4[]" value="option03">
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="choix14" name="dt4[]" value="option02">
        <label for="dt4" class="form-check-label" > Venait de droite(dans un carafour) </label>
        <input type="checkbox" class="form-check-input" id="positionB" name="dt4[]" value="option01">
    </div>
    <hr>
    <div class="form-check">
            <input class="form-check-input" type="radio" name="ch5[]" id="choix5" value="option09" >
            <label class="form-check-label" for="ch5"> N'avait pas observé un signale de priorité </label>
            <input class="form-check-input" type="radio" name="ch5[]" id="positionB" value="option10" >
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="ch6[]" id="choix6" value="option9" >
            <label class="form-check-label" for="ch6"> N'avait pas observé un feu rouges  </label>
            <input class="form-check-input" type="radio" name="ch6[]" id="positionB" value="option010" >
        </div>

    </fieldset>
    </td>

    <td>
                   
   <!-- formulaire pour la voitur B -->
<fieldset class="fiesb">
    <legend class="legsb">Véhicule B</legend>
    <label for="prenom" class="control-label col-sm-3"> Prenom </label>
                    <div class="col-sm-6">
                        <input type="text" name="prenom_b" id="prenom" class="form-control">
                    </div>
                    <br>
                    <br>


                    <label for="nom" class="control-label col-sm-3"> Nom </label>
                    <div class="col-sm-6">
                        <input type="text" name="nom_b" id="nom_b" class="form-control">
                    </div>
                    <br>
                    <br>
                    <label for="adresse_b" class="control-label col-sm-3"> Adresse </label>
                    <div class="col-sm-6">
                        <input type="text" name="adresse_b" id="adresse" class="form-control">
                    </div>
                    <br><br>
                    
                    <label for="tel_b" class="control-label col-sm-3"> Tél </label>
                    <div class="col-sm-6">
                        <input type="text" name="tel_b" id="tel" class="form-control">
                     </div>
                    <br><br>
                    <label for="mail_b" class="control-label col-sm-3"> Mail </label>
                    <div class="col-sm-6">
                        <input type="text" name="mail_b" id="mail_b" class="form-control">
                    </div>
                    <br><hr><br><br>
    
                     <h3>Véhicule </h3>
                   
                    <label for="numero_contrat_a" class="control-label col-sm-3"> Marque </label>
                    <div class="col-sm-6">
                        <input type="text" name="marque_b" id="numero_contrat_a" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="nom_assure_a" class="control-label col-sm-3"> Type </label>
                    <div class="col-sm-6">
                        <input type="text" name="type_b" id="nom_assurance" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="prenom_assure_a" class="control-label col-sm-3">Numéro d'immatriculation :</label>
                    <div class="col-sm-6">
                        <input type="text" name="numero_im_b" id="prenom_assure_a" class="form-control">
                    </div>
        
                     <br><hr><br>
                    <h3>Société d'Assurance</h3>
                    <label for="numero_contrat" class="control-label col-sm-3"> Numéro du Contrat </label>
                    <div class="col-sm-6">
                        <input type="text" name="numero_contrat_b" id="numero_contrat" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="nom_assure" class="control-label col-sm-3"> Nom d'Assurance</label>
                    <div class="col-sm-6">
                        <input type="text" name="nom_assure_b" id="nom_assurance" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="prenom_assurance" class="control-label col-sm-3"> Téléphone ou email </label>
                    <div class="col-sm-6">
                        <input type="text" name="prenom_assure_b" id="prenom_assurance" class="form-control">
                    </div>
                    <br><br><br>
                    <label for="code_postal" class="control-label col-sm-3">Code_Postale </label>
                    <div class="col-sm-6">
                        <input type="text" name="code_postal_b" id="code_postal" class="form-control">
                    </div>
                </fieldset>
                    <br><hr><br>
                    
                    <!-- <fieldset class="fieldsett">
        <div class="form-group">
                    <legend class="legendd">Date et l'heure de l'accident</legend>
                    <label for="calendar" class="control-label col-sm-2"> Date </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_accident" id="calendar" class="form-control">
                    </div>
                    <br><br>
                    <label for="heure" class="control-label col-sm-2"> L'heure </label>
                    <div class="col-sm-4">
                        <input required type="text" name="heure" id="heure" class="form-control">
                    </div>
    </div>s            
            </fieldset > -->

           
            <fieldset class="fieldsett">
         <div class="form-group">
                <legend class="legendd">Observation et Description du lien de L'accident </legend>
                  
                <label for="observation"> Observation :</label>
                    <textarea name="observation_b" id="observation" class="form-control rounded-0" rows="3"> 
                </textarea>
                <br>
                <label for="point_choc"> Point de Choc :</label>
                    <textarea name="point_choc_b" id="point_choc" class="form-control rounded-0" rows="2"> 
                </textarea>
                <br>
                <label for="degat_materiel"> Dégats apparents du véhicule B :</label>
                    <textarea name="degat_matriel_b" id="degat_matriel" class="form-control rounded-0" rows="2"> 
                </textarea>
         </div>
            </fieldset>
            <br>

            <div class="row my-row">
                
                    <label for="photo" class="control-label col-sm-2">Ajouter des PHOTOS </label>
                    <div class="col-sm-8">
                        <input type="file" name="photo_b" id="photo" class="form-control">
                    </div>
     
    
        </div> 
    </td>
    </tr>
               
    </table>
<!-- ******************************************* fin table formulaire constat acccident ****************************************-->
  <!-- ******************************************* fin table formulaire constat acccident ****************************************-->        
               
            
                <!-- <button type='submit' class="btn btn-success"> Enregistrer le stagiaire</button> -->

                <button type='submit' class="btn btn-success btn-block"> 
                                <h3> Enregistrer  <span class="fa fa-save"></span></h3> 
                            </button>
            </form>
        

     <!--************************//////////////////////    FIN ///////////////////////****************** --->
    
    <br>
    </div>
</div>
    <?php

    if (isset($validationErrors) && !empty($validationErrors)) {
        foreach ($validationErrors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }


    if (isset($success_msg) && !empty($success_msg)) {
        echo '<div class="alert alert-success">' . $success_msg . '</div>';

        header('refresh:5;url=login.php');
    }

    ?>


</div>

</body>

</html>



