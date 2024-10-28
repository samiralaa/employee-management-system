@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">مرحبًا بك في الصفحة الرئيسية!</h1>
        <p class="lead">نحن سعداء بوجودك هنا. استمتع بتصفح المحتوى.</p>
        <a href="{{ url('/employees') }}" class="btn btn-primary btn-lg mt-3">إدارة الموظفين</a>
    </div>
</div>
@endsection
