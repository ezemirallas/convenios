<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;
use JeroenNoten\LaravelAdminLte\Events\ReadingDarkModePreference;

use App\Models\User;

class AdminLteEventSubscriber
{
    protected $user;

    public function __construct(User $user)
    {
    $this->user = $user;
    }

    public function handleReadingDarkModeEvt(ReadingDarkModePreference $event)
    {

        $darkModeCfg = $this->getDarkModeSettingFromDB();

        // Setup initial dark mode preference.

        if ($darkModeCfg) {
            $event->darkMode->enable();
        } else {
            $event->darkMode->disable();
        }
    }

    public function handleDarkModeWasToggledEvt(DarkModeWasToggled $event)
    {
        // Get the new dark mode preference (enabled or not).

        $darkModeCfg = $event->darkMode->isEnabled();

        // Store the new dark mode preference on the database.

        $this->storeDarkModeSettingOnDB($darkModeCfg);

        // TODO: Implement previous method to store the new dark mode
        // preference for the authenticated user. Usually this preference will
        // be stored on a database, it is your task to store it.
    }

    private function getDarkModeSettingFromDB() : bool {
        return Auth::check() && Auth::user()->admin_lte_dark_mode;
    }

    private function storeDarkModeSettingOnDB(bool $darkModeCfg) : void {
        if(!Auth::check()){
            Log::debug('Can\'t update dark mode setting: there is no user authenticated!');
        }else{
            $user_id = Auth::user()->id;
            $user = $this->user->find($user_id);
            if(!$user){
                Log::debug('Can\'t update dark mode setting: there is no user found with id: '.$user_id);
            }else{
                $user->admin_lte_dark_mode = $darkModeCfg;
                $user->save();
            }
        }
    }
}
