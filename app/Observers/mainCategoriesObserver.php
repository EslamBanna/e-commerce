<?php

namespace App\Observers;

use App\Models\categories\MainCatigorie;

class mainCategoriesObserver
{
    /**
     * Handle the MainCatigorie "created" event.
     *
     * @param  \App\Models\MainCatigorie  $mainCatigorie
     * @return void
     */
    public function created(MainCatigorie $mainCatigorie)
    {
        //
    }

    /**
     * Handle the MainCatigorie "updated" event.
     *
     * @param  \App\Models\MainCatigorie  $mainCatigorie
     * @return void
     */
    public function updated(MainCatigorie $mainCatigorie)
    {
        // return 'ewwww';
        // return $mainCatigorie->active;
        $mainCatigorie->vendors()->update(['active' => $mainCatigorie-> active]);
    }

    /**
     * Handle the MainCatigorie "deleted" event.
     *
     * @param  \App\Models\MainCatigorie  $mainCatigorie
     * @return void
     */
    public function deleted(MainCatigorie $mainCatigorie)
    {
        //
    }

    /**
     * Handle the MainCatigorie "restored" event.
     *
     * @param  \App\Models\MainCatigorie  $mainCatigorie
     * @return void
     */
    public function restored(MainCatigorie $mainCatigorie)
    {
        //
    }

    /**
     * Handle the MainCatigorie "force deleted" event.
     *
     * @param  \App\Models\MainCatigorie  $mainCatigorie
     * @return void
     */
    public function forceDeleted(MainCatigorie $mainCatigorie)
    {
        //
    }
}
