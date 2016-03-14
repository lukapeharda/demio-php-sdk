<?php

/**
 * @author Oleksandr Torosh <webtorua@gmail.com>
 */
namespace Demio\Http;

use Demio\Injectable;

class Response extends Injectable
{
    private $response;

    /**
     * Response constructor.
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @param int $expected_http_code
     * @return bool
     */
    public function isSuccess($expected_http_code = 200)
    {
        return ($expected_http_code == $this->response->getStatusCode());
    }

    /**
     * Returns JSON as stdClass
     * @return \stdClass
     */
    public function contents()
    {
        $response = clone $this->response;
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @return array
     */
    public function errorMessages()
    {
        $contents = $this->contents();
        if ($contents) {
            if (isset($contents->messages)) {
                return $contents->messages;
            }
        }
        return [];
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return \stdClass
     */
    public function __invoke()
    {
        return $this->contents();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $response = clone $this->response;
        return $response->getBody()->getContents();
    }

}