<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use App\Models\Show;
use Carbon\Carbon;


class NewsItem extends Show implements Feedable
{
    use HasFactory;

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->description)
            ->updated(Carbon::now())
            ->link('show/'.$this->id)
            ->authorName('Serge')
            ->authorEmail('serge.boniver@gmail.com');
    }

    // app/NewsItem.php

        public static function getFeedItems()
        {
        return NewsItem::all();
        }
}
