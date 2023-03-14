<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Iphone 13Promax',
                'price' => 3000000,
                'quantity' => 1,
                'description' => 'chất lượng tuyệt vời',
                'category_id' => 2,
                'folow' => '35k',
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/250728/iphone-13-pro-max-1-2.jpg'
            ],
            [
                'name' => 'Iphone 13Promax',
                'price' => 74000000,
                'quantity' => 2,
                'description' => 'Laptop Apple MacBook Air M1 2020 thuộc dòng laptop cao cấp sang trọng có cấu hình mạnh mẽ, chinh phục được các tính năng văn phòng lẫn đồ hoạ mà bạn mong muốn, thời lượng pin dài, thiết kế mỏng nhẹ sẽ đáp ứng tốt các nhu cầu làm việc của bạn.',
                'category_id' =>3 ,
                'folow' => '47k',
                'image' => 'https://cdn.tgdd.vn/Products/Images/44/231244/macbook-air-m1-2020-silver-01-org.jpg'
            ],
            [
                'name' => 'Tai nghe Bluetooth True Wireless Mozard Air 3',
                'price' => 355000,
                'quantity' => 1,
                'description' => 'Thiết kế nhỏ gọn, màu đen sang trọng.',
                'category_id' => 1,
                'folow' => '74k',
                'image' => 'https://cdn.tgdd.vn/Products/Images/54/230264/Kit/tai-nghe-bluetooth-true-wireless-mozard-air-3-den-note.jpg'
            ],

        ]);
    }
}
