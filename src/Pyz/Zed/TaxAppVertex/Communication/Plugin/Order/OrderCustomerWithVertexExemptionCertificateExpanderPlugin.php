<?php

namespace Pyz\Zed\TaxAppVertex\Communication\Plugin\Order;

use Generated\Shared\Transfer\CalculableObjectTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\TaxAppExtension\Dependency\Plugin\CalculableObjectTaxAppExpanderPluginInterface;

class OrderCustomerWithVertexExemptionCertificateExpanderPlugin extends AbstractPlugin implements CalculableObjectTaxAppExpanderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\CalculableObjectTransfer $calculableObjectTransfer
     *
     * @return \Generated\Shared\Transfer\CalculableObjectTransfer
     */
    public function expand(CalculableObjectTransfer $calculableObjectTransfer): CalculableObjectTransfer
    {
        $calculableObjectTransfer->getTaxMetadata()->setCustomer(['exemptionCertificate' => ['exemptionCertificateNumber' => 'vertex-exemption-certificate-number']]);

        return $calculableObjectTransfer;
    }
}
