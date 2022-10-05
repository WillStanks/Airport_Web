<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvincesStatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvincesStatesTable Test Case
 */
class ProvincesStatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvincesStatesTable
     */
    protected $ProvincesStates;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ProvincesStates',
        'app.Countries',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProvincesStates') ? [] : ['className' => ProvincesStatesTable::class];
        $this->ProvincesStates = $this->getTableLocator()->get('ProvincesStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProvincesStates);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProvincesStatesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProvincesStatesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
