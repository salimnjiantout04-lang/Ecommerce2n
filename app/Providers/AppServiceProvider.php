<?php
namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Categorie;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);


       

    // 🔹 On partage les sous-catégories avec toutes les vues
    View::share('souscategories', Categorie::orderBy('created_at', 'desc')->limit(5)->get());
    View::share('souscategories1', Categorie::orderBy('created_at', 'desc')->get());


    }
}