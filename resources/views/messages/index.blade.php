@extends('layouts.app')

@section('content')

    <h1>メッセージ一覧</h1>
    
    @if(count($messages)>0)
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>id</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->content }}</td>
                    
                    {{--メッセージ詳細ページへのリンク--}}
                    <td>{{!! link_to_route('messages.show',$message->id,['message'=>$message->id])!!}}</td>
                    <td>{{$message->content}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- {{ '<p style="color: red;">htmlspecialchars関数に通した場合</p>' }} --}}
    {{-- {!! '<p style="color: red;">htmlspecialchars関数に通さなかった場合</p>' !!} --}}
    
    {{-- メッセージ作成ページへのリンク --}}
    {!! link_to_route('messages.create', '新規メッセージの投稿', [],['class'=>'btn btn-primary'])!!}
    
    
@endsection