<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/faq', function () {
    return view('home.faq');
});

Route::get('/investment', function () {
    return view('home.investment');
});

Route::get('/etf&funds', function () {
    return view('home.etf&funds');
});

Route::get('/insurance', function () {
    return view('home.insurance');
});

Route::get('/cohere', function () {
    return view('home.cohere');
});

Route::get('/microsoft', function () {
    return view('home.microsoft');
});

Route::get('/tesla', function () {
    return view('home.tesla');
});

Route::get('/stability', function () {
    return view('home.stability');
});

Route::get('/openai', function () {
    return view('home.openai');
});

Route::get('/mistral', function () {
    return view('home.mistral');
});

Route::get('/nvidia', function () {
    return view('home.nvidia');
});

Route::get('/oracle', function () {
    return view('home.oracle');
});

Route::get('/runway', function () {
    return view('home.runway');
});

Route::get('/scale', function () {
    return view('home.scale');
});

Route::get('/signup', function () {
    return view('home.signup');
});

Route::get('/inflection', function () {
    return view('home.inflection');
});

Route::get('/huggingface', function () {
    return view('home.huggingface');
});

Route::get('/google', function () {
    return view('home.google');
});

Route::get('/anthropic', function () {
    return view('home.anthropic');
});

Route::get('/cashflow', function () {
    return view('home.cashflow');
});

Route::get('/character', function () {
    return view('home.character');
});

Route::get('/facebook', function () {
    return view('home.facebook');
});

Route::get('/signin', function () {
    return view('home.signin');
});
