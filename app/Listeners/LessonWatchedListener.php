<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LessonWatchedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LessonWatchedListener $event)
    {
        //
        $user = $event->user;
        $lesson = $event->lesson;

        $userLessonCount = DB::table('')->where('user_id',$user->id)->where('watched',1)->count();

           
            switch ($userLessonCount) {
                case ($userLessonCount > 0 && $userLessonCount < 5) :
                    echo 'First achievement unlocked and beginner badge obtained';
                    break;
                case ($userLessonCount >= 5 && $userLessonCount < 10) :
                    echo 'Two achievement unlocked and beginner badge obtained';
                    break;
                case ($userLessonCount >= 10 && $userLessonCount < 25) :
                    echo 'Three achievement unlocked and beginner badge obtained';
                    break;
                case ($userLessonCount >= 25 && $userLessonCount < 50) :
                    echo 'Four achievement unlocked and intermediate badge obtained';
                    break;

                    default:

                    
            }

    }
}
