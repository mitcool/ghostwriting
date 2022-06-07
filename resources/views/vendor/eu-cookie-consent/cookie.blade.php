<div style="margin: 10px 0;">
    <input type="checkbox" id="{{ $cookieName }}" name="{{ $cookieName }}" class="eu-cookie-consent-category-{{$categoryName}} eu-cookie-consent-cookie" value="1" @if( !isset($cookie['forced']) && \the42coders\EuCookieConsent\EuCookieConsent::canIUse($cookieName)) checked="checked" @endif @if(isset($cookie['forced'])) checked="checked" disabled="disabled" @endif }}>
    {{-- For the foreced cookies we need this workaround with hidden input because we set the original input disabled --}}
    @if(isset($cookie['forced']))
        <input type="hidden" name="{{ $cookieName }}" value="1">
    @endif
    <label for="{{ $cookieName }}" class="fw-bold">
        {{ $cookie['title'] }}
    </label>

     @if(isset($cookie['description']))
        <p style="font-size:13px;">
           {{ $cookie['description'] }}
        </p>
    @endif
</div>
