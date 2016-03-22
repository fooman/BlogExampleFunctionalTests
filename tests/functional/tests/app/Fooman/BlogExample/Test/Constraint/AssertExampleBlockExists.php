<?php
/**
 * @author     Kristof Ringleff
 * @copyright  Copyright (c) 2015 Fooman Limited (http://www.fooman.co.nz)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fooman\BlogExample\Test\Constraint;

use Magento\Catalog\Test\Page\Product\CatalogProductView
use Magento\Mtf\Constraint\AbstractConstraint as OriginalAbstractConstraint;
use Magento\Mtf\Client\Locator;

abstract class AssertExampleBlockExists extends OriginalAbstractConstraint
{
    /**
     * Assert that our example block is added
     *
     * @param CatalogProductView $CatalogProductView
     * @return void
     */
    public function processAssert(CatalogProductView $catalogProductView)
    {
        \PHPUnit_Framework_Assert::assertSame(
            'Some text',
            $catalogProductView->getViewBlock()->waitForElementVisible('.fooman-blog-example', Locator::SELECTOR_CSS),
            'Increment id not correct.'
        );
    }

    /**
     * Returns string representation of successful assertion
     *
     * @return string
     */
    public function toString()
    {
        return 'Increment id is correct.';
    }
}
