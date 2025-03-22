<div class="form-group">
    <label for="environment">Environment</label>
    <select name="environment" id="environment" class="form-control">
        <option value="production" {{ old('environment') == 'production' ? 'selected' : '' }}>Production</option>
        <option value="development" {{ old('environment') == 'development' ? 'selected' : '' }}>Development</option>
    </select>
    <p class="small text-muted no-margin">Select the environment for this server.</p>
</div>
