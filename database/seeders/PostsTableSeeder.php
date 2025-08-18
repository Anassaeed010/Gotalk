<?php

namespace Database\Seeders;
use App\Models\PostModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
 



  
{
    public function run(): void
    {
        $posts = [
            // 🔹 10 أخبار متعة وتشويق (مسلسل ديكستر الجديد)
            [
                'title' => 'Dexter: الموسم الجديد يبدأ الليلة',
                'content' => 'تعود شخصية ديكستر إلى الشاشات في موسم مليء بالغموض والإثارة.',
                'category' => 'fun',
                'image' => 'https://via.placeholder.com/150/FF0000/FFFFFF?text=Dexter+1'
            ],
            [
                'title' => 'Dexter يواجه تحديات جديدة',
                'content' => 'أحداث الموسم الجديد ستأخذ ديكستر إلى حدود غير متوقعة.',
                'category' => 'fun',
                'image' => 'https://via.placeholder.com/150/FF0000/FFFFFF?text=Dexter+2'
            ],
            // كرر لبقية 8 أخبار ديكستر...
            
            // 🔹 10 أخبار ثقافي واجتماعي (فريق فالكونز السعودي)
            [
                'title' => 'فريق فالكونز السعودي يفوز بالبطولة',
                'content' => 'تحقق فالكونز السعودي إنجازًا كبيرًا في البطولة الإقليمية.',
                'category' => 'culture',
                'image' => 'https://via.placeholder.com/150/008000/FFFFFF?text=Falcons+1'
            ],
            [
                'title' => 'فالكونز السعودي يواجه تحديات جديدة',
                'content' => 'الفريق يستعد لموسم مليء بالمنافسة والإثارة.',
                'category' => 'culture',
                'image' => 'https://via.placeholder.com/150/008000/FFFFFF?text=Falcons+2'
            ],
            // كرر لبقية 8 أخبار فريق فالكونز...

            // 🔹 10 أخبار تقنية (صناع محتوى يوتيوب مشهورون)
            [
                'title' => 'TechGuru يطلق فيديو جديد عن AI',
                'content' => 'شرح تفصيلي لأحدث تقنيات الذكاء الاصطناعي على قناته.',
                'category' => 'tech',
                'image' => 'https://via.placeholder.com/150/800080/FFFFFF?text=Tech1'
            ],
            [
                'title' => 'CoderX يكشف أسرار البرمجة',
                'content' => 'نصائح احترافية لتعلم البرمجة بسرعة وفاعلية.',
                'category' => 'tech',
                'image' => 'https://via.placeholder.com/150/800080/FFFFFF?text=Tech2'
            ],
            // كرر لبقية 8 أخبار تقنية...
        ];

        foreach ($posts as $post) {
            PostModel::create($post);
        }
    }
}


    

