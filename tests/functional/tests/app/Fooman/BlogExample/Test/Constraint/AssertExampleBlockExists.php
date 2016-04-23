<?php
/**
 * @author     Kristof Ringleff
 * @copyright  Copyright (c) 2015 Fooman Limited (http://www.fooman.co.nz)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fooman\BlogExample\Test\Constraint;

use Magento\Catalog\Test\Page\Product\CatalogProductView;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Catalog\Test\Fixture\CatalogProductSimple;
use Magento\Mtf\Client\BrowserInterface;

class AssertExampleBlockExists extends AbstractConstraint
{
    /**
     * Assert that our example block is added
     *
     * @param CatalogProductView $catalogProductView
     * @param CatalogProductSimple $product
     * @param BrowserInterface $browser
     * @return void
     */
    public function processAssert(
        CatalogProductView $catalogProductView, 
        CatalogProductSimple $product,
        BrowserInterface $browser
    ) {
        $browser->open($_ENV['app_frontend_url'] . $product->getUrlKey() . '.html');


        \PHPUnit_Framework_Assert::assertSame(
            'Hello world',
            $catalogProductView->foomanCatalogProductPageMainBlock()->getBlogExampleBlockText(),
            'Block not found.'
        );
    }

    /**
     * Returns string representation of successful assertion
     *
     * @return string
     */
    public function toString()
    {
        return 'Block is found.';
    }
}
