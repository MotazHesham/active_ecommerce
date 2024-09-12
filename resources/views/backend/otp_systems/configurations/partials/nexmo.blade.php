<div class="form-group row">
    <input type="hidden" name="types[]" value="NEXMO_KEY">
    <div class="col-lg-3">
        <label class="col-from-label">{{ translate('NEXMO KEY') }}</label>
    </div>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="NEXMO_KEY" value="{{ env('NEXMO_KEY') }}"
            placeholder="NEXMO KEY" required>
    </div>
</div>
<div class="form-group row">
    <input type="hidden" name="types[]" value="NEXMO_SECRET">
    <div class="col-lg-3">
        <label class="col-from-label">{{ translate('NEXMO SECRET') }}</label>
    </div>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="NEXMO_SECRET"
            value="{{ env('NEXMO_SECRET') }}" placeholder="NEXMO SECRET" required>
    </div>
</div>
<div class="form-group row">
    <input type="hidden" name="types[]" value="NEXMO_SENDER_ID">
    <div class="col-lg-3">
        <label class="col-from-label">{{translate('NEXMO SENDER ID')}}</label>
    </div>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="NEXMO_SENDER_ID" value="{{  env('NEXMO_SENDER_ID') }}" placeholder="NEXMO SENDER ID" required>
        <small>
            {{translate('Please check this URL for')}}
            <a href="https://developer.vonage.com/en/messaging/sms/guides/custom-sender-id?source=messaging">Sender Identity</a> 
            {{translate('before setting the sender ID')}}
        </small>
    </div>
</div>
<div class="form-group mb-0 text-right">
    <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
</div>