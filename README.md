# RSS Reader

PHP library to read RSS files.

### Installation

```
composer require viktoras/rss-reader
```

### Example

```php
$reader = new Reader(file_get_contents('https://packagist.org/feeds/packages.rss'));

echo $reader->getChannel()->getTitle() . PHP_EOL;

foreach ($reader->getItems() as $item) {
    echo ' - ' . $item->getTitle() . PHP_EOL;
}
```

### Development

 - `composer fmt` - Code formatting
 - `composer psalm` - Static check
 - `composer test` - Tests

### License

[MIT](LICENSE.txt) 
