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
                           <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
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
                   <p class="about_text">going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined </p>
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
             <div class="container">
                <div class="select_box_section">
                   <div class="select_box_main">
                      <div class="row">
                         <div class="col-md-3 select-outline">
                            <select class="mdb-select md-form md-outline colorful-select dropdown-primary">
                               <option value="" disabled selected>Any Brand</option>
                               <option value="1">Option 1</option>
                               <option value="2">Option 2</option>
                               <option value="3">Option 3</option>
                            </select>
                         </div>
                         <div class="col-md-3 select-outline">
                            <select class="mdb-select md-form md-outline colorful-select dropdown-primary">
                               <option value="" disabled selected>Any type</option>
                               <option value="1">Option 1</option>
                               <option value="2">Option 2</option>
                               <option value="3">Option 3</option>
                            </select>
                         </div>
                         <div class="col-md-3 select-outline">
                            <select class="mdb-select md-form md-outline colorful-select dropdown-primary">
                               <option value="" disabled selected>Price</option>
                               <option value="1">Option 1</option>
                               <option value="2">Option 2</option>
                               <option value="3">Option 3</option>
                            </select>
                         </div>
                         <div class="col-md-3">
                            <div class="search_btn"><a href="#">Search Now</a></div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
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
            </div>
        </div>
        <div class="gallery_section_2">
            <div class="row">
                <div class="col-md-4">
                    <div class="gallery_box">
                    <div class="gallery_img"><img src="{{asset('assets/images/img-1.png')}}"></div>
                    <h3 class="types_text">Toyota car</h3>
                        <p class="looking_text">Start per day $4500</p>
                    <div class="read_bt"><a href="#">Book Now</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery_box">
                    <div class="gallery_img"><img src="{{asset ('assets/images/img-2.png')}}"></div>
                    <h3 class="types_text">Toyota car</h3>
                        <p class="looking_text">Start per day $4500</p>
                    <div class="read_bt"><a href="#">Book Now</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery_box">
                    <div class="gallery_img"><img src="{{asset('assets/images/img-3.png')}}"></div>
                    <h3 class="types_text">Toyota car</h3>
                        <p class="looking_text">Start per day $4500</p>
                    <div class="read_bt"><a href="#">Book Now</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery_section_2">
            <div class="row">
                <div class="col-md-4">
                    <div class="gallery_box">
                    <div class="gallery_img"><img src="{{asset('assets/images/img-1.png')}}"></div>
                    <h3 class="types_text">Toyota car</h3>
                        <p class="looking_text">Start per day $4500</p>
                    <div class="read_bt"><a href="#">Book Now</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery_box">
                    <div class="gallery_img"><img src="{{asset('assets/images/img-2.png')}}"></div>
                    <h3 class="types_text">Toyota car</h3>
                        <p class="looking_text">Start per day $4500</p>
                    <div class="read_bt"><a href="#">Book Now</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery_box">
                    <div class="gallery_img"><img src="{{asset('assets/images/img-3.png')}}"></div>
                    <h3 class="types_text">Toyota car</h3>
                        <p class="looking_text">Start per day $4500</p>
                    <div class="read_bt"><a href="#">Book Now</a></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
