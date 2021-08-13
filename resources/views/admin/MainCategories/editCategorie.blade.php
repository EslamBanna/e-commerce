@extends('layouts.admin')
@section('title','Edit Catigory')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.languages')}}"> الأقسام الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل قسم
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">تعديل قسم</h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors') --}}
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.save.changes.categorie',$mainCategories-> id)}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                          <div class="text-center">
                                            <img src="{{asset($mainCategories->photo)}}" width="100%" height="500px" alt="category">
                                        </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                            <input type="file" name="photo" id="photo" />
                                            <div class="row">
                                                <br />
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name"> اسم القسم </label>
                                                        <input type="text" value="{{$mainCategories-> name}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم القسم  "
                                                               name="name">
                                                               @error('name')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="abbr"> slug </label>
                                                        <input type="text" value="{{$mainCategories-> slug}}" id="abbr"
                                                               class="form-control"
                                                               name="slug"
                                                               placeholder="Enter Slug"
                                                               @error('abbr')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">

                                                        <input type="checkbox"
                                                        id="status"
                                                        class="switchery" data-color="success"
                                                        @if ($mainCategories -> active == 1)
                                                            checked
                                                        @endif
                                                        />

                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة </label>
                                                            </div>
                                                </div>
                                            </div>


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary" onclick="passData()">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                        <input type="hidden" id="active" name="active" value="" >

                                    </form>

                                    <div class="col-xl-6 col-lg-12">
                                        <div class="card">
                                          <div class="card-header">
                                            <h4 class="card-title">تعديل اللغات الأخري</h4>
                                          </div>
                                          <div class="card-content">
                                            <div class="card-body">
                                              <div class="nav-vertical">
                                                <ul class="nav nav-tabs nav-left nav-border-left">
                                                    @isset($catigory_with_diffrent_languages)
                                                    @foreach ($catigory_with_diffrent_languages as $index=>$lang)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{($index == 0? 'active':'')}}" id="baseVerticalLeft1-tab1" data-toggle="tab" aria-controls="tabVerticalLeft11"
                                                        href="#tabVerticalLeft{{ $lang -> id}}" aria-expanded="true">{{ $lang -> translation_lang}}</a>
                                                      </li>
                                                    @endforeach
                                                    @endisset
                                                </ul>
                                                <div class="tab-content px-1">
                                                    @isset($catigory_with_diffrent_languages)
                                                @foreach ($catigory_with_diffrent_languages as $index=> $lang)

                                                <div role="tabpanel" class="tab-pane {{($index == 0 ? 'active' : '')}}" id="tabVerticalLeft{{$lang->id}}" aria-expanded="true"
                                                aria-labelledby="baseVerticalLeft1-tab1">
                                                    <form class="form" action="{{route('admin.save.changes.categorie',$lang-> id)}}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                                <label for="name"> اسم القسم بالغة {{$lang->translation_lang}} </label>
                                                                <input type="text" value="{{$lang-> name}}" id="name"
                                                                       class="form-control"
                                                                       placeholder="ادخل اسم القسم  "
                                                                       name="name">
                                                                       @error('name')
                                                                       <span class="text-danger">
                                                                    {{$message}}
                                                                    </span>
                                                                       @enderror
                                                                       <br />

                                                                <label for="abbr"> slug </label>
                                                                <input type="text" value="{{$lang-> slug}}" id="abbr"
                                                                       class="form-control"
                                                                       name="slug"
                                                                       placeholder="Enter Slug"
                                                                       @error('abbr')
                                                                       <span class="text-danger">
                                                                    {{$message}}
                                                                    </span>
                                                                       @enderror

                                                                        <br />
                                                                        <br />
                                                                        <button type="submit" class="btn btn-primary">
                                                                            <i class="la la-check-square-o"></i> حفظ
                                                                        </button>
                                                                       </form>


                                                    {{-- {{$lang}} --}}
                                                </div>
                                                @endforeach
                                                @endisset

                                                </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@section('script')
<script>
    function passData(){
        if( document.getElementById('status').checked == true){
            document.getElementById('active').value = 1;
        }else if(document.getElementById('status').checked == false){
            document.getElementById('active').value = 0;
        }
    }
        </script>
@endsection

@endsection
