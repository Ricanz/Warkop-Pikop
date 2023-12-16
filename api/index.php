<?php
include('api.php');
include('../config/function_library.php');

// Controller
include './controller/GeneralController.php';

$baseUrl = 'warkoppikop/api/';
// Fungsi untuk menangani permintaan HTTP GET
function get($route, $callback)
{
    $urlParts = parse_url($_SERVER['REQUEST_URI']);
    $path = trim($urlParts['path'], '/');
    
    $pathSegments = explode('/', $path);
    
    $routeSegments = explode('/', trim($route, '/'));

    if (count($pathSegments) === count($routeSegments)) {
        $params = [];

        foreach ($routeSegments as $index => $routeSegment) {
            if ($routeSegment === '{id}') {
                $params['id'] = $pathSegments[$index];
            } elseif ($pathSegments[$index] !== $routeSegment) {
                return;
            }
        }

        $callback($params);
        exit;
    }
}

function post($route, $callback)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (trim($_SERVER['REQUEST_URI'], '/') === $route) {
            $callback();
            exit;
        }
    }
}


// Fungsi untuk menangani endpoint POST /api/post_data

// Credit Scoring
get($baseUrl . 'banner', function () {
    bannerList();
});

get($baseUrl . 'about', function () {
    getAbout();
});

get($baseUrl . 'founder', function () {
    getFounder();
});

get($baseUrl . 'co-founder', function () {
    getCoFounder();
});

get($baseUrl . 'contact', function () {
    getContact();
});

get($baseUrl . 'franchise', function () {
    franchiseList();
});

get($baseUrl . 'news', function () {
    newsList();
});

get($baseUrl . 'careers', function () {
    careerList();
});

// Jika tidak ada route yang cocok, kirim status 404 Not Found
header("HTTP/1.1 404 Not Found");
echo '404 Not Found';
