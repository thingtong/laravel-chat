<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Chats;
use App\Models\ChatActivities;
use App\Models\BrandMember;
use App\Models\Platform;
use App\Models\TwitterPosts;
use App\Traits\TwitterTrait;
use Carbon\Carbon;
use Log;

class TwitterController extends Controller
{
    use TwitterTrait;
    public function search(Request $request)
    {
        $query = $request->input('query');
        $tweets = $this->searchTweets($query);
        // ดำเนินการต่อไปตามที่ต้องการ
        return response()->json($tweets);
    }
}
