<div class="container"><hr/></div>

<div class="container reservation">
    <h2 style="font-weight:400">{{c('web-query-title')}}</h2>
    {{ Form::open(array('url' => 'send-query', 'id'=>'query-form')) }}
    <div class="row">
        <div class="col-sm-6">
            <label>{{c('web-query-message')}}</label>
            <textarea name="message" style="width:90%; height:120px;"></textarea>
        </div>
        <div class="col-sm-6">
        
            <label>{{__('Email')}}</label>
            <input type="email" name="email" style="width:90%;">
            <label>{{__('Phone number')}}</label>
            <input type="text" name="phone" style="width:90%;">
            <p>
                <button class="btn brn-primary" id="fast-query-submit">{{__('Send Query')}}</button>
            </p>
            
        </div>
    </div>
    {{ Form::close() }}
    <script>
        $("#fast-query-submit").click(function() {
            var empty = $(this).parent().parent().find("input").filter(function() {
                return this.value === "";
            });
            if(empty.length) {
                alert('{{ __("Pease fill in all fields") }}');
                return false;
            }
        });
    </script>
</div>