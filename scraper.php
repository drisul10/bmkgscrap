<?php
require_once 'simplehtmldom/simple_html_dom.php';
require_once 'process_data.php';

$target_url = 'http://satelit.bmkg.go.id/';

$html = file_get_html($target_url . 'BMKG/index.php?pilih=31');

foreach ($html->find('strong') as $key => $value) {
    $url_to_download = $target_url . trim($value->find('a', 0)->href);

    if (strpos($url_to_download, '.txt')) {

        $file_name = basename($url_to_download);

        if (file_put_contents($file_name, file_get_contents($url_to_download))) {
            fmt_txt2array($file_name);
        } else {
            // echo "File downloading failed." . "<br>";
        }
    }
}

insert_batch($query_batch);