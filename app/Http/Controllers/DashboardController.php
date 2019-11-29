<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();

        $now = Carbon::now()->format('Y-m-d');

        $url = 'https://api.cloudflare.com/client/v4/zones/' . env('CLOUDFLARE_ZONE_ID') . '/analytics/dashboard?since=2019-10-01T00:00:00Z&until=' . $now . 'T00:00:00Z&continuous=true';

        $headers = [
            'headers' => [
                'X-Auth-Email' => env('CLOUDFLARE_AUTH_EMAIL'),
                'X-Auth-Key'   => env('CLOUDFLARE_AUTH_KEY'),
                'Content-Type' => 'application/json',
            ],
        ];

        $response = $client->request('GET', $url, $headers);

        $result = json_decode($response->getBody()->getContents());

        $labels         = [];
        $requests_datas = [];

        foreach ($result->result->timeseries as $timeserie) {
            $labels[]         = substr($timeserie->since, 0, 10);
            $requests_datas[] = $timeserie->requests->all;
        }

        $chart = [
            'labels'   => $labels,
            'datasets' => [
                [
                    'label'           => '瀏覽數人數',
                    'data'            => $requests_datas,
                    'backgroundColor' => 'red',
                    'borderColor'     => 'red',
                    'fill'            => false,
                ],
            ],
        ];

        return view('welcome', [
            'timeseries' => $result->result->timeseries,
            'totals'     => $result->result->totals,
            'chart'      => $chart,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
