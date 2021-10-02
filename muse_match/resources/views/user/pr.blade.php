@extends('layouts.text-editor')

@section('header')
    @parent
@endsection

@section('content')
    @parent
    @section('form')
        @section('action', 'https://muse.hitomisiri-riara.com/pr-update-top')
        @error('pr')
            <tr>
                <td style="color: red;">{{$message}}</td>
            </tr>
        @enderror
        <tr>
            <th>自己PR</th>
        </tr>
        <tr>
            <td><textarea class="pr-box" name="pr" id="pr" cols="30" rows="10">@isset($session->pr){{$session->pr}}@endisset</textarea></td>
        </tr>
        @section('submit', '送信')
    @endsection
@endsection