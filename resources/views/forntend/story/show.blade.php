@extends('layouts.master', ['sidebar' => 'all_stories', 'head' => 'story' ])


@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <img class="" src="{{ $story->image }}" alt="Card image cap" style="max-height: 250px;">
                </div>
                <small class="text-muted" style="margin-left: 10px; font-size: 12px;">{{ $story->image_caption }}</small>
                <div class="card-body">


                    <p class="card-title mb-3">{{ $story->title }} <b>by {{ $story->user->name }}</b></p>
                    <p class="card-text">
                        {{ $story->body }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection