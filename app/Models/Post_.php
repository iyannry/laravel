<?php

namespace App\Models;

class Post
{
   private static $blog_posts =  [
    [
    "title" => "Judul Pertama",
    "slug" => "judul-post-pertama",
    "author" => "Diannita",
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut amet assumenda dolorem itaque explicabo rerum nostrum fuga optio, nemo vel animi tempora fugit sapiente illum dolores, ea culpa, nihil quidem quos vero. Totam, natus velit quis minima veniam iste magni doloribus saepe eos voluptatibus adipisci asperiores facilis provident nisi accusamus nobis sapiente, harum dolorum atque eligendi corporis incidunt rem quod. At natus delectus laboriosam sed, officia deleniti commodi vel ut mollitia fuga numquam! Molestias repudiandae animi dolores, dolor harum, sed odio vel iure accusantium sapiente facilis adipisci, corporis impedit exercitationem!"
],
[
    "title" => "Judul Kedua",
    "slug" => "judul-post-kedua",
    "author" => "Permatasari",
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut amet assumenda dolorem itaque explicabo rerum nostrum fuga optio, nemo vel animi tempora fugit sapiente illum dolores, ea culpa, nihil quidem quos vero. Totam, natus velit quis minima veniam iste magni doloribus saepe eos voluptatibus adipisci asperiores facilis provident nisi accusamus nobis sapiente, harum dolorum atque eligendi corporis incidunt rem quod. At natus delectus laboriosam sed, officia deleniti commodi vel ut mollitia fuga numquam! Molestias repudiandae animi dolores, dolor harum, sed odio vel iure accusantium sapiente facilis adipisci, corporis impedit exercitationem!"
]
];

    public static function all()
    {
        return self::$blog_posts;
    }

    public static function find($slug)
    {
        $posts = static::all;
        return $posts->firsWhere($slug, $slug);
    }
}
