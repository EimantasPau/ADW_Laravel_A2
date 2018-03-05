@extends('layouts.app')

@section('content')
   <div class="container">
       @if($message = session('successMessage'))
           <div class="alert alert-success" role="alert">
               <strong>Success!</strong> {{$message}}
           </div>
       @endif
       @if($message = session('errorMessage'))
            <div class="alert alert-danger" role="alert">
                <strong>Sorry.</strong> {{$message}}
            </div>
       @endif
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
                               <dt class="col-sm-3">Category</dt>
                               <dd class="col-sm-9">{{$product->category->name}}</dd>
                           </dl>
                           <dl class="row mt-4">
                               <dt class="col-sm-3">Decription</dt>
                               <dd class="col-sm-9">{{$product->description}}</dd>
                           </dl>
                           <hr>
                           @if($product->quantity > 0)
                               <form action="{{route('cart.add', $product->id)}}" method="POST">
                                   @csrf
                                   <button type="submit" class="btn btn-outline-success waves-effect"><i class="fas fa-plus"></i> Add to cart </button>
                               </form>
                               @else
                               <div class="alert alert-danger">
                                   <div class="text-center">
                                       Sorry. This item is currently out of stock.
                                   </div>
                               </div>
                           @endif
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
                   <div class="col-sm-12 reviews wow fadeIn mb-4" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">
                       <h2 class="h2-responsive font-bold">Reviews</h2>

                    @foreach($product->reviews as $review)
                        <!--First review-->
                            <div class="media wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.2s;">
                                <a class="media-left" href="#">
                                    <img class="rounded-circle img-responsive ml-3" width="100px" src="{{$review->user->avatar_url}}" alt="Generic placeholder image">
                                </a>
                                <div class="media-body ml-4">
                                    <h4 class="media-heading font-bold dark-grey-text">{{$review->user->name}}</h4>
                                    <ul class="rating inline-ul list-unstyled">
                                        @foreach(range(1,5) as $i)
                                            @if($review->rating >= $i)
                                            <li>
                                                <i class="fa fa-star blue-text"></i>
                                            </li>
                                            @else
                                                <i class="fa fa-star grey-text"></i>
                                            @endif
                                        @endforeach

                                    </ul>
                                    <p>{{$review->body}}</p>
                                </div>
                            </div>
                   @endforeach
                   </div>
               </div>
               <!--/.Grid row-->
           </div>


           <div class="col-sm-12 reviews wow fadeIn d-block mb-4 mt-4" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.4s;">
               <h2 class="h2-responsive font-bold">Leave a product review</h2>
           </div>
           <div class="col-sm-12">
               <form action="{{route('product.review.store', $product->id)}}" method="POST" class="d-block">
                   @csrf
                   <div class="md-form">
                       <textarea id="body" class="md-textarea {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body">{{ old('body') }}</textarea>
                       <label for="body">Body</label>
                       @if ($errors->has('body'))
                           <span class="red-text">{{ $errors->first('body') }}</span>
                       @endif
                   </div>
                   <div class="my-rating"></div>
                   <select name="rating" id="rating" style="display:none;">
                       <option disabled selected value>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                   </select>
                   @if ($errors->has('rating'))
                       <span class="red-text">{{ $errors->first('rating') }}</span>
                   @endif
                   <button type="submit" class="btn btn-outline-primary d-block mt-4">Submit</button>
               </form>
           </div>
           <!--/.Reviews-->
       </div>
   </div>
@endsection

@push('scripts')
    <script src="{{asset('js/star-rating-svg.js')}}"></script>
    <script type="text/javascript">
        // specify the gradient start and end for the selected stars
        $(".my-rating").starRating({
            starSize: 40,
            strokeWidth: 1,
            strokeColor: 'black',
            useFullStars: true,
            disableAfterRate: false,
            initialRating: 0,
            starGradient: {
                start: '#93BFE2',
                end: '#105694'
            },
            callback: function(currentRating, $el){
                $('#rating').val(currentRating);
            }
        });
    </script>
    @endpush