<?php

namespace Fooman\BlogExample\Test\TestCase;

use Magento\Mtf\TestCase\Injectable;
use Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex;

class CatalogProductViewExampleTest extends Injectable
{
    /* tags */
    const TEST_TYPE = 'acceptance_test, extended_acceptance_test';
    const MVP = 'yes';
    const DOMAIN = 'MX';
    /* end tags */

    /**
     * Page product on backend
     *
     * @var CatalogProductIndex
     */
    protected $catalogProductIndex;

    /**
     * Filling objects of the class
     *
     * @param CatalogProductIndex $catalogProductIndexNewPage
     * @param CatalogProductNew $catalogProductNewPage
     * @return void
     */
    public function __inject(
        CatalogProductIndex $catalogProductIndexNewPage
    ) {
        $this->catalogProductIndex = $catalogProductIndexNewPage;
    }

    /**
     * Test create simple product
     *
     * @return void
     */
    public function test()
    {
        $this->catalogProductIndex->open();
        $this->catalogProductIndex->getGridPageActionBlock()->addProduct();
    }
}
