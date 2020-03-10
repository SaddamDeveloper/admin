<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', __('Fooover | Admin Dashboard')) }}</title>

    <link href="{{asset('fooover/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fooover/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('fooover/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('fooover/css/style.css')}}" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        @include('admin.include.nav')
        @include('admin.include.topnav')