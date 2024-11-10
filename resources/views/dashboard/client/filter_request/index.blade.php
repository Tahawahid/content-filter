<x-c-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Submit YouTube Link</h3>
                <a href="{{ route('content-filters.show', Auth::id()) }}" class="btn btn-primary">
                    <i class="fas fa-list me-2"></i>See All Requests
                </a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="bg-dark rounded p-4">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('content-filters.store') }}" method="POST">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="url" name="youtube_link"
                                    class="form-control @error('youtube_link') is-invalid @enderror"
                                    id="floatingYoutubeLink" placeholder="Paste YouTube link here"
                                    value="{{ old('youtube_link') }}" />
                                <label for="floatingYoutubeLink">YouTube Link</label>
                                @error('youtube_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <select name="token_id" class="form-control @error('token_id') is-invalid @enderror"
                                    id="floatingTokens">
                                    <option value="">Select Package</option>
                                    @foreach ($userTokens as $token)
                                        <option value="{{ $token->id }}">
                                            {{ $token->order->package->name }} - {{ $token->remaining_tokens }} tokens
                                            remaining
                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingTokens">Select Package</label>
                                @error('token_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                                Submit Link
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-c-layout>
