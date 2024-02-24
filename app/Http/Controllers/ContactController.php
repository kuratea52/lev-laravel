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
        $inquiry = Inquiry::create([
            'user_id' => $userId,
            'category' => $request->input('category'),
            'email' => $request->input('email'),
            'body' => $request->input('body')
        ]);
        
        return view('contacts.thanks', [
            'email' => $request->input('email'),
            'category' => $request->input('category'),
            'body' => $request->input('body')
        ]);
    }
}
