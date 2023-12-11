<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('SPARROW Credential') }}</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                <input type="hidden" name="otp_method" value="sparrow">
                @csrf
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="SPARROW_TOKEN">
                    <div class="col-lg-3">
                        <label class="col-from-label">{{ translate('SPARROW_TOKEN') }}</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="SPARROW_TOKEN"
                            value="{{ env('SPARROW_TOKEN') }}" placeholder="SPARROW_TOKEN" required>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="MESSGAE_FROM">
                    <div class="col-lg-3">
                        <label class="col-from-label">{{ translate('MESSGAE_FROM') }}</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="MESSGAE_FROM"
                            value="{{ env('MESSGAE_FROM') }}" placeholder="MESSGAE_FROM" required>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>