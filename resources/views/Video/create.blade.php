@extends('layouts.default')



@section('content')

            <div class="col-md-8 col-md-offset-2">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add a Video</h3>
                    </div>

                    <div class="panel-body">


                        <div class="table-container">
                            <form method="POST" action="{{ route('video.store') }}"  role="form">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="video_title" id="video_title" class="form-control input-sm" placeholder="Video Title">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="video_url" id="video_url" class="form-control input-sm" placeholder="Video Url">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="form-control input-sm" placeholder="Description"></textarea>
                                </div>



                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <input type="submit"  value="Save" class="btn btn-success btn-block">
                                        <a href="{{ route('video.index') }}" class="btn btn-info btn-block" >Back</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

@endsection

