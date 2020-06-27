<?php

namespace App\Http\Controllers;

use App\Story;
use App\Traits\EssentialTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    use EssentialTrait;


    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stories = $request->story ? auth()->user()->stories : Story::orderBy('id', 'desc')->get();
        if ($request->story)
            return view('forntend.story.own', compact('stories'));
        return view('forntend.story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forntend.story.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {
        $input = $request->all();
        if ($errors = $this->validateInput($request))
            return $errors;

        if ( !$request->title)
            $input['title'] = substr($request->body, 0, 15);
        $input['image'] = $this->storeImage($request, 'image');
        $input['slug'] = Str::slug($input['title']);
        $input['user_id'] = auth()->user()->id;
        $tags = $this->getHashtags( $request->body);

        $story = Story::create($input);

        foreach ($tags as $tag) {
            $story->tags()->create(['tag' => $tag]);
        }

        return redirect('stories')->with('success', 'Story posted successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        $story->preventGetBodyAttr = true;
        return view('forntend.story.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        return $story;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validateInput( $request)
    {
        $errors = false;

        $validator = Validator::make($request->all(), [
            'body' => 'required|string|min:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_caption' => 'required_with:image|nullable|string|max:255',
        ]);

        if ($validator->fails())
                $errors = redirect()->back()->withErrors($validator)->withInput();

        return $errors;
    }
}
