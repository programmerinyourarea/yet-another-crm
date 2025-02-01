<div class="max-w-4xl mx-auto p-6">
    <!-- Search Form -->
    <div class="mb-6">
        <form wire:submit.prevent="searchTrends" class="flex items-center justify-center">
            <input 
                type="text" 
                wire:model.defer="location" 
                placeholder="Enter location (e.g., UnitedStates)" 
                class="flex-1 border border-gray-300 p-3 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
            />
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-3 rounded-r-md hover:bg-blue-600 transition-colors"
            >
                Search
            </button>
        </form>
    </div>

    <!-- Error Message (if any) -->
    @if($errorMessage)
        <div class="mb-4 text-center text-red-500">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Loading Indicator -->
    <div wire:loading.delay class="text-center text-blue-500 mb-4">
        Loading trends...
    </div>

    <!-- Trends List -->
    @if(empty($trends))
        <p class="text-center text-gray-500">No trends to display for "{{ $location }}".</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($trends as $trend)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        {{ data_get($trend, 'name') }}
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Trending on Twitter
                    </p>
                    @if(data_get($trend, 'url'))
                        <a 
                            href="{{ data_get($trend, 'url') }}" 
                            target="_blank" 
                            class="mt-3 inline-block text-blue-500 hover:underline text-sm"
                        >
                            View on Twitter &rarr;
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
