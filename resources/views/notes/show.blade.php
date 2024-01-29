@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Note') }}</div>

                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ 'Created by:' . $note->user->name }}</label>
                            </div>

                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                        value="{{ $note->title }}" required readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" name="description" required readonly>{{ $note->description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Share With Others') }}</label>
                                <ul>
                                    @foreach ($note->share as $u)
                                        <li>{{ $u->name }}</li>
                                    @endforeach
                                </ul>
                                <div class="col-md-6">

                                </div>
                                <a href="{{ route('note.edit', $note->id) }}">Edit</a>
                                <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
