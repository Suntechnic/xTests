# xTests

Тесты запускаются в директории local/php_interface.  

Для запуска потребуется установить **Bxx** (обычно ```sh git submodule add https://github.com/Suntechnic/xBxx.git local/php_interface/lib/Bxx``` ) и **phpunit** ( ```sh composer require --dev phpunit/phpunit ``` );  

Для того чтобы включить файлы тестов проекта в репозиторий проекта, добавьте в .gitignore ``` !/local/php_interface/tests/App ```.  

```sh
vendor/bin/phpunit tests --bootstrap tests/bitrix.php
```