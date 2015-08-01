# Editace obr�zk�

## ���ka

```php
$image->setWidth(50); // Nastav� 50px
$image->setWidth('25%') // Nastav� 25%

$image->setSize('50'); // Nastav� 50px
$image->setSize('25%'); // Nastav� 25%
```

## V��ka

```php
$image->setHeight(50); // Nastav� 50px
$image->setHeight('25%') // Nastav� 25%

$image->setSize('x50'); // Nastav� 50px
$image->setSize('x25%'); // Nastav� 25%
```

## N�zev obr�zku

```php
// V�choz� n�zev test.png

$image->setName('image.png'); // image.png
```

```php
// V�choz� n�zev test.png

$image->setSuffix('jpg'); // test.jpg
```

```php
// V�choz� n�zev test.png

$image->setNameWithoutSuffix('img'); // img.png
```

## Namespace

```php
$image->setNamespace('namespace');
```

```php
$image->setAbsoluteName('namespace/image.png');
```

## Flag

```php
$image->setFlag('exact');

// nebo
$image->setFlag(8);

// kombinace
$image->setFlag(['stretch', 'shrink_only']);

// nebo
$image->setFlag([1, 2]);
```

## Helpers

```php
$image->setHelpers([
    'crop:50,25,10,10',
    'sharpen'
]);