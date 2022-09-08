<?php

namespace App\Services;

class Pushall
{
    private $id;
    private $apiKey;
    protected $url = "https://pushall.ru/api.php";

    public function __construct(string $id, string $apiKey)
    {
        $this->id = $id;
        $this->apiKey = $apiKey;
    }

    public function send(string $title, string $text)
    {
        $data = [
            "type"  => "self",
            "id"    => $this->id,
            "key"   => $this->apiKey,
            "text"  => mb_strimwidth(($title . ' ' . $text), 0, 50, '...'),
            "title" => 'Создана новая статья!'
        ];

        $client = new \GuzzleHttp\Client(['base_uri' => $this->url]);

        return $client->post('', ['form_params' => $data]);
    }
}
