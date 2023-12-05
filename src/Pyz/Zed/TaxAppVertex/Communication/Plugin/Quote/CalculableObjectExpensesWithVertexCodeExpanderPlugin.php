<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TaxAppVertex\Communication\Plugin\Quote;

use Generated\Shared\Transfer\CalculableObjectTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\TaxAppExtension\Dependency\Plugin\CalculableObjectTaxAppExpanderPluginInterface;

/**
 * @method \Spryker\Zed\TaxAppVertex\Communication\TaxAppVertexCommunicationFactory getFactory()
 */
class CalculableObjectExpensesWithVertexCodeExpanderPlugin extends AbstractPlugin implements CalculableObjectTaxAppExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CalculableObjectTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\CalculableObjectTransfer
     */
    public function expand(CalculableObjectTransfer $quoteTransfer): CalculableObjectTransfer
    {
        /** @var \Generated\Shared\Transfer\CalculableObjectTransfer $quoteTransfer */
        $quoteTransfer = $this->getFactory()->createExpensesWithVertexCodeExpander()->expand($quoteTransfer);

        return $quoteTransfer;
    }
}
