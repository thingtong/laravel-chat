<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait TwitterTrait
{
    public function searchTweets($query)
    {
        $client = new Client();
        $url = 'https://api.twitter.com/2/tweets/search/recent';
        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('TWITTER_BEARER_TOKEN'),
                ],
                'query' => [
                    'query' => $query,
                ],
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error('Error searching tweets: ' . $e->getMessage());
            return null;
        }
    }
}
