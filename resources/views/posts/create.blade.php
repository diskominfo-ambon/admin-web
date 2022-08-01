@extends('layouts.vendor')


@section('head')
<link rel="stylesheet" href="{{ asset('/vendor/css/editors/tinymce.css?ver=2.2.0') }}">
@endsection


@section('title', 'Tambahkan kegiatan')

@section('content')
<div class="components-preview">
    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title fw-bold">Kegiatan</h4>
            <div class="nk-block-des">
                <p class="lead">Tambahkan kegiatan baru Anda</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <form method="POST" enctype="multipart/form-data" action="{{ route('post.store') }}">
            @csrf
            @method('POST')

            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h6 class="title nk-block-title">Judul kegiatan</h6>
                    <div class="nk-block-des">
                        <p>Masukan judul yang baik dan mudah dimengerti.</p>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <input name="title" value="{{ old('title') }}" type="text" class="form-control form-control-lg">
                @error('title')
                <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h6 class="title nk-block-title">Deskripsi konten</h6>
                    <div class="nk-block-des">
                        <p>Masukan dekripsi konten kegiatan Anda</p>
                    </div>
                </div>
            </div>
            <textarea name="desc" class="form-control form-control-lg" id="editor">{{ old('desc') }}</textarea>

            @error('desc')
            <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
            @enderror

            <div class="nk-block-head mt-5">
                <div class="nk-block-head-content">
                    <h6 class="title nk-block-title">Gambar depan</h6>
                    <div class="nk-block-des">
                        <p>Upload gambar cover untuk kegiatan Anda.</p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="form-control-wrap">
                    <div class="input-group input-group-lg">
                        <input type="file" name="picture" class="form-control" id="inputGroupFile02" accept="image/*">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
                @error('picture_url')
                <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary bg-primary mt-2">Tambahkan</button>
            </div>
        </form>

    </div><!-- .nk-block -->
</div><!-- .components-preview -->
@endsection



@section('script')
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-custom-simpleuploadadapter@28.0.0/build/ckeditor.min.js"></script>

<script>
  $(document).ready(() => {
    const STORAGE_ENDPOINT = window.location.origin + "/upload";
    const TOKEN = $('meta[name="csrf-token"]').attr('content');

    ClassicEditor
      .create( document.querySelector( '#editor' ), {
        simpleUpload: {
          uploadUrl: STORAGE_ENDPOINT,
          withCredentials: true,
          headers: {
            'X-CSRF-TOKEN': TOKEN,
          },
        }
      })
      .catch( error => {
          console.error( error );
      } );
  });
</script>
@endsection
