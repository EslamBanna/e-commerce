@extends('layouts.admin')
@section('title','Add New Languages')
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
                            <li class="breadcrumb-item"><a href="{{route('admin.languages')}}"> أللغات </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة لغة
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة لغة </h4>
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
                                    <form class="form" action="{{route('save.changes.language')}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات اللغة </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name"> اسم اللغة </label>
                                                        <input type="text" value="{{$lang-> name}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم اللغة  "
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
                                                        <label for="abbr"> الاختصار </label>
                                                        <input type="text" value="{{$lang-> abbr}}" id="abbr"
                                                               class="form-control"
                                                               placeholder="ادخل اختصار اللغة  "
                                                               name="abbr">
                                                               @error('abbr')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="locale"> Locale </label>
                                                        <input type="text" value="{{$lang-> locale}}" id="locale"
                                                               class="form-control"
                                                               placeholder="ادخل لوكل اللغة"
                                                               name="locale">
                                                               @error('locale')
                                                               <span class="text-danger">
                                                            {{$message}}
                                                            </span>
                                                               @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="direction"> الاتجاة </label>
                                                        <select name="direction" id="direction" class="select2 form-control">
                                                            <optgroup label="من فضلك أختر اتجاه اللغة ">
                                                                @if ($lang -> direction == 'rtl')
                                                                <option value="rtl" selected>من اليمين الي اليسار</option>
                                                                <option value="ltr">من اليسار الي اليمين</option>
                                                                @else
                                                                <option value="rtl">من اليمين الي اليسار</option>
                                                                <option value="ltr" selected>من اليسار الي اليمين</option>
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('direction')
                                                        <span class="text-danger">
                                                        {{$message}}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{$lang-> id}}">
                                        <input type="hidden" id="active" name="active" value="" >
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        {{-- @if ($lang-> active == 'on')
                                                        <input type="checkbox" name="active"
                                                               id="active" value=""
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        @else
                                                        <input type="checkbox" name="active"
                                                        id="active" value="off"
                                                        class="switchery" data-color="success"
                                                        />
                                                        @endif --}}


                                                        <input type="checkbox"
                                                        id="status"
                                                        class="switchery" data-color="success"
                                                        @if ($lang -> active == 'on')
                                                            checked
                                                        @endif
                                                        />

                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة </label>
                                                            </div>
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
                                    </form>
                                    <input type="hidden" value="{{$lang-> active}}" id="hiddenActiveValue" />
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
            document.getElementById('active').value = 'true';
        }else if(document.getElementById('status').checked == false){
            document.getElementById('active').value = 'false';
        }
    }
        </script>
@endsection

@endsection
