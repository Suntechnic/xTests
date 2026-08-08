<?php

/**
 * Class BxxSettingsTest
 */
class BxxSettingsTest extends \PHPUnit\Framework\TestCase
{


    /**
     * Проверяем что дефолтные значения совпадают с теми что в настройках.
     *  void
     */
    public function testDefaultOptions (): void
    {
        $dctOptions = \Bxx\Settings::getOptionsInfo();
        if (!$dctOptions) {
            $this->markTestSkipped('Реестр настроек пуст');
        }

        foreach ($dctOptions as $Code => $dctOption) {
            if (!isset($dctOption['default'])) continue;

            $this->assertSame(
                    \Bxx\Settings::getOptionDefault($Code),
                    $dctOption['default']
                );
        }
    }




    public function testIO (): void
    {
        if (defined('APPLICATION_ENV') && APPLICATION_ENV === 'production') {
            $this->markTestSkipped('IO-тест отключен в production');
        }

        $refOptionsInfo = \Bxx\Settings::getOptionsInfo();
        if (!$refOptionsInfo) {
            $this->markTestSkipped('Реестр настроек пуст');
        }

        // Текущие значения
        $refOptions = \Bxx\Settings::getOptions();

        // проверить что массив совпадает настройками извлеченными по одной

        // удаляем все настройки
        foreach ($refOptions as $Code=>$_) \Bxx\Settings::delete($Code);

        // подготваливаем массив
        $lstTest = [];
        foreach ($refOptionsInfo as $Code=>$dctOption) { if (!isset($dctOption['default'])) continue;
            $this->assertSame(
                    \Bxx\Settings::get($Code),
                    $dctOption['default'],
                    "Код настройки $Code не совпадает с дефолтным значением"
                );
        }

        // восстанавливаем настройки
        $refOptionsAfterReup = \Bxx\Settings::setOptions($refOptions);
        $this->assertSame(
                $refOptions,
                $refOptionsAfterReup
            );

    }

}