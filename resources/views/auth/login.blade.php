@extends('layouts.app')
@section('content')
<div class="account-pages pt-5 my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="account-card-box">
                            <div class="card mb-0">
                                <div class="card-body p-4">
                                    
                                    <div class="text-center">
                                        <div class="my-3">
                                            <a href="index.html" class="logo-my">
                                                <span><img src="{{ url('public/quiz-assets/images/logo.svg') }}" alt="" height="28"></span>
                                            </a>
                                        </div>
                                        <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                                    </div>
    
                                    <form method="POST" action="" class="mt-2">
                                     {{ csrf_field() }}
                                        <div class="form-group mb-3">
											<input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
												@if($errors->has('email'))
													<div class="invalid-feedback">
														{{ $errors->first('email') }}
													</div>
												@endif
                                        </div>
    
                                        <div class="form-group mb-3">
                                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
											@if($errors->has('password'))
												<div class="invalid-feedback">
													{{ $errors->first('password') }}
												</div>
											@endif
                                        </div>
    
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox">
												<input class="form-check-input custom-control-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                            </div>
                                        </div>
    
                                        <div class="form-group text-center">
											<button type="submit" class="btn btn-success btn-block waves-effect waves-light">
												{{ trans('global.login') }}
											</button>
                                        </div>

                                         <!--<a class="btn btn-link px-0 text-muted" href="">
											<i class="mdi mdi-lock mr-1"></i>{{ trans('global.forgot_password') }}
										</a>-->
                                    </form>

                                    <!--<div class="text-center mt-4">
                                        <h5 class="text-muted py-2"><b>Sign in with</b></h5>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-facebook waves-effect font-14 waves-light mt-3">
                                                    <i class="fab fa-facebook-f mr-1"></i> Facebook
                                                </button>
            
                                                <button type="button" class="btn btn-twitter waves-effect font-14 waves-light mt-3">
                                                    <i class="fab fa-twitter mr-1"></i> Twitter
                                                </button>
            
                                                <button type="button" class="btn btn-googleplus waves-effect font-14 waves-light mt-3">
                                                    <i class="fab fa-google-plus-g mr-1"></i> Google+
                                                </button>
                                            </div>
                                        </div>
                                    </div>-->
    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>

                        <!--<div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Don't have an account? <a href="pages-register.html" class="text-white ml-1"><b>Sign Up</b></a></p>
                            </div> 
                        </div>-->
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
@endsection