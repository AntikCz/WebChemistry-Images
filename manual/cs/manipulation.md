# Manipulace v presenteru

## Odstra�ov�n� obr�zk�

```php
<?php

class ImagePresenter extends BasePresenter {

    public function handleDeleteImage() {
        $this->imageStorage->delete('namespace/image.jpg'); // Odstran� v�echny obr�zky (i upraven�) s jm�nem image.jpg
    }
}
?>
```

## Nahr�v�n� obr�zk�

```php
<?php

class ImagePresenter extends BasePresenter {

    public function afterUpload($form, $values) {
        /** @var \WebChemistry\Images\Image\Image $file */
        $file = $this->imageStorage->saveUpload($values->upload, 'namespace');

        $absoluteName = (string) $file->getInfo(); // Vr�t� namespace/nazevObrazku.xxx
        
        // Vlastn� zpracov�n� obr�zk�
        $file = $this->imageStorage->saveUpload($values->upload, 'namespace', FALSE); // Obr�zek se automaticky nenahraje
        
        $file->setNameWithoutSuffix('nazev');
        $file->setNamespace('myNamespace');
        
        $file->save();
        
        // P�i nastavov�n� height, width, flag apod. se obr�zek nahraje do specifick� slo�ky, ne do original!
    }

}
?>
```

## V�ceurov�ov� namespace

```php
<?php

class ImagePresenter extends BasePresenter {

    public function afterUpload($form, $values) {
        /** @var \WebChemistry\Images\Image\Upload */
        $file = $this->imageStorage->saveUpload($values->upload, 'namespace/secondNamespace');

        $imageName = (string) $file->getInfo();
    }

}
?>
```

## Nahr�n� obr�zk� p�es string

```php
<?php

class ImagePresenter extends BasePresenter {

    public function afterUpload($form, $values) {
        /** @var \WebChemistry\Images\Image\Content */
        $file = $this->imageStorage->saveConten($values->upload, 'filename.jpg', 'namespace');

        $imageName = (string) $file->getInfo();
    }

}
?>
```

## Z�sk�n� obr�zk�

```php
<?php

class ImagePresenter extends BasePresenter {

    public function manipulation($upload, $url) {
        $this->imageStorage->get('namespace/image.png');
        
        // Vlastn� velikosti, flag, helpery apod.
        $this->imageStorage->get('namespace/image.png', '200x100');
        $this->imageStorage->get('namespace/image.png', '200x100', 'fill');
        $this->imageStorage->get('namespace/image.png', '200x100|sharpen|crop:20,20,10,10');
        
        // Vlastn� "lok�ln�" noimage
        $this->imageStorage->get('namespace/image.png', NULL, NULL, 'myNoImage/image.png');
    }

}
?>
```

## Manipulace s ur�it�m namespace

```php
<?php

class ImagePresenter extends BasePresenter {

    public function manipulation($upload, $url) {
        $storageNamespace = $this->imageStorage->createNamespace('images');
        
        $storageNamespace->saveUpload($upload); // Ulo�� obr�zek s namespace 'images'
        $storageNamespace->delete('name.jpg'); // Odstran� obr�zek namespace/name.jpg
        $storageNamespace->saveContent(file_get_contents($url), 'image.png'); // Ulo�� obr�zek jako images/image.png
    }

}
?>
```