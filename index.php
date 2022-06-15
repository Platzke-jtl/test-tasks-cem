<?php
require_once "./Caching.php";
use Caching\Caching;

//$start_time = microtime(true);

$cache = new Caching();

if ($cache->has("departure"))
{
    $singleDeparture = $cache->get("departure");
    echo nl2br($singleDeparture . " This is from cache!");

} else {
    $departures = "departures.txt";
    $file = fopen($departures, 'r');

    while (!feof($file)) {
        $singleDeparture = fgets($file);
        echo nl2br($singleDeparture);
        $cache->set("departure", $singleDeparture);
    }
    fclose($file);
}

//$end_time = microtime(true);
//$execution_time = ($end_time - $start_time);
//echo nl2br("Total execution time" . $execution_time);