<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // バリデーションの処理を追加

        // フォームデータをデータベースに保存
        $inquiry = new Inquiry();
        $inquiry->category = $request->input('category');
        $inquiry->email = $request->input('email');
        $inquiry->body = $request->input('body');
        $inquiry->save();

        return redirect()->back()->with('success', 'お問い合わせが送信されました。ありがとうございます！');
    }
}
