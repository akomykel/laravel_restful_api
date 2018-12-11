<?php

namespace App\Http\Controllers;

use App\Player;

class HomeController extends Controller
{
    public function my_first_api()
    {
        $data = [
          0 => [
                  "name" => "Michael",
                  "mobile" => "09956115017",
                  "email" => "akomykel@gmail.com",
                  "age" => 35,
                  "status" => 0,
               ],
          1 => [
                  "name" => "Test Name",
                  "mobile" => "1234567890",
                  "email" => "12345@gmail.com",
                  "age" => 23,
                  "status" => 0
               ],
          2 => [
                  "name" => "Karren",
                  "mobile" => "09171005067",
                  "email" => "karren@gmail.com",
                  "age" => 30,
                  "status" => 0
               ]
        ];

        return response()->json($data);
    }

    public function showAllPlayers()
    {
        $players = Player::all();
        return response()->json($players);
    }

    public function showPlayerById($id)
    {
        $player = Player::find($id);
        return response()->json($player);
    }

    public function showConnectwiseCompanies()
    {
        $header = array();
        $header[] = 'Content-type:application/json';
        $header[] = 'Authorization:Basic TXlydGVjK0FmdUh3cVlLMllNNlplRGg6WXhaYkVLWTkyRzNvUUUxRA==';
        $header[] = 'Access-Control-Allow-Origin:http://localhost:3000';

        $url = "https://api-aus.myconnectwise.net/v2018_6/apis/3.0/company/companies/?pageSize=1000&page=1";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        echo "<pre>";
        print_r($output);
        echo "</pre>";
    }
}
