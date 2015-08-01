# Dopl�ky

## Upload control

Slou�� pro automatick� nahr�v�n� a odstra�ov�n� obr�zk�.

**Instalace:**

P�i registrov�n� extenze se automaticky p�ipoj� k Nette formul���m, pokud to nezak�eme v config souboru.

**Pou��t�:**

```php

protected function createComponentForm() {
    $form = new Nette\Application\UI\Form;

    $row = $this->getFromDatabase();

    $form->addImageUpload('upload', 'Upload')
            ->setDefaultValue($row->upload) // Obsahuje nap�. namespace/upload.png
            ->setNamespace('namespace');

    // nebo
    $form->addImageUpload('upload2', 'Upload 2', 'namespace', $row->upload);

    $form->onSuccess[] = $this->afterForm;

    return $form;
}

public function afterForm($form, $values) {
    $row = $this->getFromDatabase();
    
    $row->upload = $values->upload; // Obsahuje namespace/unikatniNazevObrazku.png nebo NULL, kdy� nen� vypln�no pole nebo za�krtnuto odstran�n�.

    $row->update();
}

```

**Html n�hledu**

```html
<div class="upload-preview-image-container">
    <a href="/assets/namespace/original/upload.png"><img class="upload-preview-image" src="/assets/namespace/original/upload.png"></a>
</div>
```

## Povinn� pole

P�� v�choz� hodnot� se objev� checkbox + upload.

**Nastanou tyto situace:**

Obr�zek nem� v�choz� hodnotu nebo obr�zek neexistuje:
*Obr�zek nen� nahr�n*: Chyba.
*Obr�zek je nahr�n*: �sp�ch.

Pole m� v�choz� hodnotu:
*Obr�zek nen� nahr�n a checkbox nen� za�krnut�*: �sp�ch.
*Obr�zek je nahr�n a checkbox nen� za�krtnut�*: �sp�ch. (Mo�n� v budoucnu chyba?)
*Obr�zek je nahr�n a checkbox je za�krtnut�*: �sp�ch.
*Obr�zek nen� nahr�n a checkbox je za�krtnut�*: Chyba.

## Funkce

```php

$upload->setPreviewSize(200, 200); // Nastav� pevnou velikost n�hledu

$upload->isUpload(); // FALSE = Za�krtnuto maz�n� nebo obr�zek nebyl nahr�n

$upload->getRawValue(); // Vr�t� bolean nebo pole upload�

```
