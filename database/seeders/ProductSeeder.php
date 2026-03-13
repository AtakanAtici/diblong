<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Diblong Ginseng Bonbons',
                'slug' => 'diblong-ginseng-bonbons',
                'short_description' => 'Ginseng katkılı enerji şekeri. Hızlı ve uzun süreli etki.',
                'description' => "Diblong Ginseng Bonbons, özel formülüyle hazırlanmış ginseng katkılı enerji şekeridir.\n\nHer pakette 2 adet bonbon bulunmaktadır. Doğal meyveli aromasıyla hem lezzetli hem de etkili bir takviye sunar.\n\nİçindekiler: Ginseng ekstresi, doğal meyve aromaları, şeker.\n\nKullanım: Günde 1 adet tüketilmesi önerilir.",
                'price' => 249.90,
                'old_price' => 349.90,
                'image' => 'bonbon_seker.jpeg',
                'image2' => 'bonbon_seker1.jpeg',
                'category' => 'erkek',
            ],
            [
                'name' => 'Diblong Ginseng Enerji İçeceği',
                'slug' => 'diblong-ginseng-enerji-icecegi',
                'short_description' => 'Ginseng katkılı doğal enerji içeceği. Performans ve dayanıklılık.',
                'description' => "Diblong Ginseng Drink, özel formülasyonu ile hazırlanmış doğal ginseng katkılı enerji içeceğidir.\n\nGünün her anında ihtiyaç duyduğunuz enerjiyi sağlamak için özel olarak geliştirilmiştir.\n\nİçindekiler: Su, ginseng ekstresi, doğal tatlandırıcılar.\n\nKullanım: İhtiyaç duyulduğunda 1 kutu tüketilmesi önerilir.",
                'price' => 199.90,
                'old_price' => 299.90,
                'image' => 'enerji_icecek.jpeg',
                'image2' => 'enerji_icecek1.jpeg',
                'category' => 'erkek',
            ],
            [
                'name' => 'Diblong Ginseng Chocolate For Men',
                'slug' => 'diblong-ginseng-chocolate-men',
                'short_description' => 'Erkeklere özel ginseng katkılı çikolata. Doğal ve etkili formül.',
                'description' => "Diblong Ginseng Chocolate For Men, doğal ginseng ekstresi ile zenginleştirilmiş özel çikolatadır.\n\nHızlı ve uzun süreli etki sağlayan %100 doğal formülasyonu ile fark yaratır.\n\nİçindekiler: Kakao, ginseng ekstresi, doğal tatlandırıcılar.\n\nKullanım: Günde 1 adet tüketilmesi önerilir.",
                'price' => 349.90,
                'old_price' => 449.90,
                'image' => 'erkek_cikolata.jpeg',
                'image2' => 'erkek_cikolata1.jpeg',
                'category' => 'erkek',
            ],
            [
                'name' => 'Diblong Power Honey VIP',
                'slug' => 'diblong-power-honey-vip',
                'short_description' => 'Ballı ginsengli macun. VIP formülasyonu ile 12x15g paket.',
                'description' => "Diblong Power Honey VIP, ballı ginsengli özel macun formülasyonudur.\n\n12 adet 15g'lık poşet halinde sunulur. Bal, ginseng ve özel bitkisel bileşenlerin bir araya gelmesiyle oluşan eşsiz bir takviyedir.\n\nİçindekiler: Bal, ginseng ekstresi, tarçın, bitkisel karışım.\n\nKullanım: Günde 1 poşet tüketilmesi önerilir.",
                'price' => 599.90,
                'old_price' => 749.90,
                'image' => 'honey.jpeg',
                'image2' => null,
                'category' => 'erkek',
            ],
            [
                'name' => 'Diblong Ginseng Kapsül',
                'slug' => 'diblong-ginseng-kapsul',
                'short_description' => 'Ginsencli bitkisel kapsül. Hızlı ve uzun süreli etki.',
                'description' => "Diblong Ginseng Capsule, ginsengli bitkisel kapsül takviyesidir.\n\nHer pakette 2 kapsül bulunmaktadır. Bitkisel bileşenlerin bilimsel yöntemlerle bir araya getirilmesiyle oluşan özel formül.\n\nİçindekiler: Ginseng ekstresi, bitkisel karışım.\n\nKullanım: İhtiyaç duyulduğunda 1 kapsül tüketilmesi önerilir.",
                'price' => 299.90,
                'old_price' => 399.90,
                'image' => 'kapsul.jpeg',
                'image2' => 'kapsul1.jpeg',
                'category' => 'erkek',
            ],
            [
                'name' => 'Diblong Ginseng Lady Chocolate',
                'slug' => 'diblong-ginseng-lady-chocolate',
                'short_description' => 'Kadınlara özel ginseng katkılı çikolata. Enerji ve canlılık.',
                'description' => "Diblong Ginseng Lady Chocolate, kadınlar için özel olarak formüle edilmiş ginseng katkılı çikolatadır.\n\nDoğal bileşenlerle zenginleştirilmiş özel formülü sayesinde enerji ve canlılık sağlar.\n\nİçindekiler: Kakao, ginseng ekstresi, lavanta, doğal tatlandırıcılar.\n\nKullanım: Günde 1 adet tüketilmesi önerilir.",
                'price' => 349.90,
                'old_price' => 449.90,
                'image' => 'lady_cikolata.jpeg',
                'image2' => 'lady_cikolata1.jpeg',
                'category' => 'kadin',
            ],
            [
                'name' => 'Diblong Power Honey 43g',
                'slug' => 'diblong-power-honey-43g',
                'short_description' => 'Kavanoz power honey. 43g yetişkin gıda takviyesi.',
                'description' => "Diblong Power Honey, 43g kavanoz ambalajında sunulan yetişkinler için özel bal takviyesidir.\n\n72 saat etkili özel formülasyonu ile fark yaratır. %100 doğal bileşenlerden üretilmiştir.\n\nİçindekiler: Bal, ginseng ekstresi, bitkisel karışım.\n\nKullanım: 1 çay kaşığı tüketilmesi önerilir.",
                'price' => 449.90,
                'old_price' => 549.90,
                'image' => 'macun.jpeg',
                'image2' => 'macun1.jpeg',
                'category' => 'erkek',
            ],
            [
                'name' => 'Diblong Power Honey Premium',
                'slug' => 'diblong-power-honey-premium',
                'short_description' => 'Premium formülasyonlu power honey. Ekstra güçlü.',
                'description' => "Diblong Power Honey Premium, ekstra güçlü formülasyonu ile hazırlanmış premium bal takviyesidir.\n\nYetişkinler için özel olarak geliştirilmiş, en kaliteli doğal bileşenlerin bir araya gelmesiyle oluşturulmuştur.\n\nİçindekiler: Organik bal, ginseng ekstresi, özel bitkisel karışım.\n\nKullanım: 1 çay kaşığı tüketilmesi önerilir.",
                'price' => 549.90,
                'old_price' => 699.90,
                'image' => 'macunn.jpeg',
                'image2' => 'macunn1.jpeg',
                'category' => 'erkek',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
