<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObecCitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObecCitiesTable Test Case
 */
class ObecCitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ObecCitiesTable
     */
    protected $ObecCities;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ObecCities',
        'app.KrajRegions',
        'app.OkresCounties',
        'app.Articles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ObecCities') ? [] : ['className' => ObecCitiesTable::class];
        $this->ObecCities = $this->getTableLocator()->get('ObecCities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ObecCities);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
