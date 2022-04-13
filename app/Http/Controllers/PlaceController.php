<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaceController extends Controller
{
    protected $cities = [
        'Tokyo, JP',
        'Yokohama, JP',
        'Kyoto, JP',
        'Osaka, JP',
        'Sapporo, JP',
        'Nagoya, JP',
    ];

    protected $place_search_fields = [
        'fsq_id',
        'categories',
        'chains',
        'distance',
        'link',
        'location',
        'name',
    ];

    protected $categories = [];

    public function getRandomCities()
    {
        $output = [];

        foreach ($this->cities as $key => $city) {          
            $city_data = [];  
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => config('services.places.token'),
            ])->get('https://api.foursquare.com/v3/places/search', [ 'near' => $city]);

            $result = $response['results'];
            $random_result = $result[rand(0, count($result)-1)];

            $city_data['city'] = $city;
            $city_data['active'] = !$key ? true : false;
            $city_data['key'] = $key;

            foreach ($this->place_search_fields as $field) {
                $city_data['details'][$field] = $random_result[$field];

                // Get random image
                if ($field == 'fsq_id')
                {
                    $images = $this->getImages($random_result['fsq_id']);
                    $images_count = count( (array) $images);
                    $city_data['details']['sample_photo'] = $images[rand(0, $images_count-1)];
                }
            }

            $output[] = $city_data;
        }

        return json_encode($output);
    }

    public function getCity($id, $category = null)
    {
        $output = [];
        $city_data = [];  
        $output['city'] = $this->cities[$id];

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => config('services.places.token'),
        ])->get('https://api.foursquare.com/v3/places/search', [ 'near' => $output['city'], 'categories' => $category]);

        $result = $response['results'];

        foreach ($result as $key => $value) {
            foreach ($this->place_search_fields as $field) {
                $city_data[$field] = $value[$field];

                if ($field == 'fsq_id'){
                    $images = $this->getImages($value['fsq_id']);
                    $images_count = count( (array) $images);
                    $x = 0;

                    // Get all photos
                    while ($x <= $images_count) {
                        $city_data['sample_photo'][] = $images[$x];
                        $x += 1;
                    }

                    $city_data['random_photo'] = $images[rand(0, $images_count-1)];
                    $city_data['active'] = !$key ? true : false;
                    $city_data['key'] = $key;
                }

                // Set categories
                if ($field == 'categories'){
                    foreach ($value['categories'] as $category) {
                        $this->categories[$category['id']] = $category;
                    }
                }
            }
            $output['details'][] = $city_data;
        }

        $output['categories'] = $this->categories;
        return $output;
    }

    public function getImages($fsq_id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => config('services.places.token'),
        ])->get('https://api.foursquare.com/v3/places/' . $fsq_id . '/photos', []);

        return $response;
    }

    public function getByCategory(Request $request)
    {
        $result = $this->getCity($request->city_id, $request->category_id);
        return $result;
    }
}
