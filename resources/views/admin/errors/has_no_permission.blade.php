@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-4">
    <div class="!card !card-body text-center">
        <img style="width: 50%; margin: auto;" class="img-thumbnail" src="{{ asset('images/no_permissions/' . $img . '.jpg') }}" alt="">
    </div>
</div><!-- /.container-fluid -->
@endsection