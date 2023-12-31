@extends('layouts.master')
@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">{{__('Contact Us')}}</h2>
                </div>

            </div>
        </div>
    </header>
    
    <section class="section-padding" id="section_2">
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12 mx-auto">
                       
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            <div class="modal" tabindex="-1" aria-labelledby="..." aria-hidden="true">
                                ...
                              </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-lg-5 col-12 pe-lg-5">
                        
                        <div class="contact-info">
                            <h3 class="mb-4">We love to help you. Get in touch</h3>

                            <p class="d-flex border-bottom pb-3 mb-4">
                                <strong class="d-inline me-4">Phone:</strong>
                                <span>010-020-0340</span>
                            </p>

                            <p class="d-flex border-bottom pb-3 mb-4">
                                <strong class="d-inline me-4">Email:</strong>
                                <a href="#">inquiry@pod.co</a>
                            </p>

                            <p class="d-flex">
                                <strong class="d-inline me-4">Location:</strong>
                                <span>1355 Market Street, Downtown San Francisco, California</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                        <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.819917806043!2d103.84793601429608!3d1.281807962148459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190c2c94ccb3%3A0x11213560829baa05!2sTwitter!5e0!3m2!1sen!2smy!4v1669212183861!5m2!1sen!2smy"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>
    </section>

    <section class="contact-section section-padding pt-0" id="contact">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">You know, Contact Form</h4>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mail')}}" method="get" class="custom-form contact-form" role="form"id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Full Name">

                                        <label for="floatingInput">Full Name</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Email address" >

                                        <label for="floatingInput">Email address</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Name">

                                        <label for="floatingInput">Phone</label>
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"
                                            placeholder="Describe message here"></textarea>

                                        <label for="floatingTextarea">Describe message here</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control" id="submit-button">Submit</button>
                                </div>

                            </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection




        


       



