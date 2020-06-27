@extends('layouts.master', ['head' => 'profile', 'sidebar' => 'show'])


@section('content')
    <div class="col-md-12">
        <section class="card">
            <div class="twt-feed blue-bg">
                <div class="corner-ribon black-ribon">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="fa fa-twitter wtt-mark"></div>

                <div class="media">
                    <a href="#">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $user->image }}">
                    </a>
                    <div class="media-body">
                        <h2 class="text-white display-6">{{ $user->name }}</h2>
                        <p class="text-light"></p>
                    </div>
                </div>



            </div>
            <div class="weather-category twt-category">
                <ul>
                    <li class="active">
                        <h5>{{ $user->stories()->count() }}</h5>
                        Stories
                    </li>
                    <li>
                        <h5>{{ $user->comments()->count() + $user->commentReplies()->count() }}</h5>
                        Comments
                    </li>
                    <li>
                        <h5></h5>
                        Tags
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ url('stories') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-sm-12">
                    <textarea placeholder="Write your Story here..." rows="3" class="form-control t-text-area" name="body">{{ old('body') }}</textarea>
                    <p class="text-danger">{{ $errors->has('body') ? $errors->first('body') : '' }}</p>
                </div>
                <footer class="twt-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Story Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <p class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</p>
                        </div>

                        <div class="col-md-3">
                            <label>Image Caption</label>
                            <input type="text" class="form-control" name="image_caption" value="{{ old('image_caption') }}">
                            <p class="text-danger">{{ $errors->has('image_caption') ? $errors->first('image_caption') : '' }}</p>
                        </div>

                        <div class="col-md-6">
                            <label></label>
                            <input type="file" class="form-control-file" name="image" style="margin-top: 10px;">
                            <p class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark pull-right">Post</button>
                </footer>

            </form>
        </section>
    </div>

@endsection

