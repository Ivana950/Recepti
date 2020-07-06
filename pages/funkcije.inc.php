<?php 

include("../backend/includes/dbh.inc.php");


function add_receptID ($kor_ime, $recept_id, $konekcija){
    $sql = "INSERT INTO recepti_id VALUES (null, ?, ?)";
    $upit = $konekcija->prepare($sql);
    return $upit->execute([$kor_ime, $recept_id]);
}

function update_receptID ( $recept_id,$kor_ime, $konekcija){
    $sql = "UPDATE recepti_id SET recept_id= ? WHERE kor_ime = ?";
    $upit = $konekcija->prepare($sql);
    return $upit->execute([ $recept_id,$kor_ime]);
}


function provjeri_korisnikID($konekcija){
    $sql = "SELECT id FROM recepti_id WHERE kor_ime =?" ;
    $upit = $konekcija->prepare($sql);
    $upit->execute([$_SESSION['kor_ime']]);
    $korisnik = $upit->fetch();
    return $korisnik;
    
}

function provjeri_id($konekcija){
    $checkID = provjeri_korisnikID($konekcija);
    if($checkID >= 1){
    $sql = "SELECT recept_id FROM recepti_id WHERE kor_ime =?" ;
    $upit = $konekcija->prepare($sql);
    $upit->execute([$_SESSION['kor_ime']]);
    $id = $upit->fetch();
    
   return $id[0];
    }else{
        return 'noID';
    }
   
    
    
}

function provjeriDuplikat($id,$str){
    
    return $pos=strpos($str,$id);

    
}

?>