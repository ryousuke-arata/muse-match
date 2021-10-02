@extends('layouts.users')

@section('header')
  @include('components.user-header', ['link' => 'https://muse.hitomisiri-riara.comc/new', 'text' => '新規登録'])
@endsection

@section('form')
    @parent
    @section('submit', 'ログイン')
@endsection

@section('footer')
   @parent
@endsection