<?php

namespace Combis\Api;

use \Combis\Model\RenterManager;

require_once('Controller/RenterController.php');

class Meteo
{
    private $token = '552d5cce796f0f62ff8453d3515c5e5c8c077f13dbc8d33d4a914adbd2cc1a28';

    public function insee($renterZipcode, $renterCity)
    {
        $insee = '';
        $data = file_get_contents('https://api.meteo-concept.com/api/location/cities?token=' . $this->token 
        . '&search=' . urlencode($renterCity));

        if ($data) {
            $cities = json_decode($data)->cities;
            foreach ($cities as $city)
                if ($city->cp == $renterZipcode) {
                    $insee = $city->insee;
                }
        }

        return $insee;

    }

    public function meteo($renterZipcode, $renterCity)
    {
        try {
            $insee = $this->insee($renterZipcode, $renterCity);

            $url = 'https://api.meteo-concept.com/api/forecast/daily?insee='.$insee;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'X-AUTH-TOKEN: '.$this->token));
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            if ($data) {
                $status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
            curl_close($ch);
            $forecasts = [];
            }

            if ($data && $status === 200) {
                $decoded = json_decode($data);
                $forecasts = $decoded->forecast;
            }

            return $forecasts;

        } catch (\Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
