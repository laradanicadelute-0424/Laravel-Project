@extends('layouts.app')

{{-- this page will only be enabled to logged in users --}}

@section('content')
   <div class="container">
       <div class="grid">
           <form action="{{ route('posts.store') }}" method="POST">
               @csrf
               <div class="mb-3">
                   <label for="formGroupExampleInput" class="form-label">Post Title</label>
                   <input type="text"
                          class="form-control @error('content') is-invalid @enderror"
                          id="formGroupExampleInput"
                          placeholder="Enter Title"
                          name="title">
                           @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
               </div>

               <div class="mb-3">
                   <label for="formGroupExampleInput" class="form-label">Post Content</label>
                   <textarea type="text"
                          class="form-control @error('content') is-invalid @enderror"
                          id="formGroupExampleInput"
                          placeholder="Enter Content"
                          name="content">
                    </textarea>

                        @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
               </div>

               <div class="mb-3">
                   <button type="submit" class="btn btn-primary">Post</button>
               </div>
           </form>
       </div>
   </div>
@endsection