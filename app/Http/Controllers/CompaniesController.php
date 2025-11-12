<?php

namespace App\Http\Controllers;

use App\Models\BoycottedCompany;
use App\Models\BoycottedProduct;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Inertia\Inertia;
use Inertia\Response;

class CompaniesController extends Controller
{
    public function show(BoycottedCompany $company): Response
    {
        SEOMeta::setDescription($company->description);
        OpenGraph::setDescription($company->description);

        $productId = request()->integer('product');
        $featuredProduct = null;

        if ($productId) {
            $product = BoycottedProduct::where('id', $productId)
                ->with(['replacements'])
                ->first();

            switch ($product->boycotted_company_id == $company->id) {
                case true:
                    $featuredProduct = $product;
                    SEOMeta::setTitle($featuredProduct->name);
                    OpenGraph::setTitle($featuredProduct->name);
                    OpenGraph::setUrl(route('boycott.companies.show', [
                        $company,
                        'product' => $featuredProduct->id
                    ]));
                    break;
                case false:
                    SEOMeta::setTitle($company->name);
                    OpenGraph::setTitle($company->name);
                    OpenGraph::setUrl(route('boycott.companies.show', [
                        $company
                    ]));
                    break;
            }
        }

        return Inertia::render(
            'Company/Show',
            compact('company', 'featuredProduct')
        );
    }
}
