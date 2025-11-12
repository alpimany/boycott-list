<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\BoycottedCompany;
use App\Models\BoycottedProduct;
use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap as SitemapTag;
use Spatie\Sitemap\Tags\Url;

final class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a Sitemap to enchance SEO.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $sitemapIndex = SitemapIndex::create();

        // /sitemap.xml
        $rootSitemap = $this->makeRootSitemap();
        $sitemapIndex->add($rootSitemap);

        // /boycott/companies/sitemap/[n].xml
        $inboxSitemaps = $this->makeCompaniesSitemaps();
        foreach ($inboxSitemaps as $sitemap) {
            $sitemapIndex->add($sitemap);
        }

        // /boycott/companies/products/sitemap/[n].xml
        $inboxSitemaps = $this->makeProductsSitemaps();
        foreach ($inboxSitemaps as $sitemap) {
            $sitemapIndex->add($sitemap);
        }

        $sitemapIndex->writeToFile(public_path('sitemap_index.xml'));
    }

    public function makeRootSitemap(): SitemapTag
    {
        $path = 'sitemap.xml';

        Sitemap::create()
            ->add(Url::create(route('boycott.products.index')))
            ->writeToFile(public_path($path));

        return SitemapTag::create($path);
    }

    /**
     * @return array<SitemapTag>
     */
    public function makeCompaniesSitemaps(): array
    {
        $inboxsCount = BoycottedCompany::all()->count();
        $sitemaps = [];
        $numberOfBatches = (int) ceil($inboxsCount / 50000);

        if (! is_dir(public_path('/boycott/companies/sitemap'))) {
            mkdir(public_path('/boycott/companies/sitemap'), recursive: true);
        }

        for ($n = 0; $n < $numberOfBatches; $n++) {
            $path = "/boycott/companies/sitemap/{$n}.xml";

            $offset = $n * 50000;
            $companies = BoycottedCompany::offset($offset)->limit(50000)->get();

            $sitemap = Sitemap::create();
            foreach ($companies as $company) {
                $sitemap->add(Url::create(route('boycott.companies.show', [
                    $company
                ])));
            }
            $sitemap->writeToFile(public_path($path));

            $sitemaps[] = SitemapTag::create($path);
        }

        return $sitemaps;
    }

    /**
     * @return array<SitemapTag>
     */
    public function makeProductsSitemaps(): array
    {
        $inboxsCount = BoycottedProduct::all()->count();
        $sitemaps = [];
        $numberOfBatches = (int) ceil($inboxsCount / 50000);

        if (! is_dir(public_path('/boycott/companies/products/sitemap'))) {
            mkdir(public_path('/boycott/companies/products/sitemap'), recursive: true);
        }

        for ($n = 0; $n < $numberOfBatches; $n++) {
            $path = "/boycott/companies/products/sitemap/{$n}.xml";

            $offset = $n * 50000;
            $products = BoycottedProduct::with(['company'])
                ->offset($offset)
                ->limit(50000)
                ->get();

            $sitemap = Sitemap::create();
            foreach ($products as $product) {
                $sitemap->add(Url::create(route('boycott.companies.show', [
                    $product->company,
                    'product' => $product->id
                ])));
            }
            $sitemap->writeToFile(public_path($path));

            $sitemaps[] = SitemapTag::create($path);
        }

        return $sitemaps;
    }
}
