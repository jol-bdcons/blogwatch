<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PostsController extends Controller
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

        $posts = Post::orderBy($field, $direction)->paginate(config('app.pagination.per_page'));
        $posts->appends(['field' => $field, 'direction' => $direction]);

        return Inertia::render('Home', [
            'loggedIn' => Auth::check(),
            'posts' => $posts
        ]);
    }
}
