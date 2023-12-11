<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('MSEGAT Credential') }}</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                <input type="hidden" name="otp_method" value="msegat">
                @csrf
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="MSEGAT_API_KEY">
                    <div class="col-lg-3">
                        <label class="col-from-label">{{ translate('MSEGAT_API_KEY') }}</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="MSEGAT_API_KEY"
                            value="{{ env('MSEGAT_API_KEY') }}" placeholder="MSEGAT_API_KEY" required>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="MSEGAT_USERNAME">
                    <div class="col-lg-3">
                        <label class="col-from-label">{{ translate('MSEGAT_USERNAME') }}</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="MSEGAT_USERNAME"
                            value="{{ env('MSEGAT_USERNAME') }}" placeholder="MSEGAT_USERNAME" required>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="MSEGAT_USER_SENDER">
                    <div class="col-lg-3">
                        <label class="col-from-label">{{ translate('MSEGAT_USER_SENDER') }}</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="MSEGAT_USER_SENDER"
                            value="{{ env('MSEGAT_USER_SENDER') }}" placeholder="MSEGAT_USER_SENDER" required>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>