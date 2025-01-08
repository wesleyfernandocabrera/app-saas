<div class="card">
    <div class="card-header">
        <h3>Interesses</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('users.updateInterests', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            @foreach(['PHP', 'JavaScript', 'Python', 'Ruby'] as $interest)
            <div class="form-check">
                <input 
                    class="form-check-input @error('interests') is-invalid @enderror" 
                    type="checkbox"
                    name="interests[]" 
                    value="{{ $interest }}" 
                    id="flexCheck{{ $interest }}" 
                    @if(in_array($interest, $user->profile->interests ?? [])) checked @endif>
                <label class="form-check-label" for="flexCheck{{ $interest }}">
                    {{ $interest }}
                </label>
                    @if($loop->last)
                    @error('interests')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @endif

                
            </div>
            @endforeach
            <br>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
</div>