<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Twittertrends extends Component
{
    public $trends = [];
    public $location = 'UnitedStates'; // Default location
    public $errorMessage = '';

    public function mount()
    {
        $this->searchTrends();
    }

    /**
     * Fetch Twitter trends for the specified location.
     */
    public function searchTrends()
    {
        // Reset error message each time we fetch new data.
        $this->errorMessage = '';

        // Make the GET request to the API using the current location.
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'twitter-api45.p.rapidapi.com',
            // For better security, consider storing this key in your .env file and using env('RAPIDAPI_KEY')
            'x-rapidapi-key'  => env('RAPIDAPI_KEY', '9892f695e8msh4e532b31bdba2fep1b52c3jsn44356d630ee9'),
        ])->get('https://twitter-api45.p.rapidapi.com/trends.php', [
            'country' => $this->location,
        ]);

        // Check if the response was successful.
        if ($response->successful()) {
            $json = $response->json();

            // Ensure the response contains a "trends" key with an array value.
            if (isset($json['trends']) && is_array($json['trends'])) {
                $this->trends = $json['trends'];
            } else {
                $this->trends = [];
                $this->errorMessage = 'No trends found for this location. Please verify the location name or try again later.';
            }
        } else {
            $this->trends = [];
            $this->errorMessage = 'Failed to fetch trends. Please try again later.';
        }
    }

    public function render()
    {
        return view('livewire.twittertrends');
    }
}
