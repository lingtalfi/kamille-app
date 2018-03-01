<?php


namespace Module\ThisApp\Model\Blog;


use Bat\RandomTool;
use Core\Services\A;

class BlogItemModel
{


    public static function getBlogItems(array $options = [])
    {
        $items = [];

        /**
         * note: usually you would get blog items from a db
         */
        $img = "/theme/bootstrapv4/img/thumbnail.svg";
        for ($i = 1; $i <= 9; $i++) {
            $items[] = [
                'img' => $img,
                'text' => RandomTool::lorem(null, 10, 30),
                'nbMinutes' => rand(1, 30),
                'link' => A::link("MyApp_bootstrap_blog_item", [
                    "id" => $i,
                ]),
            ];
        }

        return $items;
    }


    public static function getBlogItemById($id)
    {
        /**
         * note: usually you would get blog items from a db
         */
//        $img = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_161e22ad4b5%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_161e22ad4b5%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.20000076293945%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
        $img = "/theme/bootstrapv4/img/thumbnail.svg";
        return [
            'img' => $img,
            'title' => "What about item #$id?",
            'text' => RandomTool::lorem(null, 200, 210),
            'nbMinutes' => rand(1, 30),
            'linkBack' => A::link("MyApp_bootstrap_blog"),
        ];
    }

}