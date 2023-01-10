<?php
$pages_dir = 'pages';
$pages = scandir($pages_dir, 0);
unset($pages[0], $pages[1]);
print_r($pages);
