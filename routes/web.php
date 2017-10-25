<?php
use Illuminate\Http\Request;

Route::get('/', function () {
      return view('welcome');
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => env('MONICA_API_CLIENT_ID'),
        'redirect_uri' => 'http://client.app/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://monica.app/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://monica.app/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => env('MONICA_API_CLIENT_ID'),
            'client_secret' => env('MONICA_API_CLIENT_SECRET'),
            'redirect_uri' => 'http://client.app/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});