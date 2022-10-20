<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KrajRegionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KrajRegionsTable Test Case
 */
class KrajRegionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KrajRegionsTable
     */
    protected $KrajRegions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.KrajRegions',
        'app.ObecCities',
        'app.OkresCounties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('KrajRegions') ? [] : ['className' => KrajRegionsTable::class];
        $this->KrajRegions = $this->getTableLocator()->get('KrajRegions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->KrajRegions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
