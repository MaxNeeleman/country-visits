<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Map</title>
    <link rel="icon" type="image/x-icon" href="data:image/png;base64,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">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
</html>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="shadow-xl sm:rounded-lg" id="map" style="width: 100%; height: 80vh;"></div>
            </div>
        </div>
    </div>
    <style>
        .jvm-tooltip {
            background-color: #ffffff;
            border-radius: 3px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            color: #333;
            font-size: 14px;
            padding: 5px 10px;
            pointer-events: none;
            position: absolute;
            z-index: 1000;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                onRegionTooltipShow: function(event, tooltip, code) {
                tooltip.text(
                    `<h5>   ${tooltip.text()} </h5>` +
                    '<p>' + (visitedCountries.includes(code) ? 'Visited' : 'Not visited') + '</p>',
                    true
                );
                },
                onRegionClick: function (e, code) {
                    $.ajax({
                        url: '/toggle-country',
                        method: 'POST',
                        data: {
                            country_code: code,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
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
        });
    </script>
</x-app-layout>