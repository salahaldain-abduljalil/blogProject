@extends('theme.master')
@section('title','Register')
@section('content')



@include('theme.partial.hero',['title'=>'Register'])

 <!-- ================ contact section start ================= -->
 <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('register') }}" class="form-contact contact_form" action="contact_process.php" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="name" id="name" type="text" placeholder="Enter your name" value="{{ old('name') }}">
                  {{-- @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror --}}
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
                <div class="form-group">
                  <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address" value="{{ old('email') }}">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password" value="{{ old('email') }}">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>
                <div class="form-group">
                  <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
                <a href="{{ route('login') }}" class="mx-3">Already Registered?</a>
              <button type="submit" class="button button--active button-contactForm">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->


@endsection


