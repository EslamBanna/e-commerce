@extends('layouts.admin')
@section('title','Add New Categorie')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة قسم رئيسي
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة قسم رئيسي </h4>
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
                                    <form class="form" action="{{route('admin.insert.categorie')}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                          <div class="form-group">
                                            <label> صوره القسم </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="photo" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                         </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <input type="checkbox"  value="" name=""
                                                           id="status"
                                                           class="switchery" data-color="success"
                                                           checked/>
                                                    <label for="switcheryColor4"
                                                           class="card-title ml-1">الحالة </label>

                                                                                                             </div>
                                            </div>
                                         </div>

                                        <input type="hidden" id="active" name="active" />
                                         @if (getAllActiveLanguages()-> count() > 0)
                                         @foreach (getAllActiveLanguages() as $index=> $lang)
                                         <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات  القسم في لغة {{ $lang-> name}}</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم القسم </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم القسم"
                                                               name="category[{{$index}}][name]">
                                                               @error("category.$index.name")
                                                               <span class="text-danger"> {{$message}}</span>
                                                               @enderror                                                     </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">slug </label>
                                                        <input type="text" value="" id="slug"
                                                               class="form-control"
                                                               placeholder="slug"
                                                               name="category[{{$index}}][slug]">
                                                               @error("category.$index.slug")
                                                               <span class="text-danger"> {{$message}}</span>
                                                               @enderror                                                       </div>
                                                </div>
                                            </div>


                                            {{-- <div class="row"> --}}

                                            {{-- </div> --}}

                                            <input type="hidden" value="{{$lang-> abbr}}" id="translation_lang" name="category[{{$index}}][translation_lang]" >
                                        </div>
                                        <hr />
                                         @endforeach
                                     @endif


                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary" onclick="addCatigorie()">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>
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
    function addCatigorie(){
        if(document.getElementById('status').checked == true){
            document.getElementById('active').value = 1;
        }else if(document.getElementById('status').checked == false)
        document.getElementById('active').value = 0;
    }
    </script>
@endsection
@endsection
