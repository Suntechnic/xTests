<?php

/**
 * Class BxxHelpersIBlocksTest
 */
class BxxHelpersIBlocksTest extends \PHPUnit\Framework\TestCase
{
    // тестирование получения id инфоблоков по коду ИБ
    public function testGetIdByCode(): void
    {
        if (!\Bitrix\Main\Loader::includeModule('iblock')) {
            self::markTestSkipped('Модуль iblock не установлен в этом проекте');
        }

        $rdb = \CIBlock::GetList(
                [],
                ['!CODE' => [false, '']]
            );

        $lstIBlocks = [];
        while ($dctIBlock = $rdb->fetch()) {
            $lstIBlocks[] = [intval($dctIBlock['ID']), $dctIBlock['CODE']];
            if (count($lstIBlocks) > 20) break;
        }

        foreach ($lstIBlocks as $dctIBlock) {
            [$Id, $Code] = $dctIBlock;
            $this->assertSame(
                    $Id,
                    \Bxx\Helpers\IBlocks::getIdByCode($Code)
                );
        }
    }
}
