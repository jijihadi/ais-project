<?php
// make php connection to mysql db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_consent_form";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// function to get all data from database
function all($table, $where = null)
{
    global $db;
    $sql = "SELECT * FROM $table";
    if ($where != null) {
        $sql .= " WHERE $where";
    }
    $result = $db->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// function to get single data from database
function find($table, $where = null)
{
    global $db;
    $sql = "SELECT * FROM $table";
    if ($where != null) {
        $sql .= " WHERE $where";
    }
    $result = $db->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }
    return $data;
}

// function to get single data from database
function one($table, $where = null)
{
    global $db;
    $sql = "SELECT * FROM $table";
    if ($where != null) {
        $sql .= " WHERE id=$where";
    }
    $result = $db->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }
    return $data;
}

// form helper to validate if there's no empty data in array
function validate($data)
{
    foreach ($data as $key => $value) {
        if (empty($value)) {
            return false;
        }
    }
    return true;
}

// function to insert data to database
function insert($table, $data)
{
    global $db;
    $keys = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $sql = "INSERT INTO $table ($keys) VALUES ('$values')";
    $db->query($sql);
    return $db->insert_id;
}

// function to update data to database
function update($table, $data, $id)
{
    global $db;
    $sql = "UPDATE $table SET ";
    foreach ($data as $key => $value) {
        $sql .= "$key = '$value', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE id = $id";
    $db->query($sql);
    return $db->affected_rows;
}

// function to delete data from database
function delete($table, $where)
{
    global $db;
    $sql = "DELETE FROM $table WHERE $where";
    $db->query($sql);
    return $db->affected_rows;
}
