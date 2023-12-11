@extends('backend.layouts.app')

@section('content')
    <div class="row">

        @foreach ($otp_configurations as $otp_configuration)
            @include('backend.otp_systems.configurations.partials.'.$otp_configuration->type)
        @endforeach
        
    </div>
    
@endsection

@section('script')
    <script type="text/javascript">
        $("#ZENDER_MODE").change(function() {
            var value = $(this).val();
            let changeVal = '';
            if (value == "devices") {
                changeVal = 'device';
            } else {
                changeVal = 'gateway';
            }
            $("#ZENDER_MODE_TYPE").val(changeVal).change();

        });
    </script>
@endsection
