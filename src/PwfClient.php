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

    private $apiBase = 'https://api.paywithfriday.dev/api/pwf';
    private $apiUrl;

    public function __construct(
        string $applicationId,
        string $applicationKey,
        string $version = 'v1'
    )
    {
        $this->applicationId = $applicationId;
        $this->applicationKey = $applicationKey;
        $this->apiUrl = $this->apiBase . '/' . $version;

        $this->requestHeaders = [
            'paywithfriday-application-id' => $this->applicationId,
            'paywithfriday-api-key' => $this->applicationKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    private function post(string $endpoint, array $payload)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post(
            $this->apiUrl . '/' . $endpoint,
            [
                'headers' => $this->requestHeaders,
                'json' => $payload,
            ]
        );
        $body = $response->getBody();
        return json_decode((string) $body);
    }

    /**
     * Returns a greeting statement using the provided name
     */
    public function createCustomer(array $payload)
    {
        return $this->post('customers', $payload);
    }


}
