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
            <td><textarea name="pr" id="pr" cols="30" rows="10">@isset($session->pr){{$session->pr}}@endisset</textarea>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="add" value="送信"></td>
        </tr>
    @endsection
@endsection

@section('footer')
    @parent
@endsection