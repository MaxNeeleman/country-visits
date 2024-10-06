<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Visits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
</head>
<body onload="map.setSelectedRegions(visitedCountries);">
    <div style="padding: 10px;">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    <div id="map" style="width: 99vw; height: 98vh;"></div>
    <script>
        var visitedCountries = @json($visitedCountries);
        const map = new jsVectorMap({
            selector: '#map',
            map: 'world',
            backgroundColor: '#a5bfdd',
            regionStyle: {
                initial: {
                    fill: '#e4e4e4',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    fill: '#2938bc',
                    "fill-opacity": 0.2,
                    cursor: 'pointer'
                },
                selected: {
                    fill: '#2938bc'
                },
                selectedHover: {}
            },
            onRegionClick: function(e, code) {
                $.ajax({
                    url: '/toggle-country',
                    method: 'POST',
                    data: {
                        country_code: code,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === 'added') {
                            visitedCountries.push(code);
                        } else {
                            visitedCountries = visitedCountries.filter(c => c !== code);
                        }
                        map.setSelectedRegions(visitedCountries);
                    }
                });
            }
        });

        map.setSelectedRegions(visitedCountries);
    </script>
</body>
</html>