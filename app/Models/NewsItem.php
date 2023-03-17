<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use App\Models\Show;


class NewsItem extends Show implements Feedable
{
    use HasFactory;

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link($this->link)
            ->authorName($this->author)
            ->authorEmail($this->authorEmail);
    }

    // app/NewsItem.php

        public static function getFeedItems()
        {
        return NewsItem::all();
        }
}
