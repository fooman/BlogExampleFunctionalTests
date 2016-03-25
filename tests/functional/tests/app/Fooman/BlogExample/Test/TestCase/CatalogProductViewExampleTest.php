<?php

namespace Fooman\BlogExample\Test\TestCase;

use Magento\Mtf\TestCase\Scenario;

class CatalogProductViewExampleTest extends Scenario
{
    /* tags */
    const MVP = 'yes';
    const DOMAIN = 'CS';
    const TEST_TYPE = 'acceptance_test, 3rd_party_test';
    /* end tags */

    /**
     * Runs one page checkout test.
     *
     * @return void
     */
    public function test()
    {
        $this->executeScenario();
    }
}
