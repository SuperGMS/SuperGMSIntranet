<?php 
include_once("class.database.php");
if(isset($_SESSION['email'])){
    $emailQuery = $db->query("SELECT * FROM mailbox WHERE trash = '0' AND gelezen = '0' AND uid_to = '".$userFetch['id']."'");
    $emailCount = $emailQuery->rowCount();

    $emailQuery2 = $db->query("SELECT * FROM mailbox WHERE trash = '0' AND important = '1' AND uid_to = '".$userFetch['id']."'");
    $emailCount2 = $emailQuery2->rowCount();
    
    $emailQuery3 = $db->query("SELECT * FROM mailbox WHERE trash = '0' AND uid_from = '".$userFetch['id']."'");
    $emailCount3 = $emailQuery3->rowCount();
    
    $emailQuery4 = $db->query("SELECT * FROM mailbox WHERE trash = '1' AND uid_to = '".$userFetch['id']."'");
    $emailCount4 = $emailQuery4->rowCount();
    
    $trainingQuery = $db->query("SELECT * FROM vacatures WHERE status = '1'");
    $trainingCount = $trainingQuery->rowCount();
    
    $TrainingOpenstaand = $db->query("SELECT * FROM formtraining WHERE eenheid = '".$userFetch['eenheid']."' AND STAT = '0'");
    $TrainingOpenstaandCount = $TrainingOpenstaand->rowCount();

    $cijferQuery = $db->query("SELECT * FROM cijfers WHERE uid = '".$userFetch['id']."'");
    $cijferCount = $cijferQuery->rowCount();

    $UitgedeeldCijfers = $db->query("SELECT * FROM cijfers WHERE by_uid='". $userFetch['id'] ."'");
    $UitgedeeldCijfersCount = $UitgedeeldCijfers->rowCount();

    $ContactLedenInstructeur = $db->query("SELECT * FROM contact_in WHERE afdeling  = '".$userFetch['eenheid']."' AND status = '1'");
    $ContactLedenInstructeurCount = $ContactLedenInstructeur->rowCount();

    $ContactLedenLeiding = $db->query("SELECT * FROM contact_leiding WHERE leidinggevende = '".$userFetch['username']."' AND status = '1'");
    $ContactLedenLeidingCount = $ContactLedenLeiding->rowCount();
    
    $OpenstaandeAanmeldingen = $db->query("SELECT * FROM aanmeldingen WHERE accepted = '0'");
    $OpenstaandeAanmeldingenCount = $OpenstaandeAanmeldingen->rowCount();

    $vacature_reactie = $db->query("SELECT * FROM vacature_reactie");
    $vacature_reactieCount = $vacature_reactie->rowCount();

    function categorie_mail($cat){
        if($cat == 1){
            echo '<span class="label label yellow pull-right">Lid</span>';
        }else if($cat == 2){
            echo '<span class="label label indigo pull-right">Instructeur</span>';
        }else if($cat == 3){
            echo '<span class="label label purple pull-right">Teamleider</span>';
        }else if($cat == 4){
            echo '<span class="label label red pull-right">Bestuurslid</span>';
        }else if($cat == 5){
            echo '<span class="label label light-blue pull-right">Systeem Beheerder</span>';
        }
    }
    function show_date($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'jaar',
            'm' => 'maand',
            'w' => 'weken',
            'd' => 'dagen',
            'h' => 'uur',
            'i' => 'minuten',
            's' => 'seconden',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' geleden' : 'Net';
    }


}
?>