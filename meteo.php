<?php

// 1. Get the city name from the command line argument
$city = readline("Saisir le nom d'une ville dont vous souhaitez connaître la météo: \n");

// Load .env file
require 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);       // Instance de Dotenv pour lire les fichiers .env
$dotenv->safeLoad();

// 2. Build the API URL with the city name and your API key
$api_key = $_ENV['API_KEY'];
$url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $api_key . "&units=metric&lang=fr";


// 3. Send a GET request to the API
$json = file_get_contents($url);

// Si on ne reçoit rien de l'API
if($json === FALSE)
{
    echo "An error occurred while getting data from API\n";
    exit(1);
}


// 4. Decode the JSON response
$data = json_decode($json, true);

// Réponse valide?
if(array_key_exists("cod", $data) && $data["cod"] != 200)
{
    echo "Invalid city name\n";
    exit(1);
}



// 5. Extract the weather information
$weather    = $data['weather'][0]['description'];
$temp       = $data['main']['temp'];
$temp_min   = $data['main']['temp_min'];
$temp_max   = $data['main']['temp_max'];


// 6. Print the weather information
echo "Météo à  " . $city . ": " . $weather . "\n";
echo "Température: " . $temp . "°C\n";
echo "Minimale: " . $temp_min . "°C\n";
echo "Maximale: " . $temp_max . "°C\n";
