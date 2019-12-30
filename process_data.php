<?php

require_once 'connection_db.php';

$header = [];
$array_content = [];
$query_batch = '';

function fmt_txt2array($file_name)
{
    global $header;
    global $array_content;
    global $query_batch;

    $fopen = fopen($file_name, r);

    $fread = fread($fopen, filesize($file_name));

    fclose($fopen);

    $remove = "\n";

    $split = explode($remove, $fread);

    $tab = "\t";

    foreach ($split as $key_string => $value_string) {

        $content = [];

        if (!empty(trim($value_string)) && (strpos($value_string, 'not found') == false)) {

            $string_formatted = trim(preg_replace('/\t\t+/', '', $value_string));

            $row = explode($tab, $string_formatted);

            if ($key_string == 0) {
                $header = $row;
            } else {
                foreach ($header as $key_header => $value_header) {
                    $content[$value_header] = $row[$key_header];
                }

                $query_batch .= generate_query($content);
            }
        }
    }
}

function generate_query($content)
{
    global $header;

    return "INSERT INTO datascrap (bujur, lintang, kepercayaan, region, provinsi, kabupaten, kecamatan, satelit, tanggal, waktu)
            VALUES ('" . $content[$header[0]] . "',
            '" . $content[$header[1]] . "',
            '" . $content[$header[2]] . "',
            '" . $content[$header[3]] . "',
            '" . $content[$header[4]] . "',
            '" . $content[$header[5]] . "',
            '" . $content[$header[6]] . "',
            '" . $content[$header[7]] . "',
            '" . $content[$header[8]] . "',
            '" . $content[$header[9]] . "'
            );";
}

function insert_batch($query_batch) {
    // print_r($query_batch);
    global $conn;

    if (mysqli_multi_query($conn, $query_batch)) {
        echo "New records created successfully" . "<br>";
    } else {
        echo "Error: " . "<br>" . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
}
