<?php

// app/Http/Controllers/CovidHospitalController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CovidHospitalController extends Controller
{
    protected $apiUrl = 'https://dekontaminasi.com/api/id/covid19/hospitals';

    public function index()
    {
        $hospitals = $this->getHospitals();

        return view('welcome', compact('hospitals'));
    }

    protected function getHospitals()
    {
        $client = new Client();
        $response = $client->get($this->apiUrl);
        $data = json_decode($response->getBody(), true);

        return $data;
    }

    public function getHospitalsByProvince($province){
        $hospitals = collect($this->getHospitals());
        $hospitalFilter = $hospitals->filter(function ($items) use ($province){
            return $items['province'] == $province; 
        });
        return $hospitalFilter;
        
    }

    public function show(Request $request){
        $hospitals = $this->getHospitalsByProvince($request->province);

        return view('welcome', compact('hospitals'));
    }
}
