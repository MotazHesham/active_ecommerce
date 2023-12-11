@extends('backend.layouts.app')

@section('content')
    <h4 class="text-center text-muted">{{translate('Activate OTP')}}</h4>
    <div class="row">
        @foreach ($otp_configurations as $otp_configuration)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6">
                            {{translate(Str::replace('_', ' ',Str::title($otp_configuration->type)).' OTP')}}
                        </h3>
                    </div>
                    <div class="card-body text-center">
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="checkbox" onchange='updateSettings(this, "{{ $otp_configuration->type }}")' @if($otp_configuration->value == 1) checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('{{ route('otp_configurations.update.activation') }}', {_token:'{{ csrf_token() }}', type:type, value:value}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Settings updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
