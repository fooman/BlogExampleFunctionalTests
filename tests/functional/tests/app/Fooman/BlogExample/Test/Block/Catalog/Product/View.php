<?php
/**
 * @author     Kristof Ringleff
 * @copyright  Copyright (c) 2015 Fooman Limited (http://www.fooman.co.nz)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fooman\BlogExample\Test\Block\Catalog\Product;

use Magento\Mtf\Block\Block;
use Magento\Mtf\Client\Locator;

/**
 * Class View
 * Catalog product page view block
 */
class View extends Block
{
    /**
     * Check if blog example block exists
     *
     * @var string
     */
    protected $blockSelector = '.fooman-blog-example';

    /**
     * @return string
     */
    public function getBlogExampleBlock()
    {
        return $this->_rootElement->find($this->blockSelector, Locator::SELECTOR_CSS)->getText();
    }
}

