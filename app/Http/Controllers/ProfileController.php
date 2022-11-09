<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Profile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(Request $profile)
    {
        return Inertia::render('Profile/profile', [
            'profiles' => Profile::all()->map(function($profile){
                return [
                    'id' => $profile->id,
                    'name' => $profile->name,
                    'email' => $profile->email,
                    'image' => asset('storage/'.$profile->image)
                ];
            })
        ]);
    }
    
    public function create()
    {
        return Inertia::render('Profile/create');
    }
    
    public function store()
    {
        $image = Request::file('image')->store('profiles', 'public');
        Profile::create([
            'name' => Request::input('name'),
            'email' => Request::input('email'),
            'image' => $image
        ]);

        return Redirect::route('profile.index');
    }
    
    public function edit(Profile $profile)
    {
        return Inertia::render('Profile/Edit', [
            'profile' => $profile,
            'image' => asset('storage/' . $profile->image)
        ]);
    }

    public function update(Profile $profile)
    {
        $image = $profile->image;

        if (Request::file('image')) {
            Storage::delete('public/'. $profile->image);
            $image = Request::file('image')->store('profiles', 'public');
        }

        $profile->update([
            'name' => Request::input('name'),
            'image' => $image,
            'email' => Request::input('email')
        ]);

        return Redirect::route('profile.index');
    }

    public function destroy(Profile $profile)
    {
        Storage::delete('public/'. $profile->image);
        $profile->delete();
        return Redirect::route('profile.index');
    }
}
