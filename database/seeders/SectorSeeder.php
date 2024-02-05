<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            'መሬት ቢሮ',
            'ንግድ ቢሮ',
            'ገቢዊች ቢሮ',
            'ስራ ፈጠራ ኢንተርፕራይዝ',
            'ቤቶች ኮርፖሬሽን',
            'ፅዳት ቢሮ',
            'ኣካባቢ ጥበቃ',
            'ተፋሰስና ኣረጓዴ ልማት',
            'ትራንስፖርት',
            'መሰረተ ልማትና ግንባታ',
            'ውሃና ፍሳሽ',
            'ቂሬታና ኣቤቱታ',
            'ኣርሶኣደርና ከተማ ግብርና',
            'የምግብ መድሃኒትና ጤና አንክብካቤ',
        ];

        $subcitySectors = [
            'መሬት',
            'ንግድ',
            'ገቢዎች',
            'ስራ አድል ፈጠራ',
            'ቤቶች',
            'ፅዳት',
            'ቅሬታና ኣቤቱታ',
            'ወሳግን ኩነት ',
        ];

        $weredaSectors = [
            'ወሲግን ኩነት',
            'ስራ ፈጠራ',
            'ንግድ',
            'ቤቶች ትሰዳት',
        ];

        foreach ($sectors as $sector) {
            $this->createSector($sector, 'city');
        }

        foreach ($subcitySectors as $sector) {
            $this->createSector($sector, 'subcity');
        }

        foreach ($weredaSectors as $sector) {
            $this->createSector($sector, 'wereda');
        }

        $sectors = Sector::all();

        $this->linkSectors($sectors, [
            ['id' => 15, 'parent_id' => 1, 'city_id' => 1],
            ['id' => 16, 'parent_id' => 2, 'city_id' => 2],
            ['id' => 17, 'parent_id' => 3, 'city_id' => 3],
            ['id' => 18, 'parent_id' => 4, 'city_id' => 4],
            ['id' => 19, 'parent_id' => 5, 'city_id' => 5],
            ['id' => 20, 'parent_id' => 6, 'city_id' => 6],
            ['id' => 21, 'parent_id' => 12, 'city_id' => 12],
            ['id' => 22, 'parent_id' => 12, 'city_id' => 12],
            ['id' => 23, 'parent_id' => 22, 'city_id' => 12, 'subcity_id' => 22],
            ['id' => 25, 'parent_id' => 16, 'city_id' => 2, 'subcity_id' => 16],
            ['id' => 26, 'parent_id' => 19, 'city_id' => 5, 'subcity_id' => 19],
            ['id' => 24, 'parent_id' => 18, 'city_id' => 4, 'subcity_id' => 18],
        ]);
    }

    private function createSector($name, $type)
    {
        Sector::create([
            'name' => $name,
            'type' => strtolower($type),
        ]);
    }

    private function linkSectors($sectors, $links)
    {
        foreach ($links as $link) {
            $sector = $sectors->where('id', $link['id'])->first();
            if ($sector) {
                $sector->parent_id = $link['parent_id'];
                $sector->save();
                Link::create([
                    'sector_city_id' => $link['city_id'] ?? null,
                    'sector_subcity_id' => $link['subcity_id'] ?? null,
                    'sector_wereda_id' => $link['wereda_id'] ?? null,
                ]);
            }
        }
    }

}
