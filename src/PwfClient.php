<?php

/**
 * This file is part of fridaycollective/paywithfriday-lib
 *
 * @copyright Copyright (c) Friday Collective <hey@fridaycollective.co.uk>. All rights reserved.
 */

declare(strict_types=1);

namespace Fridaycollective\Paywithfriday\Lib;

/**
 * An example class to act as a starting point for developing your library
 */
class PwfClient
{
    private $applicationId;
    private $applicationKey;

    private $requestHeaders;

    public function __construct(
        string $applicationId,
        string $applicationKey
    )
    {
        $this->applicationId = $applicationId;
        $this->applicationKey = $applicationKey;

        $this->requestHeaders = [
            'paywithfriday-application-id' => $this->applicationKey,
            'paywithfriday-api-key' => $this->applicationId,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    /**
     * Returns a greeting statement using the provided name
     */
    public function createCustomer(array $payload)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post(
            'https://api.paywithfriday.com/api/pwf/v1/customers',
            [
                'headers' => $this->requestHeaders,
                'json' => $payload,
            ]
        );
        $body = $response->getBody();
        return json_decode((string) $body);
    }


}
