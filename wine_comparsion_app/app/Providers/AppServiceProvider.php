<?php

namespace App\Providers;

use App\Models\Folder;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $user_id = Auth::id();
            $memo_model = new Memo();
            $memos = $memo_model->myMemo($user_id);
            $text = 'aaaa';
            $folder_model = new Folder();
            $folders = $folder_model->where('user_id', $user_id)->get();
            $view->with(compact('memos', 'text', 'user_id', 'folders'));
            // $view->with('text', 'asaaa')->with('memos', $memos);
        });
    }
}
