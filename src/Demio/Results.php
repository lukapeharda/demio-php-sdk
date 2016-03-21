<?php

/**
 * @author Oleksandr Torosh <webtorua@gmail.com>
 */
namespace Demio;

class Results extends Injectable
{
    private $response;
    private $contents;

    public function __construct($response)
    {
        $this->response = $response;
        $this->contents = $response->getBody()->getContents();
    }

    public function isSuccess()
    {
        return (count($this->getMessages()) > 0) ? false : true;
    }

    public function results($assoc = false)
    {
        return $this->getContentsObject($assoc);
    }

    public function count()
    {
        $contents = $this->getContentsObject(true);
        return (is_array($contents)) ? count($contents) : 0;
    }

    public function getMessages()
    {
        $contents = $this->getContentsObject();
        if ($contents) {
            if (isset($contents->messages)) {
                return $contents->messages;
            }
        }
        return [];
    }

    public function implodeMessages($glue)
    {
        return implode($glue, $this->getMessages());
    }

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    private function getContentsObject($assoc = false)
    {
        return json_decode($this->contents, $assoc);
    }

}