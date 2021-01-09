<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //Messageクラスのレコードの一覧表示
        // メッセージ一覧を表示
        $messages =Message::all();
        
        // メッセージ一覧ビューで表示
        return view('messages.index',[
            'messages' => $messages,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new Message;
        
        //メッセージ作成ビューを表示
        return view('messages.create',[
                'message' => $message,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     //postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        //メッセージ作成
        $message = new Message;
        $message->content = $request->content;
        $message->save();
    
        //トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // getでmessages/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //メッセージ詳細ビューでそれを表示
        return view('messages.show',[
            'message' =>$message,    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // getでmessages/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //idの値でメッセージを検索して取得
        return view('messages.edit',[
            'message' => $message,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // putまたはpatchでmessages/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //メッセージを更新
        $message->content = $request->content;
        $message->save();
        
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // deleteでmessages/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        //メッセージを削除
        $message->delete();
        
        return redirect('/');
    }
}
