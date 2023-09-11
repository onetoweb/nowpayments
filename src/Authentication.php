<?php

namespace Onetoweb\NOWPayments;

use Onetoweb\NOWPayments\Responses\DataResponse;

/**
 * Authentication.
 *
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
class Authentication
{
    public static function authenticated(?string $ipnSecret = null): bool|DataResponse
    {
        $ipnSecret ??= getenv('NOW_PAYMENT_SECRET');

        if (empty($ipnSecret))
            throw new \InvalidArgumentException('IPN secret does not exists. please set an IPN !');

        if (empty($receivedHmac = $_SERVER['HTTP_X_NOWPAYMENTS_SIG'] ?? ''))
            throw new \InvalidArgumentException('Can not find "HTTP_X_NOWPAYMENTS_SIG" in $_SERVER');

        if (empty($requestJson = file_get_contents('php://input')))
            throw new \InvalidArgumentException('The request body is empty !');


        $requestData = json_decode($requestJson, true);
        ksort($requestData);
        $sorted_request_json = json_encode($requestData, JSON_UNESCAPED_SLASHES);
        $hmac = hash_hmac('sha512', $sorted_request_json, trim($ipnSecret));

        if ($hmac != $receivedHmac)
            throw new \InvalidArgumentException('HMAC is not valid !');

        return new DataResponse($requestData);
    }

}
