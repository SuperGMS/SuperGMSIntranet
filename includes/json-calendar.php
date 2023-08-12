<?php
session_start();
include_once("class.ranks.php");

$resultaat = $db->query("SELECT * FROM agenda WHERE status = '0' ORDER BY id");
$arr = array();
while ($fetch = $resultaat->fetch_array()) {

    if ($fetch['afdeling'] == 'instructeur') {
        if ($instructeur == 1) {
            $arr[] = array(
                'title' => $fetch['title'],
                'start' => $fetch['start'],
                'end' => $fetch['end'],
                'extendedProps' => array(
                    'onClick' => '<?php echo $site; ?>/agenda/'.$fetch['id']
                )
            );
        }
    }

    if ($leiding != 1) {

    } else {
        if ($fetch['afdeling'] == 'leiding') {
            $arr[] = array(
                'title' => $fetch['title'],
                'start' => $fetch['start'],
                'end' => $fetch['end'],
                'extendedProps' => array(
                    'onClick' => '<?php echo $site; ?>/agenda/'.$fetch['id']
                )
            );
        }
    }

    if ($fetch['afdeling'] == $userFetch['eenheid'] || $fetch['afdeling'] == 'all') {
        $arr[] = array(
            'title' => $fetch['title'],
            'start' => $fetch['start'],
            'end' => $fetch['end'],
            'extendedProps' => array(
                'onClick' => '<?php echo $site; ?>/agenda/'.$fetch['id']
            )
        );

    }


}
echo json_encode($arr);
