<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $iduser=isset($_POST['iduser'])?$_POST['iduser']:0;

    $login=isset($_POST['login'])?$_POST['login']:"";

    $email=isset($_POST['email'])?strtoupper($_POST['email']):"";

    $date_accident=isset($_POST['date_accident'])?$_POST['date_accident']:"";
    $heure=isset($_POST['heure'])?$_POST['heure']:"";
    $ville=isset($_POST['ville'])?$_POST['ville']:"";

          $lieu = isset($_POST['lieu'])?$_POST['lieu']:"";
          $blesse =isset(implode(',',$_POST['blesse']))?implode(',',$_POST['blesse']):"";
          $dega = isset(implode(',',$_POST['dega']))?implode(',',$_POST['dega']):"";
          $temoin = isset($_POST['temoin'])?$_POST['temoin']:"";
            //mon 2 eme test pour les formulaires
                  $prenom_a = isset($_POST['prenom_a'])?$_POST['prenom_a']:"";
                  $nom_a = isset($_POST['nom_a'])?$_POST['nom_a']:"";
                  $adresse_a = isset($_POST['adresse_a'])?$_POST['adresse_a']:"";
                  $tel_a = isset($_POST['tel_a'])?$_POST['tel_a']:"";
                  $mail_a = isset($_POST['mail_a'])?$_POST['mail_a']:"";
                
                   $marque_a = isset($_POST['marque_a'])?$_POST['marque_a']:"";
                   $type_a = isset($_POST['type_a'])?$_POST['type_a']:"";
                   $numero_im_a = isset($_POST['numero_im_a'])?$_POST['numero_im_a']:"";
                   $numero_contrat_a = isset($_POST['numero_contrat_a'])?$_POST['numero_contrat_a']:"";
                   $nom_assure_a = isset($_POST['nom_assure_a'])?$_POST['nom_assure_a']:"";
                   $prenom_assure_a = isset($_POST['prenom_assure_a'])?$_POST['prenom_assure_a']:"";
                   $code_postal_a = isset($_POST['code_postal_a'])?$_POST['code_postal_a']:"";

        $observation_a = isset($_POST['observation_a'])?$_POST['observation_a']:"";
        $point_choc_a = isset($_POST['point_choc_a'])?$_POST['point_choc_a']:"";
        $degat_matriel_a = isset($_POST['degat_matriel_a'])?$_POST['degat_matriel_a']:"";
//                  //mon 3 eme test pour les formulaires

              $ch1 = isset(implode(',',$_POST['ch1']))?implode(',',$_POST['ch1']):"";
              $ch2 = isset(implode(',',$_POST['ch2']))?implode(',',$_POST['ch2']):"";
              $ch3 = isset(implode(',',$_POST['ch3']))?implode(',',$_POST['ch3']):"";
              $ch4 = isset(implode(',',$_POST['ch4']))?implode(',',$_POST['ch4']):"";
              $dt1 = isset(implode(',',$_POST['dt1']))?implode(',',$_POST['dt1']):"";
              $dt2 = isset(implode(',',$_POST['dt2']))?implode(',',$_POST['dt2']):"";
              $dt3 = isset(implode(',',$_POST['dt3']))?implode(',',$_POST['dt3']):"";
              $dt4 = isset(implode(',',$_POST['dt4']))?implode(',',$_POST['dt4']):"";
              $ch5 = isset(implode(',',$_POST['ch5']))?implode(',',$_POST['ch5']):"";
              $ch6 = isset(implode(',',$_POST['ch6']))?implode(',',$_POST['ch6']):"";

              //mon 2 eme test pour les formulaires
                  $prenom_b = isset($_POST['prenom_b'])?$_POST['prenom_b']:"";
                  $nom_b = isset($_POST['nom_b'])?$_POST['nom_b']:"";
                  $adresse_b = isset($_POST['adresse_b'])?$_POST['adresse_b']:"";
                  $tel_b = isset($_POST['tel_b'])?$_POST['tel_b']:"";
                  $mail_b = isset($_POST['mail_b'])?$_POST['mail_b']:"";

                   $marque_b = isset($_POST['marque_b'])?$_POST['marque_b']:"";
                   $type_b = isset($_POST['type_b'])?$_POST['type_b']:"";
                   $numero_im_b = isset($_POST['numero_im_b'])?$_POST['numero_im_b']:"";
                   $numero_contrat_b = isset($_POST['numero_contrat_b'])?$_POST['numero_contrat_b']:"";
                   $nom_assure_b = isset($_POST['nom_assure_b'])?$_POST['nom_assure_b']:"";
                   $prenom_assure_b = isset($_POST['prenom_assure_b'])?$_POST['prenom_assure_b']:"";
                   $code_postal_b = isset($_POST['code_postal_b'])?$_POST['code_postal_b']:"";

        $observation_b = isset($_POST['observation_b'])?$_POST['observation_b']:"";
        $point_choc_b = isset($_POST['point_choc_b'])?$_POST['point_choc_b']:"";
        //$degat_matriel_b = isset($_POST['degat_matriel_b'])?$_POST['degat_matriel_b']:"";
//                  //mon 3 eme test pour les formulaires

    
    $requete="update utilisateur set login=?,email=?,date_accident=?,heure=?,ville=?,lieu=?,blesse=?,dega=?,temoin=?,prenom_a=?,nom_a=?,adresse_a=?,tel_a=?,mail_a=?,marque_a=?,type_a=?,numero_im_a=?,numero_contrat_a=?,nom_assure_a=?,prenom_assure_a=? code_postal_a=?,observation_a=?,point_choc_a=?,dega_matriel_a=?,ch1=?,ch2=?,ch3=?,ch4=?,dt1=?,dt2=?,dt3=?,dt4=?,ch5=?,ch6=?,prenom_b=?,nom_b=?,adresse_b=?,tel_b=?,mail_b=?,marque_b=?,type_b=?,numero_im_b=?,numero_contrat_b=?,nom_assure_b=?,prenom_assure_b=? code_postal_b=?,observation_b=?,point_choc_b=? where iduser=?";

    $params=array($login,$email,$date_accident,$heure,$lieu,$ville,$blesse,$dega,$temoin,$prenom_a,$nom_a,$adresse_a,$tel_a,$mail_a,$marque_a,$type_a,$numero_im_a,$numero_contrat_a,$nom_assure_a,$prenom_assure_a,$code_postal_a,$degat_matriel_a,$ch1,$ch2,$ch3,$ch4,$dt1,$dt2,$dt3,$dt4,$ch5,$ch6,$prenom_b,$nom_b,$adresse_b,$tel_b,$mail_b,$marque_b,$type_b,$numero_im_b,$numero_contrat_b,$nom_assure_b,$prenom_assure_b,$code_postal_b,$iduser);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:login.php');
?>
