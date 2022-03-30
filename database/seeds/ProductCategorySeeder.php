<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $fakerEn = Faker\Factory::create('en_GB');
        // $fakerAr = Faker\Factory::create('ar_SA');

        // $no_of_rows = 20;
        // for ($i = 0; $i < $no_of_rows; $i++) {
        //     $category = array(
        //         'ar_title' => $fakerAr->unique()->realText(50),
        //         'en_title' => $fakerEn->unique()->realText(50),
        //         'ar_description' => $fakerAr->realText(500),
        //         'en_description' => $fakerEn->realText(500),
        //         'rule' => rand(0, 1),
        //         // 'is_main' => rand(0, 1),
        //         'is_main' => 0,
        //         // 'category_id' => ProductCategory::all()->random()->id,
        //     );
        //     ProductCategory::insert($category);
        //     $category = null;
        // }

        // main category 
        $cat = new ProductCategory();
        $cat->ar_title = 'التجميعات الاحترافية';
        $cat->en_title = 'Professional collections';
        $cat->ar_description = 'التجميعات الاحترافية';
        $cat->en_description = 'Professional collections';
        $cat->rule = '1';
        $cat->is_main = '1';
        $cat->category_id = null;
        $cat->save();

        $ar_varibles = ['تجميعات مع كرت GT' , 'تجميعات مع كرت GTX16XX','تجميعات مع كرت RTX20XX','تجميعات مع كرت RTX30XX','تجميعات مع كرت ','تتجميعات مع كرت  RX','تجميعات مع معالج AMD','تجميعات مكتبية قابلة للتطوير (بدون كرت شاشة)'];
        $en_varibles = ['PC GAMING WITH GT' , 'PC GAMING WITH GTX16XX ','PC GAMING WITH RTX20XX','PC GAMING WITH RTX30XX','PC GAMING WITH RX','Custom PCs with AMD','Scalable desktop computers (Without GPU)'];
        $newData = [];
        for($i = 0 ; $i<count($en_varibles) ; $i++){
            $data['ar_title'] = $ar_varibles[$i];
            $data['en_title'] = $en_varibles[$i];
            $data['ar_description'] = $ar_varibles[$i];
            $data['en_description'] = $en_varibles[$i];
            $data['rule'] = '1';
            $data['is_main'] = '0';
            $data['category_id'] = $cat->id;
            $newData[] =$data; 
        }
        ProductCategory::insert($newData);

        // second categories group
        $cat = new ProductCategory();
        $cat->ar_title = 'قطع الكمبيوتر';
        $cat->en_title = 'Computer parts';
        $cat->ar_description = 'قطع الكمبيوتر';
        $cat->en_description = 'Computer parts';
        $cat->rule = '1';
        $cat->is_main = '1';
        $cat->category_id = null;
        $cat->save();

        $ar_varibles = ['المذربوردات','المعالجات','الرامات','SSD','Hardrive HDD','لاقط وايفاي','كروت الشاشة','مبرد المعالج','مزود الطاقة','الكيسات'];
        $en_varibles = ['Motherboard','Cpu','Ram','SSD','Hardrive HDD','Wifi Adapter','Graphic card','CPU Cooler','Power Supply','Cases'];
        $newData = [];
        for($i = 0 ; $i<count($en_varibles) ; $i++){
            $data['ar_title'] = $ar_varibles[$i];
            $data['en_title'] = $en_varibles[$i];
            $data['ar_description'] = $ar_varibles[$i];
            $data['en_description'] = $en_varibles[$i];
            $data['rule'] = '1';
            $data['is_main'] = '0';
            $data['category_id'] = $cat->id;
            $newData[] =$data; 
        }
        ProductCategory::insert($newData);


        $cat = new ProductCategory();
        $cat->ar_title = 'اكسسوارات الكمبيوتر';
        $cat->en_title = 'Gaming Accessories';
        $cat->ar_description = 'اكسسوارات الكمبيوتر';
        $cat->en_description = 'Gaming Accessories';
        $cat->rule = '1';
        $cat->is_main = '1';
        $cat->category_id = null;
        $cat->save();

        $ar_varibles = ['كراسي القمينق','طاولات الكمبيوتر','السماعات','الكاميرات','الكيابل واكسسوات الاضاءة','الكيبوردات','الماوسات','الماوسباد','مايكات احترافية','أكسسورات الستريم Elgato','أكسسورات قيادة للالعاب'];
        $en_varibles = ['Gaming Chair','Gaming Table','Headset','Webcams','Cables and lighting accessories','Keyboards Gaming','Mouses gaming','Mousepad','Professional Mics','Elgato stream accessories','Driving accessories for games'];
        $newData = [];
        for($i = 0 ; $i<count($en_varibles) ; $i++){
            $data['ar_title'] = $ar_varibles[$i];
            $data['en_title'] = $en_varibles[$i];
            $data['ar_description'] = $ar_varibles[$i];
            $data['en_description'] = $en_varibles[$i];
            $data['rule'] = '1';
            $data['is_main'] = '0';
            $data['category_id'] = $cat->id;
            $newData[] =$data; 
        }
        ProductCategory::insert($newData);



        $cat = new ProductCategory();
        $cat->ar_title = 'اللاب توبات';
        $cat->en_title = 'Lap tops';
        $cat->ar_description = 'اللاب توبات';
        $cat->en_description = 'Lap tops';
        $cat->rule = '1';
        $cat->is_main = '1';
        $cat->category_id = null;
        $cat->save();

        $ar_varibles = ['Celeron & I3','Intel I5','Intel I7'];
        $en_varibles = ['Celeron & I3','Intel I5','Intel I7'];
        $newData = [];
        for($i = 0 ; $i<count($en_varibles) ; $i++){
            $data['ar_title'] = $ar_varibles[$i];
            $data['en_title'] = $en_varibles[$i];
            $data['ar_description'] = $ar_varibles[$i];
            $data['en_description'] = $en_varibles[$i];
            $data['rule'] = '1';
            $data['is_main'] = '0';
            $data['category_id'] = $cat->id;
            $newData[] =$data; 
        }
        ProductCategory::insert($newData);




        $cat = new ProductCategory();
        $cat->ar_title = 'الشاشات';
        $cat->en_title = 'Monitors';
        $cat->ar_description = 'الشاشات';
        $cat->en_description = 'Monitors';
        $cat->rule = '1';
        $cat->is_main = '1';
        $cat->category_id = null;
        $cat->save();

        $ar_varibles = ['60-75Hz','120-144-165Hz','240hz-360hz' ,'كوابل / توصيلات احترافيه للشاشات'];
        $en_varibles = ['60-75Hz','120-144-165Hz','240hz-360hz','Professional cables / connections for monitors'];
        $newData = [];
        for($i = 0 ; $i<count($en_varibles) ; $i++){
            $data['ar_title'] = $ar_varibles[$i];
            $data['en_title'] = $en_varibles[$i];
            $data['ar_description'] = $ar_varibles[$i];
            $data['en_description'] = $en_varibles[$i];
            $data['rule'] = '1';
            $data['is_main'] = '0';
            $data['category_id'] = $cat->id;
            $newData[] =$data; 
        }
        ProductCategory::insert($newData);

        $categories = ProductCategory::get();
        foreach($categories as $category){
            $category->slug = Str::random(30);
            $category->save();
        }
    }
}
