
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div id="map" style="width: 100%; height: 80vh;"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</x-app-layout>