@extends('layouts.app')

@section('content')
<div class="gallery_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="gallery_taital">Our best offers</h1>
            </div>
        </div>
        <div class="gallery_section_2">
            <div class="row">
                @foreach($cars as $car)
                <div class="col-md-4">
                    <div class="gallery_box">
                        <div class="gallery_img">
                            <img src="{{ asset( $car->image) }}" alt="{{ $car->name }}">
                        </div>
                        <h3 class="types_text">{{ $car->name }}</h3>
                        <p class="looking_text">Sewa per hari ${{ $car->rental_rate_per_day }}</p>
                        <div class="read_bt">
                            <a href="{{ route('customer.rent', $car->id) }}">Book Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
