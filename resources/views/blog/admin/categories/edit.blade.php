@extends('layouts.app')

@section('content')
    @php

    @endphp
    <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
        @method('PATCH')
        @csrf
        <div class="container">
            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                                {{ $erors->first() }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                    {{ session()->get('success') }}
                                </button>
                            </div>
                        </div>
                    </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include ('blog.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include ('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
