<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TaxAppVertex\Communication;

use Generated\Shared\Transfer\CalculableObjectTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\SaleTaxMetadataTransfer;

class CustomerWithVertexSpecificFieldsExpander
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
        if ($transfer->getCustomer()) {
            $transfer->setTaxMetadata(
                (new SaleTaxMetadataTransfer())->setCustomer($this->getCustomerData($transfer)),
            );
        }

        return $transfer;
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer|\Generated\Shared\Transfer\CalculableObjectTransfer $transfer
     *
     * @return array[]
     */
    private function getCustomerData(OrderTransfer|CalculableObjectTransfer $transfer): array
    {
        $result = [
            'customerCode' => [
                'classCode' => $this->vertexCodeMapper->getCustomerClassCode($transfer->getCustomer()->getCustomerReference()),
            ],
        ];

        $exemptionCertificateNumber = $this->vertexCodeMapper->getExemptionCertificate($transfer->getCustomer()->getCustomerReference());

        if ($exemptionCertificateNumber) {
            $result['exemptionCertificate']['exemptionCertificateNumber'] = $exemptionCertificateNumber;
        }

        return $result;
    }
}
