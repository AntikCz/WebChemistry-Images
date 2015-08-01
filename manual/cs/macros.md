# Makra

## Z�klad

```html
    {img 'filename.jpg'} 
```

Vygeneruje: %basePath%/assets/original/filename.jpg

**Jako n: attribut**

```html
    <a n:img="'filename.jpg'">
        <img n:img="'filename.jpg'">
    </a>
```

Vygeneruje:
```html
    <a href="{$basePath}/assets/original/filename.jpg">
        <img src="{$basePath}/assets/original/filename.jpg">
    </a>
```

## Namespace

```html
    {img 'namespace/filename.jpg'}
```

Vygeneruje: %basePath%/%assets%/namespace/original/filename.jpg

**V�cen�sobn� namespace**

```html
    <img n:img="'namespace/subfolder/filename.jpg'">
```

Vygeneruje:
```html
    <img src="{$basePath}/assets/namespace/subfolder/original/filename.jpg">
```

## No image
Kdy� obr�zek neexistuje nahr�d� se noimage, kdy� ani ten neexistuje, tak hastagem #noimage

```html
    {img 'imageNotExist.jpg'} 
```

Vygeneruje: %basePath%/assets/noimage/original/noimage.png

**Zm�na velikosti funguje i na noimage**

```html
    {img 'imageNotExist.jpg', '700x100'} 
```

Vygeneruje: %basePath%/assets/noimage/700x100_0/noimage.png

**Nastaven� "lok�ln�" noimage**

```html
    {img 'imageNotExist.jpg', NULL, NULL, 'noavatar/noavatar.png'}
```

Vygeneruje: %basePath%/assets/noavatar/original/noavatar.png

## Manipulace s obr�zky

```html
    {img 'namespace/filename.jpg', '200x300'}
```

Vygeneruje (vytvo�� obr�zek, pokud neexistuje): %basePath%/assets/namespace/200x300_0/filename.jpg

**Pouze ���ka**

```html
    {img 'namespace/filename.jpg', '200'} nebo {img 'namespace/filename.jpg', '200x'}
```

**Pouze v��ka**
```html
    {img 'namespace/filename.jpg', 'x300'}
```

## Flags

Flag **nen�** case-sensitive.
Pou��v�m z [Nette\Utils\Image](http://doc.nette.org/cs/2.3/images#toc-zmena-velikosti).

```html
    {img 'namespace/filename.jpg', '200x300', 'exact'}
```

M��eme kombinovat
```html
    {img 'namespace/filename.jpg', '200x300', ['shrink_only', 'stretch']}
```