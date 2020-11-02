<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Metrics\TweetCount;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Maatwebsite\LaravelNovaExcel\Actions\ExportToExcel;

class Tweet extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Tweet';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'body',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Body','body')->hideWhenCreating()->hideWhenUpdating(),

            BelongsTo::make('Username','user',User::class)->hideWhenCreating()->hideWhenUpdating(),

            Trix::make('Tweet','body')->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            (new TweetCount)->width('full'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new DownloadExcel,
            new ExportToExcel,
        ];
    }
}
