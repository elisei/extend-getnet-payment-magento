<?php
/**
 * Copyright © O2TI. All rights reserved.
 *
 * @author    Bruno Elisei <brunoelisei@o2ti.com>
 * See LICENSE for license details.
 */

namespace O2TI\ExtendGetnetPaymentMagento\Plugin\Gateway\Request;

use Getnet\PaymentMagento\Gateway\Request\CcPaymentDataRequest;

class PreAuthCcPaymentDataRequest
{
    /**
     * Pre authorization block name.
     */
    public const PRE_AUTHORIZATION = 'pre_authorization';

    /**
     * Around get data payment cc
     * 
     * @param CcPaymentDataRequest $subject
     * @param Callable $proceed
     * @param mixin ...$args
     * 
     * @return array
     */
    public function aroundGetDataPaymetCc(
        CcPaymentDataRequest $subject,
        callable $proceed,
        ...$args
    ): array {
        $result = $proceed(...$args);
        unset($result[CcPaymentDataRequest::CREDIT][CcPaymentDataRequest::DELAYED]);

        $new[CcPaymentDataRequest::CREDIT] = [
            CcPaymentDataRequest::DELAYED   => false,
            self::PRE_AUTHORIZATION         => true,
        ];

        return array_merge_recursive($result, $new);
    }
}
