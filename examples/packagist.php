<?php

use Viktoras\RssReader\Reader;

require __DIR__ . '/../vendor/autoload.php';

$url = 'https://packagist.org/feeds/packages.rss';

$rss = file_get_contents($url);

$reader = new Reader($rss);

$line = str_repeat('*', 20) . PHP_EOL;

$channel = $reader->getChannel();
echo $line;
echo $channel->getTitle() . ' - ' . $channel->getDescription() . PHP_EOL;
echo $line;

foreach (array_slice($reader->getItems(), 0, 10) as $item) {
    $pubDate = $item->getPubDate();

    $pubDateStr = 'No date';
    if (null !== $pubDate) {
        $pubDateStr = $pubDate->format('Y-m-d H:i:s');
    }

    printf(
        '[%s] %s' . PHP_EOL,
        $pubDateStr,
        $item->getTitle()
    );
}
