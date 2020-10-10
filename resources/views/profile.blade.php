@extends('layouts.master')
@section('css')
    body {
    font-family: 'Lato';
    }

    .fa-btn {
    margin-right: 1px;
    }
    .task-table tbody tr td:nth-child(2){
    width: 120px;
    }
    .task-table tbody tr td:nth-child(3){
    width: 100px;
    }
@endsection
@section('title')
    Thông tin cá nhân
@endsection
@section('content')
    <p>Họ và tên: <span>{{ $hoten }}</span></p>
    <p>Năm sinh: <span>{{ $namsinh }}</span></p>
    <p>Trường học: <span>{{ $truonghoc }}</span></p>
    <p>Quê quán: <span>{{ $que }}</span></p>
    <p>Giới thiệu về bản thân: {!! $gioithieu !!}</p>
    <p>Mục tiêu nghề nghiệp: <span>{{ $muctieu }}</span></p>
@endsection
@section('scrip')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

