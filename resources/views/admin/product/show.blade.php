@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <!--Product-->
           <div class="col-lg-7 wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">

               <img class="img-fluid" src="{{asset(Storage::url($product->image_path))}}" alt="">

           </div>
           <!--/.Product-->
           <!--Info-->
           <div class="col-lg-5">
               <!--First row-->
               <div class="row wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">
                   <div class="col-md-12">
                       <!--Product-->
                       <div class="product-wrapper">

                           <!--Product data-->
                           <h2 class="h2-responsive mt-4 font-bold">{{$product->name}}</h2>
                           <hr>

                           <h2>
                               <span class="badge blue">£{{$product->price}}</span>
                           </h2>
                           <dl class="row mt-4">
                               <dt class="col-sm-3">Decription</dt>
                               <dd class="col-sm-9">{{$product->description}}</dd>
                           </dl>
                           <hr>
                           <a href="#" class="btn btn-outline-success waves-effect"><i class="fas fa-plus"></i> Add to cart </a>
                       </div>
                       <!--Product-->

                   </div>
               </div>
               <!--/.First row-->

           </div>
           <!--/.Info-->

           <!--Reviews-->
           <div class="col-lg-12">

               <!--Grid row-->
               <div class="row mt-5">

                   <!--Heading-->
                   <div class="col reviews wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">
                       <h2 class="h2-responsive font-bold">Reviews</h2>
                   </div>

                   <!--First review-->
                   <div class="media wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">
                       <a class="media-left" href="#">
                           <img class="rounded-circle ml-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-7.jpg" alt="Generic placeholder image">
                       </a>
                       <div class="media-body ml-4">
                           <h4 class="media-heading font-bold dark-grey-text">John Doe</h4>
                           <ul class="rating inline-ul list-unstyled">
                               <li>
                                   <i class="fa fa-star blue-text"></i>
                               </li>
                               <li>
                                   <i class="fa fa-star blue-text"></i>
                               </li>
                               <li>
                                   <i class="fa fa-star blue-text"></i>
                               </li>
                               <li>
                                   <i class="fa fa-star grey-text"></i>
                               </li>
                               <li>
                                   <i class="fa fa-star grey-text"></i>
                               </li>
                           </ul>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure
                               soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda.
                               Earum sit id ullam eum vel delectus!</p>
                       </div>
                   </div>
               </div>
               <!--/.Grid row-->

           </div>
           <!--/.Reviews-->
       </div>
   </div>
@endsection