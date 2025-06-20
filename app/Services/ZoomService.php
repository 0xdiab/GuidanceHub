<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ZoomService
{
    protected $accessToken;

    public function __construct()
    {
        $this->accessToken = $this->generateAccessToken();
    }

    private function generateAccessToken()
    {
        $response = Http::asForm()->withBasicAuth(
            config('services.zoom.client_id'),
            config('services.zoom.client_secret')
        )->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' => config('services.zoom.account_id'),
        ]);

        // $data = $response->json();
        // // dd($data); 
        // $this->accessToken = $data['access_token'];

        $data = $response->json();

         if (!isset($data['access_token'])) {
            throw new \Exception('Zoom Token Error: ' . json_encode($data));
        }

        return $data['access_token'];
    }

    public function createMeeting($topic, $startTime, $duration = 60)
    {
        $response = Http::withToken($this->accessToken)->post('https://api.zoom.us/v2/users/me/meetings', [
            'topic' => $topic,
            'type' => 2,
            'start_time' => $startTime,
            'duration' => $duration,
            'timezone' => 'Africa/Cairo',
            'settings' => [
                'join_before_host' => false,
                'waiting_room'     => true,
            ]
        ]);

        return $response->json();
    }
}
