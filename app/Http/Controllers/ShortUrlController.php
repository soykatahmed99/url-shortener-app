<?php

namespace App\Http\Controllers;

use App\Models\SortUrl;
use Illuminate\Http\Request;
use Session;


class ShortUrlController extends Controller
{
    public $short;
    public $link;

    public function shortUrl(Request $request)
    {
        $request->validate([
           'url'=>'required'
        ]);
        SortUrl::createShortUrl($request);
        return redirect('/short-url-result');
    }
    public function link($link)
    {
        $this->short = SortUrl::where('short', $link)->first();
        if ($this->short)
        {
            return redirect()->to(url($this->short->url));
        }
    }

    public function shortUrlResult()
    {
        $this->short = SortUrl::where('user_id', Session::get('user_id'))->orderBy('id', 'desc')->first();
        return view('website.short-url', ['url'=>$this->short->short, 'link'=>$this->short->url]);
    }
}
