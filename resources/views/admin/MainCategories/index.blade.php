@extends('layouts.admin')
@section('title','All Main Categories')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> الاقسام الرئيسية </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الاقسام الرئيسية
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع لغات الاقسام الرئيسية </h4>
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
                            @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                {{Session::get('success')}}
                            </div>
                            @endif

                            @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{Session::get('error')}}
                            </div>
                            @endif
                            {{-- @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors') --}}

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th> اللغة</th>
                                            <th>الحالة</th>
                                            <th>slug</th>
                                            <th>الصورة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($categories)
                                            @foreach ($categories as $categorie)
                                                <tr>
                                                    <td>{{$categorie -> name}} </td>
                                                    <td>{{$categorie-> translation_lang}} </td>
                                                    @if ($categorie-> active == 1)
                                                    <td>{{__('messages.active')}}</td>
                                                    @else
                                                    <td>{{__('messages.notActive')}}</td>
                                                    @endif
                                                    <td>{{$categorie-> slug}}</td>
                                                    <td>
                                                        <img src='{{asset($categorie-> photo)}}' alt="categorie" width="100px" height="100px"  />
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a
                                                            href="{{route('admin.edit.categorie',$categorie-> id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>

                                                               <a
                                                               href="{{route('admin.status.categorie',$categorie-> id)}}"
                                                               class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                   {{($categorie-> active == 1 ? 'الغاء التفعيل' : 'تفعيل' )}}
                                                               </a>


                                                               <a
                                                            href="{{route('admin.delete.categorie',$categorie-> id)}}"
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                حذف
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach


                                                <div class="justify-content-center d-flex">
                                                    {{-- {!! $categorie->links() !!} --}}
                                                </div>
                                                @endisset

                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
