<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\Room;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categories
        $catGastronomie = Category::create(['name' => 'Gastronomie', 'slug' => 'gastronomie']);
        $catVoyage = Category::create(['name' => 'Voyage', 'slug' => 'voyage']);
        $catCulture = Category::create(['name' => 'Culture', 'slug' => 'culture']);

        // Posts
        Post::create([
            'category_id' => $catGastronomie->id,
            'title' => 'L\'Amiwo : Le Roi de la Table Béninoise',
            'slug' => Str::slug('L\'Amiwo : Le Roi de la Table Béninoise'),
            'image' => 'img/benin_food.png',
            'content' => 'L\'amiwo est une pâte de maïs rouge préparée avec du jus de tomate et diverses épices. C\'est l\'un des plats les plus emblématiques du Bénin, souvent servi avec du poulet braisé ou frit. Sa couleur rouge vive et son goût riche en font le roi de toutes les cérémonies.',
            'excerpt' => 'Découvrez les secrets de préparation de ce plat emblématique à base de pâte rouge et de poulet braisé...',
            'author' => 'Aïcha Koné'
        ]);

        Post::create([
            'category_id' => $catVoyage->id,
            'title' => 'Excursion à Ganvié : La Venise de l\'Afrique',
            'slug' => Str::slug('Excursion à Ganvié : La Venise de l\'Afrique'),
            'image' => 'img/benin_ganvie.jpg',
            'content' => 'Ganvié est une cité lacustre située sur le lac Nokoué. Construite entièrement sur pilotis, cette ville est un témoignage fascinant de l\'histoire et de la résilience du peuple Tofinu. Une promenade en pirogue à travers ses canaux est une expérience hors du commun.',
            'excerpt' => 'Embarquez pour une aventure unique au milieu des cités lacustres. Rencontre avec les habitants...',
            'author' => 'Jean-Marc Dossou'
        ]);

        Post::create([
            'category_id' => $catCulture->id,
            'title' => 'Ouidah et la Route des Esclaves',
            'slug' => Str::slug('Ouidah et la Route des Esclaves'),
            'image' => 'img/benin_ouidah.jpg',
            'content' => 'Ouidah est le centre spirituel du Vaudou au Bénin, mais c\'est aussi une ville chargée d\'histoire coloniale. La Route des Esclaves, qui mène à la Porte du Non-Retour, est un parcours poignant qui retrace les derniers pas des captifs avant leur départ pour les Amériques.',
            'excerpt' => 'Un voyage dans le temps pour comprendre l\'histoire poignante de Ouidah et découvrir le syncrétisme religieux...',
            'author' => 'Sophie Martin'
        ]);

        // Rooms
        Room::create([
            'name' => 'Bungalow Lagunaire',
            'type' => 'Standard',
            'price' => 45000,
            'image' => 'img/benin_room.png',
            'description' => 'Profitez d\'un espace spacieux sur pilotis, bercé par le clapotis de l\'eau. Idéal pour les couples en quête de romantisme et de sérénité.',
            'amenities' => 'Ventilation Naturelle, Terrasse Privée, Vue Panoramique, Wi-Fi Gratuit, Service en Chambre, Petit-déjeuner Inclus',
            'is_available' => true
        ]);

        Room::create([
            'name' => 'Suite Savane',
            'type' => 'Luxury',
            'price' => 60000,
            'image' => 'img/benin_safari.png',
            'description' => 'Une immersion totale dans la nature avec tout le confort d\'un grand hôtel. Décoration raffinée inspirée de l\'artisanat local béninois.',
            'amenities' => 'Climatisation, Grand Lit King Size, Minibar Local, Restaurant & Bar, Excursions Guidées, Soirée Culturelle',
            'is_available' => true
        ]);

        Room::create([
            'name' => 'Case Traditionnelle Somba',
            'type' => 'Authentique',
            'price' => 35000,
            'image' => 'img/benin_hero.png',
            'description' => 'Inspirée des célèbres Tata Somba du nord Bénin, cette case offre une expérience culturelle unique dans un cadre écologique.',
            'amenities' => 'Décoration Artisanale, Fraîcheur Naturelle, Jardin Privé, Expérience Culinaire, Guide Local',
            'is_available' => true
        ]);

        Room::create([
            'name' => 'Éco-Pod Mangrove',
            'type' => 'Aventure',
            'price' => 50000,
            'image' => 'img/benin_canoe.png',
            'description' => 'Petit cocon moderne niché au cœur de la mangrove. Idéal pour les observateurs d\'oiseaux et les amoureux du calme absolu.',
            'amenities' => 'Vue Mangrove, Énergie Solaire, Douche à Ciel Ouvert, Hamac, Petit-déjeuner Bio',
            'is_available' => true
        ]);

        Room::create([
            'name' => 'Villa Royale de Ouidah',
            'type' => 'Premium',
            'price' => 85000,
            'image' => 'img/benin_room.png',
            'description' => 'Le summum du luxe éco-responsable. Une villa entière avec piscine privée et service de majordome dédié.',
            'amenities' => 'Piscine Privée, Service Majordome, Cave à Vin, Cuisine Équipée, Accès VIP Plage',
            'is_available' => true
        ]);
    }
}
