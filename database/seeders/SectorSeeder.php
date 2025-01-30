<?php
namespace Database\Seeders;

use App\Models\Link;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks for performance
        Sector::query()->truncate(); // Clear existing records
        Link::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks

        // Define sector categories
        $sectors = [
            'city' => [
                'መሬት ቢሮ', 'ንግድ ቢሮ', 'ገቢዊች ቢሮ', 'ስራ ፈጠራ ኢንተርፕራይዝ', 'ቤቶች ኮርፖሬሽን',
                'ፅዳት ቢሮ', 'ኣካባቢ ጥበቃ', 'ተፋሰስና ኣረጓዴ ልማት', 'ትራንስፖርት', 'መሰረተ ልማትና ግንባታ',
                'ውሃና ፍሳሽ', 'ቂሬታና ኣቤቱታ', 'ኣርሶኣደርና ከተማ ግብርና', 'የምግብ መድሃኒትና ጤና አንክብካቤ'
            ],
            'subcity' => [
                'መሬት', 'ንግድ', 'ገቢዎች', 'ስራ አድል ፈጠራ', 'ቤቶች', 'ፅዳት',
                'ቅሬታና ኣቤቱታ', 'ወሳግን ኩነት'
            ],
            'wereda' => [
                'ወሲግን ኩነት', 'ስራ ፈጠራ', 'ንግድ', 'ቤቶች ትሰዳት'
            ],
        ];

        // Bulk insert sectors
        $insertData = [];
        foreach ($sectors as $type => $sectorList) {
            foreach ($sectorList as $sector) {
                $insertData[] = ['name' => $sector, 'type' => strtolower($type)];
            }
        }
        Sector::insert($insertData); // Insert all sectors in one query

        // Retrieve all inserted sectors
        $sectors = Sector::all()->keyBy('id');

        // Define sector links
        $links = [
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
        ];

        // Bulk update parent_id for linked sectors
        $updateData = [];
        foreach ($links as $link) {
            if (isset($sectors[$link['id']])) {
                $updateData[$link['id']] = ['parent_id' => $link['parent_id']];
            }
        }
        foreach ($updateData as $id => $data) {
            Sector::where('id', $id)->update($data);
        }

        // Bulk insert sector links
        $linkInsertData = array_map(function ($link) {
            return [
                'sector_city_id' => $link['city_id'] ?? null,
                'sector_subcity_id' => $link['subcity_id'] ?? null,
                'sector_wereda_id' => $link['wereda_id'] ?? null,
            ];
        }, $links);

        Link::insert($linkInsertData); // Insert all links in one query
    }
}
