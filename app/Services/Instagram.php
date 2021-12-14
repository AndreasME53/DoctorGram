<?php

namespace App\Services;

class Instagram 
{
    private $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function instaPost($text)
    {
        $newString = $text.$this->apikey;
    }
}