<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Game;
use Carbon\Carbon;
use App\Handlers\ImageUploadHandler;

class PhotosController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $photos = Image::paginate(20);

        return view('photos.index', compact('photos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $games = Game::all();
        return view('photos.create', compact("games"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,ImageUploadHandler $uploader)
    {
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $result=$uploader->save($request->file('photo'), 'photo', $request->post('game_id'));
            Image::create([
                'game_id' => $request->post('game_id'),
                'path' => $result['path'],
                'description' => $request->post('description'),
                'shot_time' => Carbon::parse($request->post('shot_time'))
            ]);
        }
        session()->flash('success', '图片创建成功');

        return redirect()->route('photos.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $photo = Image::where('id',$id)->get()->first();
        $games = Game::all();
        return view('photos.edit', compact("photo","games"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path = $request->file('photo')->store('photo', 'public');
            Image::create([
                'game_id' => $request->post('game_id'),
                'path' => 'storage/' . $path,
                'description' => $request->post('description'),
                'shot_time' => Carbon::parse($request->post('shot_time'))
            ]);
        }
        session()->flash('success', '图片创建成功');

        return redirect()->route('photos.index');
    }

    /**
     * @param Image $photo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Image $photo)
    {
        $photo->delete();
        session()->flash('danger', '图片已删除');

        return redirect()->route('photos.index');
    }
}
