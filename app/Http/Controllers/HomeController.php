<?php

namespace App\Http\Controllers;

use App\Models\BoycottedProduct;
use Artesaos\SEOTools\Facades\{SEOMeta, OpenGraph};
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        SEOMeta::setTitle(__('boycott.home.title'));
        SEOMeta::setDescription(__('boycott.home.subtitle'));
        OpenGraph::setTitle(__('boycott.home.title'));
        OpenGraph::setDescription(__('boycott.home.subtitle'));
        OpenGraph::setUrl(route('boycott.home.index'));

        $search = Request::input('search');

        return Inertia::render('Home/Show', [
          'products' => Inertia::scroll(
            fn () => BoycottedProduct::with(['company', 'keywords'])
                ->when($search, function($query, $search) {
                    $query->whereLike('name', "%$search%")
                        ->orWhereHas('company', function ($query) use ($search) {
                            $query->whereLike('name', "%$search%");
                        })
                        ->orWhereHas('keywords', function ($query) use ($search) {
                            $query->whereLike('label', "%$search%");
                        });
                })
                ->paginate(20)
                ->withQueryString(),
            ),
            'search' => $search
        ]);
    }
}
