<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserPreferences;
use Illuminate\Http\Request;

class UserPreferencesController extends Controller
{
    public function preferences(Request $request)
    {
        $user = auth()->user();

        $preferences = UserPreferences::where('user_id', $user->id)->first();

        return response(['user' => $user, 'preferences' => $preferences]);
    }

    public function updatePreferences(Request $request)
    {
        $user = auth()->user();

        $response = UserPreferences::updateOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id, 'category' => $request->category, 'source' => $request->source, 'author' => $request->author]
        );

        $preferences = UserPreferences::where('user_id', $user->id)->first();

        return response(['user' => $user, 'preferences' => $preferences, 'message' => 'Update Successfully!']);
    }
}
