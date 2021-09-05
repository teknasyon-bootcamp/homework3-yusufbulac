<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */


class Form
{
    public array $fields;

    private function __construct(string $action, string $method)
    {
        $this->action = $action;
        $this->method = $method;
    }


    public static function createPostForm(string $action): Form
    {
        return new self($action, "POST");
    }

    public static function createGetForm(string $action): Form
    {
        return new self($action, "GET");
    }

    public static function createForm(string $action, string $method): Form
    {
        return new self($action, $method);
    }

    public function addField(string $label, string $name, ?int $defaultValue = null): void
    {
        $this->fields = [$label, $name, $defaultValue];
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function render(): void
    {
?>
        <form method='<?= $this->method ?>' action='<?= $this->action ?>'>

            <?php
            foreach ($this->fields as $field) {
            ?>
                <label for='<?= $field ?>'>Surname</label>
                <input type='text' name='<?= $field ?>' value='' />
            <?php
            }
            ?>
            <button type='submit'>Gönder</button>
        </form>

<?php
    }
}
