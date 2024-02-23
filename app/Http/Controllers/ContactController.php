<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Http\Requests\InquiryRequest;

class ContactController extends Controller
{
    public function submit(InquiryRequest $request)
    {
        // フォームデータをデータベースに保存
        $inquiry = new Inquiry();
        $inquiry->category = $request->input('category');
        $inquiry->email = $request->input('email');
        $inquiry->body = $request->input('body');
        $inquiry->save();

        return redirect()->back()->with('success', 'お問い合わせが送信されました。ありがとうございます！');
    }
}
