<?php

namespace App\Providers;

use Filament\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

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
        model::unguard();

        // //Filament::serving(function () {
        //     // Assuming you want the first company for the brand logo
        //     $company = Company::first(); // Adjust this logic as needed

        //     if ($company) {
        //         Filament::brandLogo(fn () => view('filament.admin.logo', ['logoUrl' => $company->logo_url]));
        //     } else {
        //         // Fallback if no company found
        //         Filament::brandLogo(fn () => view('filament.admin.logo', ['logoUrl' => null]));
        //     }
        // //});
    }
}
