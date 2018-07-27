<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Faker\Generator', function ($app) {
            $faker = \Faker\Factory::create();
            $newClass = new class($faker) extends \Faker\Provider\Base
            {
                private $emojis;
                private $tags;
                private $titles;
                private $issueNo = 1;

                public function __construct()
                {
                    $this->emojis = ['💣', '💩', '💰', '💯', '👓', '👊', '👉', '🚀', '✔', '📈',];
                    $this->tags = [
                        'WTF', 'JavaScript', 'Security', 'Chrome', 'Accessibility', 'Elm', 'PHP', 'Humour', 'Databases',
                        'UX', 'Frontend', 'GDPR', 'CSS', 'ML', 'Design',
                    ];
                    $this->titles = [
                        "Tutorials, courses, and all the recipes you need",
                        "Articles which will make you think",
                        "Ever considered job change?",
                        "Not really sure what you're doing? Check these out!",
                        "What every developer should know",
                        "Smashing news!",
                        "Daily dose of GMD ratio in the browser",
                    ];
                }

                public function miscEmoji()
                {
                    return array_random($this->emojis, 1)[0];
                }

                public function tag()
                {
                    return array_random($this->tags, 1)[0];
                }

                public function groupName()
                {
                    return array_random($this->titles, 1)[0];
                }

                public function issueNumber()
                {
                    return $this->issueNo++;
                }
            };

            $faker->addProvider($newClass);

            return $faker;
        });
    }
}
