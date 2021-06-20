<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class UserPostsController extends Controller
{
    public function index()
    {
        request()->validate([
            'field' => 'in:publication_date',
            'direction' => 'in:asc,desc,ASC,DESC'
        ]);

        $direction = 'desc';
        $field = 'publication_date';

        if(request()->has(['field', 'direction'])) {
            $field = request('field');
            $direction = request('direction');
        }

        $user = Auth::user();

        $posts = $user->posts()->orderBy($field, $direction)->paginate(config('app.pagination.per_page'));
        $posts->appends(['field' => $field, 'direction' => $direction]);

        return Inertia::render('Dashboard', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return Inertia::render('AddPost');
    }

    public function store(PostFormRequest $request)
    {
        $user = Auth::user();

        $user->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'publication_date' => now()
        ]);
        return redirect('dashboard')->with(['message' => 'Success! Your Post was added!']);
    }
}
