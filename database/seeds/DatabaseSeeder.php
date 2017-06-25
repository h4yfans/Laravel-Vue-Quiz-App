<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name'     => 'Kaan Karaca',
            'email'    => 'kaan94karaca@gmail.com',
            'password' => bcrypt(123123)
        ]);

        foreach ($this->videos() as $video) {
            $video = \App\Models\Video::create($video);
        }

        foreach ($this->questions() as $question) {
            $question = \App\Models\VideoQuestion::create($question);
        }

        foreach ($this->questionAnswers() as $questionAnswer) {
            $questionAnswer = \App\Models\VideoQuestionAnswer::create($questionAnswer);
        }

    }


    public function videos()
    {
        return [
            [
                'user_id'     => 1,
                'title'       => 'Puppy Video',
                'slug'        => str_slug('Puppy Video'),
                'embed'       => '189789787',
                'description' => 'Puppy video'
            ],
            [
                'user_id'     => 1,
                'title'       => 'Mustafa Kemal Atatürk',
                'slug'        => str_slug('Mustafa Kemal Atatürk'),
                'embed'       => '9399882',
                'description' => 'Mustafa Kemal Atatürk'
            ],
            [
                'user_id'     => 1,
                'title'       => 'Music Video',
                'slug'        => str_slug('Music Video'),
                'embed'       => '182966507',
                'description' => 'Music Video'
            ]
        ];
    }

    public function questions()
    {
        return [
            [
                'video_id' => 1,
                'question' => 'Eu sunt dolore sequi et voluptate sunt dignissimos?',
            ],
            [
                'video_id' => 1,
                'question' => 'Voluptatem Necessitatibus explicabo Consequat Et voluptatem vitae voluptas?',
            ],
            [
                'video_id' => 1,
                'question' => 'Labore excepteur voluptatibus assumenda minima anim reiciendis?',
            ],
            [
                'video_id' => 2,
                'question' => 'Ab consequuntur voluptas do incididunt pariatur Do at consequatur placeat magni?',
            ],
            [
                'video_id' => 2,
                'question' => 'Rem ut id perspiciatis culpa in itaque vel asperiores sapiente qui vel?',
            ],
            [
                'video_id' => 2,
                'question' => 'Amet quisquam eaque cupiditate fugit in cumque ab beatae do labore consequatur?',
            ],
            [
                'video_id' => 3,
                'question' => 'Enim saepe amet sit ea facere necessitatibus aut deserunt?',
            ],
            [
                'video_id' => 3,
                'question' => 'Veniam aut quia libero veniam nobis odio impedit reiciendis quaerat?',
            ],
        ];
    }

    public function questionAnswers()
    {
        return [
            [
                'video_id'    => 1,
                'question_id' => 1,
                'answer'      => 'Accusantium id voluptas placeat voluptate',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 1,
                'question_id' => 1,
                'answer'      => 'Enim aliqua Voluptas ut ut aut sed nesciunt anim',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 1,
                'question_id' => 1,
                'answer'      => 'Corrupti recusandae At cumque quis',
                'is_correct'  => 1
            ],
            [
                'video_id'    => 1,
                'question_id' => 1,
                'answer'      => 'Cupidatat minus reprehenderit dolores enim quas qui autem officia sed consequat',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 1,
                'question_id' => 2,
                'answer'      => 'Vitae sunt tempore ex enim obcaecati eu illum',
                'is_correct'  => 1
            ],
            [
                'video_id'    => 1,
                'question_id' => 2,
                'answer'      => 'Modi laborum enim laborum Facilis consequatur Qui nesciunt',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 1,
                'question_id' => 2,
                'answer'      => 'Praesentium odit et cupidatat sapiente vero eo',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 1,
                'question_id' => 2,
                'answer'      => 'Libero in quo excepteur beatae sint error sit incidunt',
                'is_correct'  => 0
            ],


            [
                'video_id'    => 2,
                'question_id' => 3,
                'answer'      => 'Cupidatat minus reprehenderit dolores enim quas qui autem officia sed consequat',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 2,
                'question_id' => 3,
                'answer'      => 'Vitae sunt tempore ex enim obcaecati eu illum',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 2,
                'question_id' => 3,
                'answer'      => 'Modi laborum enim laborum Facilis consequatur Qui nesciunt',
                'is_correct'  => 1
            ],
            [
                'video_id'    => 2,
                'question_id' => 3,
                'answer'      => 'Praesentium odit et cupidatat sapiente vero eo',
                'is_correct'  => 0
            ],

            [
                'video_id'    => 2,
                'question_id' => 4,
                'answer'      => 'Accusantium id voluptas placeat voluptate',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 2,
                'question_id' => 4,
                'answer'      => 'Enim aliqua Voluptas ut ut aut sed nesciunt anim',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 2,
                'question_id' => 4,
                'answer'      => 'Corrupti recusandae At cumque quis',
                'is_correct'  => 1
            ],
            [
                'video_id'    => 2,
                'question_id' => 4,
                'answer'      => 'Cupidatat minus reprehenderit dolores enim quas qui autem officia sed consequat',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 2,
                'question_id' => 5,
                'answer'      => 'Asperiores pariatur Velit sunt illum consequat Aut et eos',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 2,
                'question_id' => 5,
                'answer'      => 'Est et ut alias et ipsa nulla voluptate',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 2,
                'question_id' => 5,
                'answer'      => 'Et non et corporis ad qui est accusantium sit exercitation',
                'is_correct'  => 1
            ],
            [
                'video_id'    => 2,
                'question_id' => 5,
                'answer'      => 'Perferendis aut quaerat sit veritatis tempor eligendi vero amet magni sed',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 6,
                'answer'      => 'Asperiores pariatur Velit sunt illum consequat Aut et eos',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 6,
                'answer'      => 'Est et ut alias et ipsa nulla voluptate',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 6,
                'answer'      => 'Et non et corporis ad qui est accusantium sit exercitation',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 6,
                'answer'      => 'Perferendis aut quaerat sit veritatis tempor eligendi vero amet magni sed',
                'is_correct'  => 1
            ],


            [
                'video_id'    => 3,
                'question_id' => 7,
                'answer'      => 'Consequat Excepturi nulla odit id non qui dolore aliquam et',
                'is_correct'  => 1
            ],
            [
                'video_id'    => 3,
                'question_id' => 7,
                'answer'      => 'Eos in numquam qui sed labore aliquam deserunt vitae cupidi',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 7,
                'answer'      => 'Voluptatibus ut et fuga Sed',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 7,
                'answer'      => 'Neque corporis voluptatibus aspernatur adipisicing iste dignissimos adipisicing ',
                'is_correct'  => 0
            ],

            [
                'video_id'    => 3,
                'question_id' => 8,
                'answer'      => 'Eligendi libero sed voluptate sequi cum fugiat officia dolor dolore ',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 8,
                'answer'      => 'Accusantium est corporis sequi dolor quia et quod vel',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 8,
                'answer'      => 'Ut cupiditate odio anim minima est rerum voluptatum voluptate commod',
                'is_correct'  => 0
            ],
            [
                'video_id'    => 3,
                'question_id' => 8,
                'answer'      => 'Sequi proident pariatur In voluptates est dolores',
                'is_correct'  => 1
            ],
        ];
    }
}


