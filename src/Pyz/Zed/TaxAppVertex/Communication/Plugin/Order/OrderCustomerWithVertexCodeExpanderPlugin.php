<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TaxAppVertex\Communication\Plugin\Order;

use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\TaxAppExtension\Dependency\Plugin\OrderTaxAppExpanderPluginInterface;

/**
 * @method \Spryker\Zed\TaxAppVertex\Communication\TaxAppVertexCommunicationFactory getFactory()
 */
class OrderCustomerWithVertexCodeExpanderPlugin extends AbstractPlugin implements OrderTaxAppExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    public function expand(OrderTransfer $orderTransfer): OrderTransfer
    {
        /** @var \Generated\Shared\Transfer\OrderTransfer $orderTransfer */
        //$orderTransfer = $this->getFactory()->createCustomerWithVertexSpecificFieldsMapper()->expand($orderTransfer);
        $orderTransfer->getTaxMetadata()->setCustomer(['customerCode' => ['classCode' => 'vertex-customer-code']]);
        return $orderTransfer;
    }
}
