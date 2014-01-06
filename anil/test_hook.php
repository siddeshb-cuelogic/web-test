<?php
$row['questionID'] = 'rj-customretest-11111';
$a = $row['questionID'] != "rj-customretest-11" && $row['questionID'] != "rj-customretest-10";
eval($a);
if($a) {
    echo 'hi';
} else {
    echo 'bye';
}


?>