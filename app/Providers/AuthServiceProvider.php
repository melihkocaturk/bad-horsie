<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Club;
use App\Models\Event;
use App\Models\Horse;
use App\Models\Lesson;
use App\Models\LessonRight;
use App\Models\User;
use App\Policies\ClubPolicy;
use App\Policies\EventPolicy;
use App\Policies\HorsePolicy;
use App\Policies\LessonPolicy;
use App\Policies\LessonRightPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Horse::class => HorsePolicy::class,
        Club::class => ClubPolicy::class,
        Event::class => EventPolicy::class,
        Lesson::class => LessonPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('show-student-lesson', function (User $user, Lesson $lesson) {
            return $user->id === $lesson->student_id;
        });

        Gate::define('update-student-lesson', function (User $user, Lesson $lesson) {
            return $user->id === $lesson->student_id;
        });

        Gate::define('show-trainer-lesson', function (User $user, Lesson $lesson) {
            return $user->id === $lesson->trainer_id;
        });

        Gate::define('edit-trainer-lesson', function (User $user, Lesson $lesson) {
            return $user->id === $lesson->trainer_id;
        });

        Gate::define('update-trainer-lesson', function (User $user, Lesson $lesson) {
            return $user->id === $lesson->trainer_id;
        });

        Gate::define('store-lesson-right', function (User $user, Club $club) {
            return $user->id === $club->user_id;
        });

        Gate::define('store-member', function (User $user, Club $club) {
            return $user->id === $club->user_id;
        });

        Gate::define('destroy-member', function (User $user, Club $club) {
            return $user->id === $club->user_id;
        });
    }
}
