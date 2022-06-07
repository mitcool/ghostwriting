<style>
    .eu-popup{
        position:absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        padding: 20px;
        z-index: 4242;
        flex-wrap: wrap;
        background-color: white;
        width:100%;
    }
    .eu-popup-button {
        background-color: white;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        border: 1px lightgray solid;
        border-radius: 10px;
    }

    .eu-popup-button:hover {
        background-color: lightgray;
        cursor: pointer;
    }
</style>
<script>
    function euCookieConsentSetCheckboxesByClassName(classname) {
        checkboxes = document.getElementsByClassName('eu-cookie-consent-cookie');
        for (i = 0; i < checkboxes.length; i++) {
            checkboxes[i].setAttribute('checked', 'checked');
            checkboxes[i].checked = true;
        }
    }
</script>
{{-- Popup Container --}}
<div style="{{ config('eu-cookie-consent.popup_style') }}" class="{{ config('eu-cookie-consent.popup_classes') }}">
    {{-- Popup Title gets displayed if its set in the config 
    @if(isset($config['title']))
        <div style="width: 80%">
            <p>
                <b>
                    {{ $config['title'] }}
                </b>
            </p>
        </div>
    @endif --}}
    {{-- Popup Description --}}
    @if(isset($config['description']))
        <div style="width: 80%;padding:20px;">
             {{ $config['description'] }}
              <hr>
        </div>
    @endif


    {{-- Popup Form which renders the Cateries and inside of them the single Cookies --}}
    <form action="{{ config('eu-cookie-consent.route') }}" method="POST" style="width: 80%;padding: 20px;">
        <div  class="row">

            @foreach($config['categories'] as $categoryName => $category)
                <div class="col-md-4">
                    @include('eu-cookie-consent::category')
                </div>
                
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                 @if(config('eu-cookie-consent.acceptAllButton'))
                    <button class="eu-popup-button">
                            {{ $config['acceptAllButton'] }}
                    </button>
                @endif
                <button id="saveButton" type="submit" class="eu-popup-button">
                        {{ $config['saveButton'] }}
                </button>
            </div>
        </div>
    </form>
</div>
