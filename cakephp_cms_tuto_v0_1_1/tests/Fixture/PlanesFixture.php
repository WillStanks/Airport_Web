<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlanesFixture
 */
class PlanesFixture extends TestFixture
{
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
                'title' => 'Lorem ipsum dolor sit amet',
                'seats' => 1,
                'details' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-09-01 16:45:52',
                'modified' => '2022-09-01 16:45:52',
            ],
        ];
        parent::init();
    }
}
