<?php
require_once 'core/init.php';

$cache_expires = Config::get('cache/expiry');

// Path to the cache folder
$cache_folder = Config::get('cache/location');

// Checks whether the page has been cached or not
function is_cached($file) {
    global $cache_folder, $cache_expires;
    $cachefile = $cache_folder . $file;
    $cachefile_created = (file_exists($cachefile)) ? @filemtime($cachefile) : 0;
    return ((time() - $cache_expires) < $cachefile_created);
}

// Reads from a cached file
function read_cache($file) {
    global $cache_folder;
    $cachefile = $cache_folder . $file;
    return file_get_contents($cachefile);
}

// Writes to a cached file
function write_cache($file, $out) {
    global $cache_folder;
    $cachefile = $cache_folder . $file;
    $fp = fopen($cachefile, 'w');
    fwrite($fp, $out);
    fclose($fp);
}

$cache_file = md5($_SERVER['REQUEST_URI']) . ".php";

// Check if it has already been cached and not expired
// If true then we output the cached file contents and finish
if (is_cached($cache_file)) {
    echo read_cache($cache_file);
    exit();
}

ob_start();