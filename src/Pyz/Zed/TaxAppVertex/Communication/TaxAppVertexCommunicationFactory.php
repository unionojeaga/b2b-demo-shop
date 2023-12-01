<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TaxAppVertex\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class TaxAppVertexCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\TaxAppVertex\Communication\CustomerWithVertexSpecificFieldsExpander
     */
    public function createCustomerWithVertexSpecificFieldsMapper(): CustomerWithVertexSpecificFieldsExpander
    {
        return new CustomerWithVertexSpecificFieldsExpander(
            $this->createVertexCodeMapper(),
        );
    }

    /**
     * @return \Spryker\Zed\TaxAppVertex\Communication\ExpensesWithVertexCodeExpander
     */
    public function createExpensesWithVertexCodeExpander(): ExpensesWithVertexCodeExpander
    {
        return new ExpensesWithVertexCodeExpander(
            $this->createVertexCodeMapper(),
        );
    }

    /**
     * @return \Spryker\Zed\TaxAppVertex\Communication\ItemWithVertexSpecificFieldsExpander
     */
    public function createItemWithVertexTaxCodeExpander(): ItemWithVertexSpecificFieldsExpander
    {
        return new ItemWithVertexSpecificFieldsExpander(
            $this->createVertexCodeMapper(),
        );
    }

    /**
     * @return \Spryker\Zed\TaxAppVertex\Communication\ProductOptionWithVertexCodeExpander
     */
    public function createProductOptionWithVertexCodeExpander(): ProductOptionWithVertexCodeExpander
    {
        return new ProductOptionWithVertexCodeExpander(
            $this->createVertexCodeMapper(),
        );
    }

    /**
     * @return \Spryker\Zed\TaxAppVertex\Communication\VertexCodeMapper
     */
    public function createVertexCodeMapper(): VertexCodeMapper
    {
        return new VertexCodeMapper();
    }
}
