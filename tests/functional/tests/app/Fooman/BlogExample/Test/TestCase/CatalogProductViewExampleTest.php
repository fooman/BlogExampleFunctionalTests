<?php

namespace Fooman\BlogExample\Test\TestCase;

use Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex;
use Magento\Catalog\Test\Page\Adminhtml\CatalogProductNew;
use Magento\Mtf\Fixture\FixtureFactory;
use Magento\Mtf\TestCase\Injectable;

class CatalogProductViewExampleTest extends Injectable
{
    /* tags */
    const TEST_TYPE = 'acceptance_test, extended_acceptance_test';
    const MVP = 'yes';
    const DOMAIN = 'MX';
    /* end tags */

    /**
     * Product page with a grid
     *
     * @var CatalogProductIndex
     */
    protected $catalogProductIndex;

    /**
     * Page to create a product
     *
     * @var CatalogProductNew
     */
    protected $catalogProductNew;

    /**
     * Fixture Factory
     *
     * @var FixtureFactory
     */
    protected $fixtureFactory;

    /**
     * Injection data
     *
     * @param CatalogProductIndex $catalogProductIndex
     * @param CatalogProductNew $catalogProductNew
     * @param FixtureFactory $fixtureFactory
     * @return void
     */
    public function __inject(
        CatalogProductIndex $catalogProductIndex,
        CatalogProductNew $catalogProductNew,
        FixtureFactory $fixtureFactory
    ) {
        $this->catalogProductIndex = $catalogProductIndex;
        $this->catalogProductNew = $catalogProductNew;
        $this->fixtureFactory = $fixtureFactory;
    }

    /**
     * Run product type switching on creation test
     *
     * @param string $createProduct
     * @param string $product
     * @return array
     */
    public function test($createProduct, $product)
    {
        list($fixture, $dataset) = explode('::', $product);
        $product = $this->fixtureFactory->createByCode($fixture, ['dataset' => $dataset]);
        $this->catalogProductIndex->open();
        $this->catalogProductIndex->getGridPageActionBlock()->addProduct($createProduct);
        $this->catalogProductNew->getProductForm()->fill($product);
        $this->catalogProductNew->getFormPageActions()->save($product);

        return ['product' => $product];
    }
}
