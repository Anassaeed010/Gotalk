         
   <?php      
         
use App\Models\Tweet;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('edit_tweets', function () {
    foreach (Tweet::all() as $tweet) {
        $tweet->update([
            'base_tweet_id' => $tweet->id,
        ]);
    }
})->purpose('Update all tweets with their base_tweet_id');
