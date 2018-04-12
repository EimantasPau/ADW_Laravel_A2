@extends('layouts.app')

@section('content')
   <div class="col-md-6 offset-md-3">
       <!-- Material form contact -->
       <form method="POST" action="{{route('contact.store')}}">
           {{csrf_field()}}
           @if($message = session('successMessage'))
               <div class="alert alert-success" role="alert">
                   <strong>Success!</strong> {{$message}}
               </div>
           @endif
           <p class="h4 text-center mb-4">Write to us</p>
           <!-- Material input text -->
           <div class="md-form">
               <i class="fa fa-user prefix grey-text"></i>
               <input type="text" id="materialFormContactNameEx" class="form-control" name="name">
               <label for="materialFormContactNameEx">Your name</label>
           </div>
           @if ($errors->has('name'))
               <span class="red-text">{{ $errors->first('name') }}</span>
            @endif

           <!-- Material input email -->
           <div class="md-form">
               <i class="fa fa-envelope prefix grey-text"></i>
               <input type="email" id="materialFormContactEmailEx" class="form-control" name="email">
               <label for="materialFormContactEmailEx">Your email</label>
           </div>
           @if ($errors->has('email'))
               <span class="red-text">{{ $errors->first('email') }}</span>
         @endif

           <!-- Material input subject -->
           <div class="md-form">
               <i class="fa fa-tag prefix grey-text"></i>
               <input type="text" id="materialFormContactSubjectEx" class="form-control" name="subject">
               <label for="materialFormContactSubjectEx">Subject</label>
           </div>
           @if ($errors->has('subject'))
               <span class="red-text">{{ $errors->first('subject') }}</span>
       @endif

           <!-- Material textarea message -->
           <div class="md-form">
               <i class="fa fa-pencil-alt prefix grey-text"></i>
               <textarea type="text" id="materialFormContactMessageEx" class="form-control md-textarea" rows="3" name="body"></textarea>
               <label for="materialFormContactMessageEx">Your message</label>
           </div>
           @if ($errors->has('body'))
               <span class="red-text">{{ $errors->first('body') }}</span>
           @endif

           <div class="text-center mt-4">
               <button class="btn btn-outline-secondary" type="submit">Send<i class="fa fa-share-square ml-2"></i></button>
           </div>
       </form>
       <!-- Material form contact -->
   </div>


@endsection