<?php

namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Twittertrends extends Component
{
    public $trends = [];

    public function mount()
    {
        // Make the GET request to the API
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'twitter-api45.p.rapidapi.com',
            'x-rapidapi-key'  => '9892f695e8msh4e532b31bdba2fep1b52c3jsn44356d630ee9', // Replace with your env variable ideally
        ])->get('https://twitter-api45.p.rapidapi.com/trends.php', [
            'country' => 'UnitedStates',
        ]);

        // Decode JSON and store trends in a public property
        $this->trends = data_get($response->json(), 'trends', []);
    }

    public function render()
    {
        return view('livewire.twittertrends');
    }
}
