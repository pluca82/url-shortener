<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request
        $request->validate([
            'url' => 'required|url',
        ]);

        // Check if the URL already exists
        $existingUrl = Url::where('original_url', $request->url)->first();

        if ($existingUrl) {
            return response()->json(['short_url' => $existingUrl->short_url, 'message' => 'exists']);
        }

        // Generate a unique short URL
        $shortUrl = substr(md5($request->url . time()), 0, 6);

        // Create a new URL record
        $url = Url::create([
            'original_url' => $request->url,
            'short_url' => $shortUrl,
        ]);

        return response()->json(['short_url' => $url->short_url, 'message' => 'created']);
    }

    public function redirect($shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->firstOrFail();

        return redirect($url->original_url);
    }
}