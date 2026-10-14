<?php

namespace Onetoweb\NOWPayments\Endpoint;

use Onetoweb\NOWPayments\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use Onetoweb\NOWPayments\Config\Method;

/**
 * Abstract Endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
abstract class AbstractEndpoint implements EndpointInterface
{
    /**
     * @param Client $client
     */
    public function __construct(
        protected Client $client
    ) {
        
    }
    
    /**
     * @param ?string $endpoint = null
     * 
     * @return string
     */
    private function getUrl(?string $endpoint = null): string
    {
        return implode('/', [
            $this->client->getApiEndpoint(),
            $this->client::API_VERSION,
            $this->getResource(),
            $endpoint
        ]);
    }
    
    /**
     * @param Method $method = Method::GET
     * @param ?string $endpoint = null
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array
     */
    protected function request(Method $method = Method::GET, ?string $endpoint = null, array $data = [], array $query = []): array
    {
        $options = [
            RequestOptions::HEADERS => [
                'x-api-key' => $this->client->getApiKey()
            ],
            RequestOptions::QUERY => $query
        ];
        
        if ($method == Method::POST) {
            $options[RequestOptions::JSON] = $data;
        }
        
        try {
            
            $guzzleClient = new GuzzleClient();
            $response  = $guzzleClient->request($method->value, $this->getUrl($endpoint), $options);
            
            return json_decode($response->getBody()->getContents(), true);
            
        } catch (RequestException $requestException) {
            
            if ($requestException->hasResponse()) {
                
                return json_decode($requestException->getResponse()->getBody()->getContents(), true);
                
            }
            
            return [
                'message' => 'no response'
            ];
        }
    }
}
