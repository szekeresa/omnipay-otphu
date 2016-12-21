<?php
/**
 * Contains Clapp\OtpHu\Contract\TransactionIdFactoryContract.
 */

namespace Clapp\OtpHu\Contract;

/**
 * A common interface for classes that can generate transactions IDs.
 */
interface TransactionIdFactoryContract
{
    /**
     * Generate a new, unique transaction ID to be used for a new purchase.
     *
     * The transaction ID should be unique to the shopID
     *
     * @param array $parameters merged list of gateway purchase parameters
     *
     * @return string new, unique transaction ID
     */
    public function generateTransactionId($parameters = []);
}
