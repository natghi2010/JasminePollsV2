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
              //subcity sectors
            //   'አስተዳደር',

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
            //wereda
            'ወሲግን ኩነት',
            'ስራ ፈጠራ',
            'ንግድ',
            'ቤቶች ትሰዳት'
        ];



        foreach($sectors as $sector){
            $sectorModel = new Sector;
            $sectorModel->name = $sector;
            $sectorModel->type = 'city';
            $sectorModel->save();
        }
        foreach($subcitySectors as $sector){
            $sectorModel = new Sector;
            $sectorModel->name = $sector;
            $sectorModel->type = 'subcity';
            $sectorModel->save();
        }
        foreach($weredaSectors as $sector){
            $sectorModel = new Sector;
            $sectorModel->name = $sector;
            $sectorModel->type = 'wereda';
            $sectorModel->save();
        }


        $sectors = Sector::all();

        foreach($sectors as $sector){
            if($sector->id == 15){
                $sector->parent_id = 1;
                $sector->save();
                Link::create(['sector_city_id'=>1,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 16){
                $sector->parent_id = 2;
                $sector->save();
                Link::create(['sector_city_id'=>2,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 17){
                $sector->parent_id = 3;
                $sector->save();
                Link::create(['sector_city_id'=>3,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 18){
                $sector->parent_id = 4;
                $sector->save();
                Link::create(['sector_city_id'=>4,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 19){
                $sector->parent_id = 5;
                $sector->save();
                Link::create(['sector_city_id'=>5,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 20){
                $sector->parent_id = 6;
                $sector->save();
                Link::create(['sector_city_id'=>6,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 21){
                $sector->parent_id = 12;
                $sector->save();
                Link::create(['sector_city_id'=>12,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 22){
                $sector->parent_id = 12;
                $sector->save();
                Link::create(['sector_city_id'=>12,'sector_subcity_id'=>$sector->id]);
            }
            if($sector->id == 23){
                $sector->parent_id = 22;
                $sector->save();
                Link::create(['sector_city_id'=>12,'sector_subcity_id'=>22,'sector_wereda_id'=>$sector->id]);
            }
            if($sector->id == 25){
                $sector->parent_id = 16;
                $sector->save();
                Link::create(['sector_city_id'=>2,'sector_subcity_id'=>16,'sector_wereda_id'=>$sector->id]);
            }
            if($sector->id == 26){
                $sector->parent_id = 19;
                $sector->save();
                Link::create(['sector_city_id'=>5,'sector_subcity_id'=>19,'sector_wereda_id'=>$sector->id]);
            }
            if($sector->id == 24){
                $sector->parent_id = 18;
                $sector->save();
                Link::create(['sector_city_id'=>4,'sector_subcity_id'=>18,'sector_wereda_id'=>$sector->id]);
            }


        }

        //addis ababa mayors office
        $sector = new Sector;
        $sector->name = 'ከንቲባ ፅህፈት ቤት - አዲስ አበባ';
        $sector->type = 'City';
        $sector->save();



        //
    }
}
