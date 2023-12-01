<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TaxAppVertex\Communication;

use DateTime;
use Generated\Shared\Transfer\CalculableObjectTransfer;
use Generated\Shared\Transfer\ItemTaxMetadataTransfer;
use Generated\Shared\Transfer\OrderTransfer;

class ItemWithVertexSpecificFieldsExpander
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
            $itemTransfer->setTaxMetadata(
                (new ItemTaxMetadataTransfer())
                    ->setProduct(
                        [
                            'productClass' => $this->vertexCodeMapper->getProductClassCode($itemTransfer->getSkuOrFail()),
                        ],
                    )
                    ->setFlexibleFields(
                        [
                            'flexibleCodeFields' => $this->getFlexibleCodeFields(),
                            'flexibleNumericFields' => $this->getFlexibleNumericFields(),
                            'flexibleDateFields' => $this->getFlexibleDateFields(),
                            'flexibleCodeFields' => [
                                [
                                    'fieldId' => 1,
                                    'value' => 'vertex-flexible-code-value',
                                ],
                            ],
                        ],
                    ),
            );
        }

        return $transfer;
    }

    /**
     * @return array
     */
    protected function getFlexibleCodeFields(): array
    {
        return [
            [
                'fieldId' => 1,
                'value' => 'VFFC_0',
            ],
        ];
    }

    /**
     * @return array
     */
    protected function getFlexibleNumericFields(): array
    {
        return [
            [
                'fieldId' => 2,
                'value' => 1000,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFlexibleDateFields(): array
    {
        return [
            [
                'fieldId' => 3,
                'value' => (new DateTime())->format('Y-m-d'),
            ],
        ];
    }
}
