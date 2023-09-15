<?php
function get_data($sql,$connection) {
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function insert_update_data($sql,$connection,$is_insert) {
    if($is_insert==true){
        return $connection->query($sql);
    }else{

    }
   return false;
}

function delete($sql,$connection) {
    return $connection->query($sql);
}
