@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-12 text-center bg bg-success" style="height: 8px;"></div>
    <div class="col-md-12 text-center text-success shadow-sm p-2 mb-2 bg-white rounded"><h3>OSK i INSTRUKTORZY</h3></div>
    <div class="container">
        <div class="row" style="margin-top:200px;">
            <div class="col-md-6 text-center">
                <a href="{{ route('szkoly') }}" role="button" class="btn btn-success btn-lg">
                    <i class="fas fa-school fa-2x"></i>&nbsp;&nbsp;&nbsp;OŚRODKI SZKOLENIA KIEROWCÓW
                </a>
            </div>
            <div class="col-md-6 text-center">
                <a href="{{ route('instruktor.index') }}" role="button" class="btn btn-success btn-lg">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>&nbsp;&nbsp;&nbsp;INSTRUKTORZY</a>
            </div>
        </div>
        <div class="col text-center">
            <div class="text-center" style="margin-top: 200px;"><a href="/" role="button" class="btn btn-primary"><i class="fas fa-home fa-lg"></i> Home </a></div>
        </div>
    </div>

