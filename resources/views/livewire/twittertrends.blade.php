<div>
    <h1 class="text-xl font-bold mb-4">US Twitter Trends</h1>
    
    @if(count($trends) > 0)
        <ul class="space-y-2">
            @foreach($trends as $trend)
                <li class="border p-2 rounded">
                    <strong>{{ $trend['name'] }}</strong>
                    @if(!empty($trend['description']))
                        - {{ $trend['description'] }}
                    @endif
                    <span class="block text-gray-600">{{ $trend['context'] }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>No trends available right now.</p>
    @endif
</div>
