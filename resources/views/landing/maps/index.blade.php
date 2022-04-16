@extends('layouts.landing.index')
@section('content')
    <div id="map"></div>
@endsection
@push('custom-js')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYWthc2gtd2JkIiwiYSI6ImNsMXVoNXN4ODAwZGgzcXBiMjM1OTJhamkifQ.hY0bu7LJKjFlYnfBZuovFw';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [-74.5, 40], // starting position [lng, lat]
            zoom: 9 // starting zoom
        });
    </script>


@endpush
