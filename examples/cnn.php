<?php

use Viktoras\RssReader\Reader;

require __DIR__ . '/../vendor/autoload.php';

$url = 'http://rss.cnn.com/rss/edition.rss';

$rss = file_get_contents($url);

$reader = new Reader($rss);

echo $reader->getChannel()->getTitle() . PHP_EOL . PHP_EOL;

foreach ($reader->getItems() as $item) {
    echo '[' . $item->getPubDate()->format('Y-m-d H:i:s') . '] ' . $item->getTitle() . PHP_EOL;
}
