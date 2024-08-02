@extends('cricket.layout.main')
@section('main-container')
@if (\Session::has('error'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
    <section class="vh-100" style="background-color: #010c20;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Login</h3>
                            <form action="{{ route('user-login') }}"method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-outline mb-4">
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">username</label>
                                </div> --}}

                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name ="email"
                                        class="form-control form-control-lg" value="{{ old('email') }}" />
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <label class="form-label" for="typePasswordX-2">Eamil</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" value="{{ old('password') }}"/>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                            </form>

                            <hr class="my-4">
                            <a class="btn btn-primary btn-lg btn-block" href="{{  route('registration-form') }}">Registration</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection