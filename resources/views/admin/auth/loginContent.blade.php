@extends('layouts.login')
@section('content')
<div class="content-body">
    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{asset('assets/admin/images/logo/logo.png')}}" alt="LOGO"/>

                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span>الدخول للوحة التحكم </span>
                        </h6>
                    </div>

                    <!-- begin alet section-->
                    @error('email')
                    <div class="row mr-2 ml-2">
                        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                                id="type-error">   هناك خطا في الايميل
                        </button>
                    </div>
                    @enderror

                    @error('password')
                    <div class="row mr-2 ml-2">
                        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                                id="type-error">   هناك خطا في الرقم السري
                        </button>
                    </div>
                    @enderror

                    <!-- end alet section-->

                    <div class="card-content">
                        <div class="card-body">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form class="form-horizontal form-simple" action="{{route('admin.login')}}" method="post" novalidate>
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <input type="text" name="email"
                                           class="form-control form-control-lg input-lg"
                                           value="" id="email" placeholder="أدخل البريد الالكتروني ">
                                    @error('email')
                                    <span style="color: red">
                                    {{$message}}
                                    </span>
                                    @enderror
                                           <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>

                                    <span class="text-danger"> </span>

                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" name="password"
                                           class="form-control form-control-lg input-lg"
                                           id="user-password"
                                           placeholder="أدخل كلمة المرور">
                                           @error('password')
                                           <span style="color: red">
                                           {{$message}}
                                           </span>
                                           @enderror
                                           <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                    <span class="text-danger"> </span>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" name="remember_token" id="remember-me"
                                                   class="chk-remember">
                                            <label for="remember-me">تذكر دخولي</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                        class="ft-unlock"></i>
                                    دخول
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
