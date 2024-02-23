<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Http\Requests\InquiryRequest;

class ContactController extends Controller
{
    public function submit(InquiryRequest $request)
    {
        // ログインユーザーのIDを取得
        $userId = auth()->id();
        
        // フォームデータをデータベースに保存
        $inquiry = new Inquiry();
        $inquiry->user_id = $userId;
        $inquiry->category = $request->input('category');
        $inquiry->email = $request->input('email');
        $inquiry->body = $request->input('body');
        $inquiry->save();

        return redirect()->route('contactus')->with('success', 'お問い合わせが送信されました。ありがとうございます！');
    }
}
