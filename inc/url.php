<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$directory = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$base_url = "$protocol://$host $directory";
