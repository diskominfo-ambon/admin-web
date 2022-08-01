<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Models\Post;
use App\Models\Announcement;
use App\Models\Infographic;
use App\Models\Collection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/posts', function (Request $request) {
    $limit = $request->get('limit');

    $posts = Post::latest()->when(Str::of($limit)->isNotEmpty(), fn (Builder $builder) => $builder->take($limit) )->get();

    return new JsonResponse(['statusCode' => Response::HTTP_OK, 'data' => $posts], Response::HTTP_OK);
});

Route::get('/announcements', function (Request $request) {
    $limit = $request->get('limit');

    $announcements = Announcement::latest()->when(Str::of($limit)->isNotEmpty(), fn (Builder $builder) => $builder->take($limit) )->get();

    return new JsonResponse(['statusCode' => Response::HTTP_OK, 'data' => $announcements], Response::HTTP_OK);
});

Route::get('/infographics', function () {

    $infographics = Infographic::latest()->take(10)->get();

    return new JsonResponse(['statusCode' => Response::HTTP_OK, 'data' => $infographics], Response::HTTP_OK);
});



Route::get('/collections', function (Request $request) {
    $rule = $request->get('rule');
    $posted = Collection::posted($rule)->first();

    return new JsonResponse(['statusCode' => Response::HTTP_OK, 'data' => $posted], Response::HTTP_OK);
});
