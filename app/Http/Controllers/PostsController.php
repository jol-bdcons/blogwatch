<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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

        $expire = Carbon::now()->addMinutes(5);
        $curPage = request('page',1);
        $key = "posts_{$curPage}_{$field}_{$direction}";

        $posts = Cache::remember($key, $expire, function() use ($field, $direction){
            return Post::orderBy($field, $direction)
                ->paginate(config('app.pagination.per_page'))
                ->appends(['field' => $field, 'direction' => $direction]);
        });

        return Inertia::render('Home', [
            'loggedIn' => Auth::check(),
            'posts' => $posts
        ]);
    }
}
