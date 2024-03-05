<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbunsController extends Controller
{
    private function getAlbuns()
    {
        $albuns = DB::table('album')
            ->join('bands', 'bands_id', '=', 'bands.id')
            ->select('album.*', 'bands.name as band_name')
            ->distinct()
            ->get();

        return $albuns;
    }
    public function allAlbuns()
    {
        $albuns = $this->getAlbuns();
        return view('albuns.all_albuns', compact('albuns'));
    }

    public function addAlbum()
    {
        $bands = DB::table('bands')
            ->select('bands.id as bands_id', 'bands.name as band_name')
            ->distinct()
            ->get();

        return view('albuns.add_album', compact('bands'));
    }

    public function createAlbum(Request $request)
    {
        $bands = Band::all();

        $request->validate([
            'albumName' => 'required|string|max:50',
            'lancamento' => 'required|integer|digits:4',
            'bands_id' => 'required|exists:bands,id',
        ]);

        $cover = null;
        if ($request->has('capa')) {
            $cover = Storage::putFile('uploadedImages', $request->capa);
        }

        Album::insert([
            'albumName' => $request->albumName,
            'capa' => $request->capa,
            'lancamento' => $request->lancamento,
            'bands_id' => $request->bands_id,
        ]);

        foreach ($bands as $myBand) {
            $myBand->number_albuns = Album::where('bands_id', $myBand->id)->count();
            $myBand->save();
        }

        return redirect()->route('album.all')->with('message', 'New album successfully created!');
    }

    public function viewAlbum($id)
    {
        $bands = DB::table('bands')->get();
        $album = DB::table('album')
            ->where('album.id', $id)
            ->join('bands', 'bands_id', '=', 'bands.id')
            ->select('album.*', 'bands.name as band_name', )
            ->distinct()
            ->first();
        return view('albuns.view_albuns', compact('album', 'bands'));
    }

    public function updateAlbum(Request $request)
    {
        $request->validate([
            'albumName' => 'required|string|max:50',
            'lancamento' => 'required|integer|digits:4',
            'bands_id' => 'required|exists:bands,id',
        ]);

        $album = Album::findOrFail($request->id);

        // $cover = null;
        if ($request->hasFile('capa')) {
            $cover = Storage::putFile('uploadedImages', $request->file('capa'));
        } else {
            $cover = $album->capa;
        }

        Album::where('id', $request->id)
            ->update([
                'albumName' => $request->albumName,
                'capa' => $capa,
                'lancamento' => $request->lancamento,
                'bands_id' => $request->bands_id,
            ]);

        return redirect()->route('album.all')->with('message', 'Update completed successfully!');
    }

    public function deleteAlbum($id)
    {
        DB::table('album')
            ->where('id', ($id))
            ->delete();
        return back()->with('message', 'Album deleted successfully!');
    }

    public function showAlbum($id)
    {
        $album = Album::find($id);
        $bands = DB::table('bands')
            ->select('id', 'name')
            ->distinct()
            ->get();

        return view('albuns.show_album', compact('album', 'bands'));
    }
}
