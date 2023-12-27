<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('urls.index', [
            'urls' => Url::get()->reverse(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255',
        ]);

        $data = $request->all();

        $arr = ['a', 'b', 'c', 'd'];

        $j = 0;

        foreach ($arr as $m) {

            $arr_short[$j++] = $m;
        }

        for ($i = 0; $i < count($arr); $i++) {

            foreach ($arr as $m) {

                $arr_short[$j++] = $arr[$i] . $m;
            }
        }

        $arr_url = explode('/', $request->original_url);



        $k = -1;

        foreach ($arr_short as $time) {
            $k++;
            $data['num'] = $k;
            $data['title'] = Str::ucfirst($request->title);
            $data['original_url'] = $request->original_url;
            $data['shortener_url'] = $arr_url[0] . "/" . $time;

            Url::create($data);
        }

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        Url::truncate();
        return redirect(route('index'));
    }



    public function updatejs(Request $request, Url $url)
    {


        $id_url = $request->id_url;
        $val_short = $request->val_short;


        Url::where('id', $id_url)
            ->update(['shortener_url' => $val_short]);

        return response()->json(['success' => 'Данная ссылка успешно обновлена']);
    }
}
