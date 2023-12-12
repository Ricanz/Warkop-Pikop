<?php
include('connection.php');
include('utils.php');

function global_insert($table_name, $arr_data, $debug = false)
{
    global $db;

    $str_column = "";
    $str_values = "";

    foreach ($arr_data as $key => $val) {
        $str_column .= ($str_column == "" ? "" : ", ") . "" . $key . "";
        $str_values .= ($str_values == "" ? "" : ", ") . "'" . $db->real_escape_string($val) . "'";
    }

    $str = "INSERT INTO " . $table_name . " (" . $str_column . ") VALUES (" . $str_values . ")";
    
    if ($debug) {
        echo $str;
        exit;
    }

    $result = $db->query($str);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function global_insert_return_id($table_name, $arr_data, $debug = false)
{
    global $db;

    $str_column = "";
    $str_values = "";

    foreach ($arr_data as $key => $val) {
        $str_column .= ($str_column == "" ? "" : ", ") . "" . $key . "";
        $str_values .= ($str_values == "" ? "" : ", ") . "'" . $db->real_escape_string($val) . "'";
    }

    $str = "INSERT INTO " . $table_name . " (" . $str_column . ") VALUES (" . $str_values . ")";
    
    if ($debug) {
        echo $str;
        exit;
    }

    $result = $db->query($str);

    if ($result) {
        return $db->insert_id;
    } else {
        return false;
    }
}

function global_select_single($table_name, $select, $where = false, $order = false)
{
    global $db;

    // Query MySQL SELECT
    $sql_where = !$where ? "" : "WHERE $where" ;
    $sql_order = !$order ? "" : "ORDER BY $order";
    $query = "SELECT $select FROM $table_name $sql_where $sql_order LIMIT 1";
    
    $result = $db->query($query);

    // Periksa apakah query berhasil
    if (!$result) {
        die("Query SELECT gagal: " . $db->error);
    }


    // Ambil hasil query
    while ($row = $result->fetch_assoc()) {
        $data = $row;
    }

    // Tutup koneksi
    // $db->close();

    return $data;
}

function global_delete_single($table_name, $id)
{
    global $db;

    // Query MySQL SELECT
    $query = "UPDATE $table_name SET status = 'deleted' WHERE id = $id;";
    $result = $db->query($query);

    // Periksa apakah query berhasil
    if (!$result) {
        die("Query SELECT gagal: " . $db->error);
    }

    // Tutup koneksi
    $db->close();

    return true;
}

function global_update($table_name, $arr_data, $str_where, $debug = false)
{
    global $db;

    $str_set = "";

    foreach ($arr_data as $key => $val) {
        $str_set .= ($str_set == "" ? "" : ", ") . "" . $key . " = '" . $db->real_escape_string($val) . "'";
    }

    $str = "
        UPDATE " . $table_name . "
        SET " . $str_set . "
        WHERE " . $str_where . "
    ";

    if ($debug) {
        echo $str;
        exit;
    }

    $result = $db->query($str);
    var_dump($db->error);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function global_select_to_string($table_name, $select, $where = false, $order = false, $separator = ', ')
{
    global $db;

    // Query MySQL SELECT
    $sql_where = !$where ? "" : "WHERE $where" ;
    $sql_order = !$order ? "" : "ORDER BY $order";
    $query = "SELECT $select FROM $table_name $sql_where $sql_order";
    
    $result = $db->query($query);

    // Periksa apakah query berhasil
    if (!$result) {
        die("Query SELECT gagal: " . $db->error);
    }

    // Ambil hasil query
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row[$select];
    }

    // Tutup koneksi
    // $db->close();

    // Mengubah array menjadi string dengan separator tertentu
    return implode($separator, $data);
}

?>