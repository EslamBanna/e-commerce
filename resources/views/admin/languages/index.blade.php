@extends('layouts.admin')
@section('title','All LAnguages')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> اللغات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> اللغات
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
                                <h4 class="card-title">جميع لغات الموقع </h4>
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
                            @if (Session::has('successAdd'))
                            <div class="alert alert-success text-center">
                                {{Session::get('successAdd')}}
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
                                        class="table display nowrap table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th> الاسم</th>
                                            <th>الاختصار</th>
                                            <th>اتجاه</th>
                                            <th>الحالة</th>
                                            <th>Locale</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($languages)

                                            @foreach ($languages as $lang)
                                                <tr>
                                                    <td>{{$lang -> name}} </td>
                                                    <td>{{$lang-> abbr}} </td>
                                                    <td>
                                                        @if ($lang -> direction == 'rtl')
                                                            من اليمين الي اليسار

                                                       @else
                                                          من اليسار الي اليمين
                                                            @endif
                                                    <td>{{$lang-> active}}</td>
                                                    <td>{{$lang-> locale}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('edit.language',$lang-> id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                            <a
                                                            href="{{route('delete.language',$lang-> id)}}"
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                حذف
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endisset


                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                        {!! $languages->links() !!}
                                    </div>
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
