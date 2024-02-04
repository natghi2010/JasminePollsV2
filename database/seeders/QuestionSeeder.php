<?php
namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $question = New Question();
        $question->question =   'ምን ያህል ደስተና ኖት?';
        $question->answer_set =   array(
            "type"=>"rating",
            "name"=> "happiness",
            "title"=>"ምን ያህል ደስተና ኖት?",
            "minRateDescription"=>'በጣም ደስተኛ',
            "maxRateDescription"=>'በጣም ቅር ተሰኝቷል',
            "isRequired"=>true
        );

        $question->type = 'rating';

        $question->save();

 //
        $question = New Question;
        $question->question =   'ለፈለጉት ኣገግሎት ጉቦ ተጠይቀዋል?';
        $question->answer_set =   array(
            "type"=>"boolean",
            "name"=> "Bribes",
            "title"=>"ለፈለጉት ኣገግሎት ጉቦ ተጠይቀዋል??",
            "isRequired"=>true
        );

        $question->type = 'boolean';

        $question->save();

    //
    $question = New Question;
    $question->question =   'የኣገልግሎት ሰኣቱን አንዴት ያዩታል?';
    $question->answer_set =   array(
        "type"=>"rating",
        "name"=> "service_time",
        "title"=>"የኣገልግሎት ሰኣቱን አንዴት ያዩታል?",
        "minRateDescription"=>'በጣም ፈጣን',
        "maxRateDescription"=>'በጣም ረጅም',
        "isRequired"=>true
    );

    $question->type = 'rating';

    $question->save();

    //
    $question = New Question;
    $question->question =   'መረጀ ኣሰጣቱን አንዴት ያዩታል?';
    $question->answer_set =   array(
        "type"=>"rating",
        "name"=> "information_quality",
        "title"=>"መረጀ ኣሰጣቱን አንዴት ያዩታል?",
        "minRateDescription"=>'በጣም መጥፎ',
        "maxRateDescription"=>'በጣም ጥሩ',
        "isRequired"=>true
    );

    $question->type = 'rating';

    $question->save();


    //
    $question = New Question;
    $question->question =   'የሚፈልጉትን መረጃ በኣግባቡ ማግኘትን አንዴት ኣገጙት?';
    $question->answer_set =   array(
        "type"=>"rating",
        "name"=> "respect",
        "title"=>"የሚፈልጉትን መረጃ በኣግባቡ ማግኘትን አንዴት ኣገጙት?",
        "minRateDescription"=>'በጣም መጥፎ',
        "maxRateDescription"=>'በጣም ጥሩ',
        "isRequired"=>true
    );

    $question->type = 'rating';

    $question->save();



    }
}
