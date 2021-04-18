<?php

namespace App\Http\Controllers\Api;

use App\Models\Game;
use App\Models\News;
use App\Models\Team;
use App\Models\Image;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function news()
    {
        $news = News::select('id', 'title')->orderBy('updated_at', 'desc')->get();

        return [
            'data' => array_values($news->toArray())
        ];
    }

    public function teams()
    {
        $teams_ranked_golden = Team::select('name')->withCount(['golden', 'golden_s'])->get()->sortByDesc(function ($team, $key) {
            return $team->golden_count + $team->golden_s_count;
        })->slice(0, 3);

        $teams_ranked_medal = Team::select('name')->withCount(['golden', 'golden_s', 'silver', 'silver_s', 'bronze', 'bronze_s'])->get()->sortByDesc(function ($team, $key) {
            return $team->golden_count + $team->golden_s_count + $team->silver_count + $team->silver_s_count + $team->bronze_count + $team->bronze_s_count;
        });

        $teams_ranked_golden_array = [];
        $teams_ranked_medal_array = [];

        foreach ($teams_ranked_golden as $team) {
            $teams_ranked_golden_array[] = [
                'name' => $team->name,
                'golden_count' => $team->golden_count,
                'golden_s_count' => $team->golden_s_count,
            ];
        }

        foreach ($teams_ranked_medal as $team) {
            $teams_ranked_medal_array[] = [
                'name' => $team->name,
                'golden_count' => $team->golden_count,
                'silver_count' => $team->silver_count,
                'bronze_count' => $team->bronze_count,
                'golden_s_count' => $team->golden_s_count,
                'silver_s_count' => $team->silver_s_count,
                'bronze_s_count' => $team->bronze_s_count,
            ];
        }

        return [
            'teams_ranked_golden' => ['data' => $teams_ranked_golden_array],
            'teams_ranked_medal' => ['data' => $teams_ranked_medal_array],
        ];
    }

    public function games()
    {
        $games_23am_track = Game::whereBetween('begins_at', ['2021-04-23 00:00:00', '2021-04-23 11:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_23am_field = Game::whereBetween('begins_at', ['2021-04-23 00:00:00', '2021-04-23 11:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();
        $games_23pm_track = Game::whereBetween('begins_at', ['2021-04-23 12:00:00', '2021-04-23 23:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_23pm_field = Game::whereBetween('begins_at', ['2021-04-23 12:00:00', '2021-04-23 23:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();
        $games_24am_track = Game::whereBetween('begins_at', ['2021-04-24 00:00:00', '2021-04-24 11:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_24am_field = Game::whereBetween('begins_at', ['2021-04-24 00:00:00', '2021-04-24 11:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();
        $games_24pm_track = Game::whereBetween('begins_at', ['2021-04-24 12:00:00', '2021-04-24 23:59:59'])->where('class', 1)->orderBy('begins_at', 'asc')->get();
        $games_24pm_field = Game::whereBetween('begins_at', ['2021-04-24 12:00:00', '2021-04-24 23:59:59'])->where('class', 2)->orderBy('begins_at', 'asc')->get();

        $games_23am_track_array = [];
        $games_23am_field_array = [];
        $games_23pm_track_array = [];
        $games_23pm_field_array = [];
        $games_24am_track_array = [];
        $games_24am_field_array = [];
        $games_24pm_track_array = [];
        $games_24pm_field_array = [];

        foreach ($games_23am_track as $game) {
            $games_23am_track_array[] = $game->toArray();
        }

        foreach ($games_23am_field as $game) {
            $games_23am_field_array[] = $game->toArray();
        }

        foreach ($games_23pm_track as $game) {
            $games_23pm_track_array[] = $game->toArray();
        }

        foreach ($games_23pm_field as $game) {
            $games_23pm_field_array[] = $game->toArray();
        }

        foreach ($games_24am_track as $game) {
            $games_24am_track_array[] = $game->toArray();
        }

        foreach ($games_24am_field as $game) {
            $games_24am_field_array[] = $game->toArray();
        }

        foreach ($games_24pm_track as $game) {
            $games_24pm_track_array[] = $game->toArray();
        }

        foreach ($games_24pm_field as $game) {
            $games_24pm_field_array[] = $game->toArray();
        }

        return [
            'games_23am_track' => ['data' => $games_23am_track_array],
            'games_23am_field' => ['data' => $games_23am_field_array],
            'games_23pm_track' => ['data' => $games_23pm_track_array],
            'games_23pm_field' => ['data' => $games_23pm_field_array],
            'games_24am_track' => ['data' => $games_24am_track_array],
            'games_24am_field' => ['data' => $games_24am_field_array],
            'games_24pm_track' => ['data' => $games_24pm_track_array],
            'games_24pm_field' => ['data' => $games_24pm_field_array],
        ];
    }
    public  function photos()
    {
        # code...
        $images = Image::select('id', 'path', 'game_id', "description")->orderBy('updated_at', 'desc')->get();
        foreach ($images as $image ) {
            # code...
            $name=$image->game()->value('name');
            $image->game_name=$name;
        }
        return [
            'data' => array_values($images->toArray())
        ];
    }
}
