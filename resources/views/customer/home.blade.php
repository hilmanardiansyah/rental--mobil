<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
   <!-- header section end -->
   <!-- banner section start -->
   <div class="banner_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div id="banner_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="banner_taital_main">
                           <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span></h1>
                           <p class="banner_text">Temukan mobil yang sempurna untuk perjalanan Anda, baik untuk bisnis maupun liburan. Kami menawarkan pilihan sewa yang fleksibel sesuai kebutuhan Anda.</p>
                           <div class="btn_main">
                              <div class="contact_bt"><a href="#">Read More</a></div>
                              <div class="contact_bt active"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                     </div>
                     <!-- Add other carousel items here -->
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="banner_img"><img src="{{asset('assets/images/banner-img.png')}}"></div>
            </div>
         </div>
      </div>
   </div>
   <!-- banner section end -->
   <!-- about section start -->
   <div class="about_section layout_padding">
    <div class="container">
       <div class="about_section_2">
          <div class="row">
             <div class="col-md-6">
                <div class="image_iman"><img src="{{asset('assets/images/about-img.png')}}" class="about_img"></div>
             </div>
             <div class="col-md-6">
                <div class="about_taital_box">
                   <h1 class="about_taital">About <span style="color: #fe5b29;">Us</span></h1>
                   <p class="about_text">Kami berkomitmen untuk menyediakan layanan sewa mobil berkualitas yang sesuai dengan kebutuhan Anda. Baik untuk perjalanan bisnis maupun liburan, kami memiliki berbagai pilihan mobil yang dapat disewa dalam jangka waktu pendek maupun panjang. Layanan pelanggan kami siap membantu memastikan pengalaman penyewaan Anda berjalan lancar dan menyenangkan.</p>
                   <div class="readmore_btn"><a href="#">Read More</a></div>
                </div>
             </div>
          </div>
       </div>
    </div>
   </div>
   <div class="search_section">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <h1 class="search_taital">Search Your Best Cars</h1>
             <p class="search_text">Using 'Content here, content here', making it look like readable</p>

             <!-- select box section start -->
         <form action="{{ route('cars.search') }}" method="GET">
    <div class="container">
        <div class="select_box_section">
            <div class="select_box_main">
                <div class="row">
                    <div class="col-md-3 select-outline">
                        <select name="brand" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                            <option value="" disabled selected>Any Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand }}">{{ $brand }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 select-outline">
                        <select name="model" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                            <option value="" disabled selected>Any Model</option>
                            @foreach($models as $model)
                                <option value="{{ $model }}">{{ $model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 select-outline">
                        <select name="price" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                            <option value="" disabled selected>Price</option>
                            @foreach($prices as $price)
                                <option value="{{ $price }}">{{ $price }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="search_btn">Search Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



             <!-- select box section end -->
          </div>
       </div>
    </div>
</div>

 <!-- gallery section start -->
 <div class="gallery_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="gallery_taital">Our best offers</h1>
            </div>c
        </div>
        <div class="gallery_section_2">
            <div class="row">
                @foreach($cars as $car)
                <div class="col-md-4">
                    <div class="gallery_box">
                        <div class="gallery_img"><img src="{{ asset($car->image) }}"></div> <!-- Gambar mobil dari database -->
                        <h3 class="types_text">{{ $car->name }}</h3>
                        <p class="looking_text">Start per day Rp.{{ $car->rental_rate_per_day }}</p> <!-- Harga per hari mobil -->
                        <div class="read_bt"><a href="#">Book Now</a></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
