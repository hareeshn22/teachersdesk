<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Topic;


class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('examples')->insert([
            [
                'topic_id' => Topic::where('name', '=', 'నైతిక బోధ')->first()->id, // వేమన పద్య రత్నావళి – నైతిక బోధ
                'extract' => 'వేమన పద్యాలలో నైతిక బోధను వివరించే ఉదాహరణ పద్యం.',
                'content' => <<<EOT
**పద్యం**:  
"పుట్టిన పుడకనేల పూర్వ జన్మముల పుట్టుక  
నట్టిన నడకనేల నమ్మిన మతముల నడక  
విశ్వదాభిరామ వినుర వేమా"

**వివరణ**:  
ఈ పద్యంలో వేమన మత భేదాలను, జన్మ భేదాలను ప్రశ్నిస్తూ, సమానత్వాన్ని ప్రతిపాదిస్తున్నాడు.  
విద్యార్థులకు ఇది:
- నైతిక చింతనకు ప్రేరణ
- మత సహనానికి మార్గదర్శనం
- సమాజంలో సమానత్వ భావనను బోధించేందుకు ఉపయోగపడుతుంది
EOT,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => Topic::where('name', '=', 'ప్రముఖ తెలుగు కవులు')->first()->id, // తెలుగమ్మ తల్లి – ప్రముఖ తెలుగు కవులు
                'extract' => 'తెలుగమ్మ తల్లి భావనను ప్రతిబింబించే కవితా ఉదాహరణ.',
                'content' => <<<EOT
**కవితా పంక్తులు** (శ్రీశ్రీ):  
"తెలుగు తల్లి కీర్తి గానం  
తెలుగు తల్లి సేవే ధ్యానం"

**వివరణ**:  
ఈ పంక్తులు తెలుగు భాషపై గౌరవాన్ని, సేవా భావాన్ని వ్యక్తపరుస్తున్నాయి.  
విద్యార్థులకు ఇది:
- భాషా గౌరవం పెంపొందించేందుకు
- కవిత్వంలోని భావప్రకటనను అర్థం చేసేందుకు
- ప్రముఖ కవుల రచనా శైలిని విశ్లేషించేందుకు ఉపయోగపడుతుంది
EOT,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
