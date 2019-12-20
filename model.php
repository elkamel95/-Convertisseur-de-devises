<?php


  require(dirname(__FILE__).'\SPDO.php');
	      $res = SPDO::getInstance();
   
   

   if(isset($_POST['code'])){
$id = $_POST['id'];
$code = $_POST['code'];
$prix = $_POST['prix'];
$montant = $_POST['montant'];
$montant_ml = $prix * $montant;
$action="inseration";


   if(isset($_POST['idAction'])){ 
   
   $idAction =$_POST['idAction'];
  $sql = "UPDATE devise SET montant = ?,  montant_ml = ? ,ID_Taux = ? ,id_user= ? WHERE id = ".$idAction."";
$action="modifier";
  
   }else{
	   
 $sql = "INSERT INTO `devise` ( `montant`,  `montant_ml`, ID_Taux, id_user) VALUES ( ?, ?, ?,?)";
   }
            $q = $res->prepare($sql);
           
			$qry= $q->execute(array($montant,$montant_ml,$id,2));
   }

header("Location: index.php?msg=$qry&&action=$action");

?>

