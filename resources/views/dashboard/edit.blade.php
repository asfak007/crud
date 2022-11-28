
@extends('dashboard.master')
@section('body')
    <section class="py-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Edit Blog
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">{{ Session::get('message') }}</h4>
                            <form action="{{ route('update.blog',['id'=>$blog->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-md-3" >Blog Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name='title' value="{{ $blog->title }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Author Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name='author' value="{{ $blog->author }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name='description' value="{{ $blog->description }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name='image'/>
                                        <img src="{{ asset($blog->image) }}" alt="" height="100" width="130">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" name='crate new blog'/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
