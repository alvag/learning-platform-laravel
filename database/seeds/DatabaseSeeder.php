<?php

use App\Category;
use App\Course;
use App\Goal;
use App\Level;
use App\Requirement;
use App\Review;
use App\Role;
use App\Student;
use App\Subscription;
use App\Teacher;
use App\User;
use App\UserSocialAccount;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Storage::deleteDirectory('courses');
        Storage::deleteDirectory('users');

        Storage::makeDirectory('courses');
        Storage::makeDirectory('users');

//        Category::truncate();
//        Course::truncate();
//        Goal::truncate();
//        Level::truncate();
//        Requirement::truncate();
//        Review::truncate();
//        Role::truncate();
//        Student::truncate();
//        Teacher::truncate();
//        User::truncate();
//        Subscription::truncate();
//        UserSocialAccount::truncate();

//        Category::flushEventListeners();
//        Course::flushEventListeners();
//        Goal::flushEventListeners();
//        Level::flushEventListeners();
//        Requirement::flushEventListeners();
//        Review::flushEventListeners();
//        Role::flushEventListeners();
//        Student::flushEventListeners();
//        Teacher::flushEventListeners();
//        User::flushEventListeners();
//        Subscription::flushEventListeners();
//        UserSocialAccount::flushEventListeners();

        factory(Role::class, 1)->create(['name' => 'admin']);
        factory(Role::class, 1)->create(['name' => 'teacher']);
        factory(Role::class, 1)->create(['name' => 'student']);

        factory(User::class, 1)->create([
            'name'     => 'admin',
            'email'    => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role_id'  => Role::ADMIN
        ])->each(function (User $user) {
            factory(Student::class, 1)->create(['user_id' => $user->id]);
        });

        factory(User::class, 50)->create()
            ->each(function (User $user) {
                factory(Student::class, 1)->create(['user_id' => $user->id]);
            });

        factory(User::class, 10)->create()
            ->each(function (User $user) {
                factory(Student::class, 1)->create(['user_id' => $user->id]);
                factory(Teacher::class, 1)->create(['user_id' => $user->id]);
            });

        factory(Level::class, 1)->create(['name' => 'Beginner']);
        factory(Level::class, 1)->create(['name' => 'Intermediate']);
        factory(Level::class, 1)->create(['name' => 'Advanced']);
        factory(Category::class, 5)->create();

        factory(Course::class, 50)->create()
            ->each(function (Course $course) {
                $course->goals()->saveMany(factory(Goal::class, 2)->create());
                $course->requirements()->saveMany(factory(Requirement::class, 2)->create());
            });
    }
}
