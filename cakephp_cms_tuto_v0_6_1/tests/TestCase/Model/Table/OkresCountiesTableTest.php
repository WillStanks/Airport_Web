<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OkresCountiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OkresCountiesTable Test Case
 */
class OkresCountiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OkresCountiesTable
     */
    protected $OkresCounties;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OkresCounties',
        'app.KrajRegions',
        'app.ObecCities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OkresCounties') ? [] : ['className' => OkresCountiesTable::class];
        $this->OkresCounties = $this->getTableLocator()->get('OkresCounties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OkresCounties);

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
