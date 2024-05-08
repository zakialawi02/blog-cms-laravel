<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleView>
 */
class ArticleViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = [
            'Russia' => 'RU',
            'United States' => 'US',
            'France' => 'FR',
            'Japan' => 'JP',
            'Brazil' => 'BR',
            'India' => 'IN',
            'Germany' => 'DE',
            'China' => 'CN',
            'South Korea' => 'KR',
            'Canada' => 'CA',
            'Italy' => 'IT',
            'United Kingdom' => 'GB',
            'Australia' => 'AU',
            'Netherlands' => 'NL',
            'Spain' => 'ES',
            'Mexico' => 'MX',
            'Indonesia' => 'ID',
            'Turkey' => 'TR',
            'Sweden' => 'SE',
            'Switzerland' => 'CH',
            'Saudi Arabia' => 'SA',
            'Argentina' => 'AR',
            'Nigeria' => 'NG',
            'South Africa' => 'ZA',
            'Egypt' => 'EG',
            'Philippines' => 'PH',
            'Pakistan' => 'PK',
            'Bangladesh' => 'BD',
            'Colombia' => 'CO',
            'Poland' => 'PL',
            'Iran' => 'IR',
            'Vietnam' => 'VN',
            'Czech Republic' => 'CZ',
            'Norway' => 'NO',
            'Austria' => 'AT',
            'Ireland' => 'IE',
            'Malaysia' => 'MY',
            'Ukraine' => 'UA',
            'Thailand' => 'TH',
            'Belgium' => 'BE',
            'Greece' => 'GR',
            'Finland' => 'FI',
            'Portugal' => 'PT',
            'Israel' => 'IL',
            'Denmark' => 'DK',
            'New Zealand' => 'NZ',
            'Singapore' => 'SG',
            'Hungary' => 'HU',
            'Chile' => 'CL',
            'Romania' => 'RO',
            'Luxembourg' => 'LU',
            'Kazakhstan' => 'KZ',
            'Qatar' => 'QA',
            'Peru' => 'PE',
            'Slovakia' => 'SK',
            // Add as many countries as needed for comprehensive testing
        ];

        // Randomly pick a country and code
        $country = $this->faker->randomElement(array_keys($countries));
        $code = $countries[$country];
        $articles = Article::all()->pluck('id')->toArray();

        return [
            'article_id' => fake()->randomElement($articles),
            'viewed_at' => $this->faker->dateTimeThisYear(),
            'ip_address' => $this->faker->ipv4,
            'location' => $country,
            'code' => $code,
        ];
    }
}
