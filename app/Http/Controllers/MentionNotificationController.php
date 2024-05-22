<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;

use Illuminate\Http\Request;
use App\Models\MentionNotification;

class MentionNotificationController extends Controller
{
    public function getNotifications()
    {
        $userId = auth()->user()->id;
        $notification =  MentionNotification::where('user_id', $userId)
            ->where('read_at', null)
            ->orderBy('created_at', 'desc')
            ->get();

        $dataNotif = $notification->map(function ($item) {
            return json_decode($item['data'], true);
        });

        $user_ids = $dataNotif->map(function ($item) {
            return $item['user_id'];
        });

        $article_ids = $dataNotif->map(function ($item) {
            return $item['article_id'];
        });

        $users = User::whereIn('id', $user_ids)->get();
        $articles = Article::whereIn('id', $article_ids)->get();

        $notifications = $notification->map(function ($item) use ($users, $articles, $userId) {
            $dataNotif = json_decode($item['data'], true);
            $dataNotif['article'] = $articles->where('id', $dataNotif['article_id'])->first();
            $dataNotif['user'] = $users->where('id', $dataNotif['user_id'])->first();
            $dataNotif['is_login_user_mention'] = $dataNotif['user_id'] == $userId ? true : false;
            $item['data'] = $dataNotif;
            return $item;
        });

        return view('components.admin.notification.bodyNotification', compact('notifications'));
    }

    public function index(Request $request)
    {
        $data = [
            'title' => 'Notification Panel',
        ];

        $dataId = request('dataId');
        $userId = auth()->user()->id;
        $notification =  MentionNotification::where('user_id', $userId)
            ->orderBy('read_at', 'asc')
            ->get();

        $dataNotif = $notification->map(function ($item) {
            return json_decode($item['data'], true);
        });

        $user_ids = $dataNotif->map(function ($item) {
            return $item['user_id'];
        });

        $article_ids = $dataNotif->map(function ($item) {
            return $item['article_id'];
        });

        $users = User::whereIn('id', $user_ids)->get();
        $articles = Article::whereIn('id', $article_ids)->get();

        $notifications = $notification->map(function ($item) use ($users, $articles, $userId) {
            $dataNotif = json_decode($item['data'], true);
            $dataNotif['article'] = $articles->where('id', $dataNotif['article_id'])->first();
            $dataNotif['user'] = $users->where('id', $dataNotif['user_id'])->first();
            $dataNotif['is_login_user_mention'] = $dataNotif['user_id'] == $userId ? true : false;
            $item['data'] = $dataNotif;
            return $item;
        });

        return view("pages.back.notifications.index", compact('data', 'notifications'));
    }

    public function markAsReadAll(Request $request)
    {
        if (request('dataId')) {
            $dataId = request('dataId');
            MentionNotification::where('data', $dataId)->update(['read_at' => now()]);

            return response()->json(['success' =>  'Notification marked as read', 'dataId' =>  $dataId], 201);
        }

        $user_id = auth()->user()->id;

        $updated = MentionNotification::where('user_id', $user_id)->update(['read_at' => now()]);
        if ($updated) {
            return response()->json(['success' =>  'Data updated successfully'], 201);
        }
        return response()->json(['error' => 'Data not updated'], 500);
    }
}
