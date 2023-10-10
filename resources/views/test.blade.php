<?php 


//$api_key = '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';

use OpenAI\Laravel\Facades\OpenAI;

$result = OpenAI::completions()->create([
    'model' => 'text-davinci-003',
    'prompt' => 'PHP is',
]);

echo $result['choices'][0]['text']; // an open-source, widely-used, server-side scripting language.