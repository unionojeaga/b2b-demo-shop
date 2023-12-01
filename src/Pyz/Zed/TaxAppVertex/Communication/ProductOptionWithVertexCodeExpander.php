<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TaxAppVertex\Communication;

use Generated\Shared\Transfer\CalculableObjectTransfer;
use Generated\Shared\Transfer\ItemTaxMetadataTransfer;
use Generated\Shared\Transfer\OrderTransfer;

class ProductOptionWithVertexCodeExpander
{
    /**
     * @var \Spryker\Zed\TaxAppVertex\Communication\VertexCodeMapper
     */
    protected VertexCodeMapper $vertexCodeMapper;

    /**
     * @param \Spryker\Zed\TaxAppVertex\Communication\VertexCodeMapper $vertexCodeMapper
     */
    public function __construct(VertexCodeMapper $vertexCodeMapper)
    {
        $this->vertexCodeMapper = $vertexCodeMapper;
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer|\Generated\Shared\Transfer\CalculableObjectTransfer $transfer
     *
     * @return \Generated\Shared\Transfer\OrderTransfer|\Generated\Shared\Transfer\CalculableObjectTransfer
     */
    public function expand(OrderTransfer|CalculableObjectTransfer $transfer): OrderTransfer|CalculableObjectTransfer
    {
        foreach ($transfer->getItems() as $itemTransfer) {
            if ($itemTransfer->getProductOptions()->count() > 0) {
                foreach ($itemTransfer->getProductOptions() as $productOption) {
                    $productOption->setTaxMetadata(
                        (new ItemTaxMetadataTransfer())
                            ->setProduct(
                                [
                                    'productClass' => $this->vertexCodeMapper->getProductOptionClassCode($productOption->getSku()),
                                ],
                            ),
                    );
                }
            }
        }

        return $transfer;
    }
}
