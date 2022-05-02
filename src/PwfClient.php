<?php

/**
 * This file is part of fridaycollective/paywithfriday-lib
 *
 * @copyright Copyright (c) Friday Collective <hey@fridaycollective.co.uk>. All rights reserved.
 */

declare(strict_types=1);

namespace Fridaycollective\Paywithfriday\Lib;

use GuzzleHttp\Exception\GuzzleException;

/**
 * An example class to act as a starting point for developing your library
 */
class PwfClient
{
    private string $applicationId;
    private string $applicationKey;
    private array $requestHeaders;

    private string $apiBase = 'https://api.paywithfriday.com/api/pwf';
    private string $apiUrl;

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

    /**
     * @throws GuzzleException
     */
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
     * Creates a new customer
     * @throws GuzzleException
     */
    public function createCustomer(array $payload)
    {
        return $this->post('customers', $payload);
    }

    /**
     * Creates a new subscription
     * @throws GuzzleException
     */
    public function createSubscription(array $payload)
    {
        return $this->post('subscriptions', $payload);
    }


}
