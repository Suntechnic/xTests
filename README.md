# xTests

Для начала тестирования добавьте этот репозиторий как подмодуль: ``` git submodule add https://github.com/Suntechnic/xTests.git local/php_interface/tests/Bxx ```  

Для запуска потребуется установить **Bxx** (обычно ``` git submodule add https://github.com/Suntechnic/xBxx.git local/php_interface/lib/Bxx ``` ) и **phpunit** ( ``` composer require --dev phpunit/phpunit ``` );  

Для того чтобы включить файлы тестов проекта в репозиторий проекта, добавьте в .gitignore ``` !/local/php_interface/tests/App ```.  

Тесты запускаются в директории local/php_interface.  
```sh
vendor/bin/phpunit tests --bootstrap tests/Bxx/bitrix.php
```

Проектные тесты разместите в директории local/php_interface/tests/App. Смотрите пример в local/php_interface/tests/Bxx/BxxSettingsTest.php