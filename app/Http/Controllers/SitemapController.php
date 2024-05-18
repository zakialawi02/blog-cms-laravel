<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $articles = Article::where(['status' => 'published', ['published_at', '<', now()]])
            ->orderBy('published_at', 'desc')->get();
        $categories = Category::orderBy('updated_at', 'desc')->get();
        $tags = Tag::orderBy('updated_at', 'desc')->get();

        $sitemapContent = $this->buildSitemap($articles, $categories, $tags);

        return response($sitemapContent, 200)->header('Content-Type', 'application/xml');
    }

    private function buildSitemap($articles, $categories, $tags)
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<priority>1.00</priority>';
        $sitemap .= '</url>';

        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<priority>0.80</priority>';
        $sitemap .= '</url>';

        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/login') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<priority>0.50</priority>';
        $sitemap .= '</url>';

        foreach ($articles as $article) {
            $year = $article->published_at ? $article->published_at->format('Y') : $article->created_at->format('Y');
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . url('/blog/' . $year . '/' . $article->slug) . '</loc>';
            $sitemap .= '<lastmod>' . $article->updated_at->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>weekly</changefreq>';
            $sitemap .= '<priority>0.8</priority>';
            $sitemap .= '</url>';
        }

        foreach ($categories as $category) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . url('/blog/categories/' . $category->slug) . '</loc>';
            $sitemap .= '<lastmod>' . $category->updated_at->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>weekly</changefreq>';
            $sitemap .= '<priority>0.5</priority>';
            $sitemap .= '</url>';
        }

        foreach ($tags as $tag) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . url('/blog/tags/' . $tag->slug) . '</loc>';
            $sitemap .= '<lastmod>' . $tag->updated_at->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>weekly</changefreq>';
            $sitemap .= '<priority>0.5</priority>';
            $sitemap .= '</url>';
        }

        $sitemap .= '</urlset>';

        return $sitemap;
    }
}
