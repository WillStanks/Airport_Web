<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * KrajRegionsFixture
 */
class KrajRegionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ID kraj_regione', 'autoIncrement' => true, 'precision' => null],
        'kod' => ['type' => 'string', 'length' => 7, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'comment' => 'Kód kraj_regione', 'precision' => null],
        'nazev' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'comment' => 'Název kraj_regione', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_czech_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'kod' => 'Lorem',
                'nazev' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
