@extends('layouts.master', ['head' => 'story', 'sidebar' => 'create_story'])


@section('content')
    <form action="{{ url('stories') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="card">
            <div class="card-header">
                <strong>Create</strong> Story
            </div>
            <div class="card-body card-block">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" placeholder="Enter Story Title" class="form-control" value="{{ old('title') }}">
                            <p class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</p>
                        </div>

                        <div class="form-group">
                            <label>Story</label>
                            <textarea placeholder="Write your Story here..." rows="3" class="form-control t-text-area" name="body">{{ old('body') }}</textarea>
                            <p class="text-danger">{{ $errors->has('body') ? $errors->first('body') : '' }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Image Caption</label>
                            <input type="text" name="image_caption" placeholder="Enter Image Caption" class="form-control" value="{{ old('image_caption') }}">
                            <p class="text-danger">{{ $errors->has('image_caption') ? $errors->first('image_caption') : '' }}</p>
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="file" class="form-control-file" name="image" style="margin-top: 10px;">
                            <p class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</p>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </div>
    </form>
@endsection

