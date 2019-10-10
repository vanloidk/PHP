<div class="content-customize02">

    <div class="row col-md-10">
        <h4>Delivery Address <span>All the fields marked with <span class=" req right">*</span> are mandatory</span></h4>
    </div>
    <div class="row col-md-10">
        <h2>Enter Delivery Address</h2>
        <div class="top-message">
            To add a new address simply use the automatic address finder below.
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" style="margin-top: 10px">

        <div class="row oneline">
            <label for="Nickname" required="true">Address Nickname</label>
            <div class="inputOuter focus-message-added">
                <input type="text" value="" tabindex="10" placeholder="e.g. Mum's House" name="Nickname" id="Nickname"  data-val-required="Address Nickname must not be empty." data-val-regex-pattern="^[A-Za-z0-9'\(\).&amp; -]{1,25}$" data-val-regex="Your Address Nickname can only consist of letters, numbers, the characters '-.() and spaces." data-val="true" data-focus-message-fixed="true" data-focus-message="Setting nicknames will help you quickly identify your preferred delivery address.">
                <table class="inputMessage  right"><tbody><tr><td id="Nickname-validation-message">Setting nicknames will help you quickly identify your preferred delivery address.</td></tr></tbody></table><div class="fldFlag "></div><div class="messageArrow "></div>
            </div>
        </div>
        <div class="row oneline">
            <label for="RecipientName"  required="true" >Recipient at Address</label>
            <div class="inputOuter">
                <input type="text" value="" tabindex="20" placeholder="e.g. Mrs. A. N. Other" name="RecipientName" id="RecipientName" data-val-required="Recipient at Address must not be empty." data-val-regex-pattern="^[A-Za-z'&amp;. -]{1,25}$" data-val-regex="Recipient at Address can only consist of letters, the characters '-. and spaces." data-val="true">
                <table class="inputMessage  right"><tbody><tr><td id="RecipientName-validation-message"></td></tr></tbody></table><div class="fldFlag "></div><div class="messageArrow "></div>
            </div>
        </div>
        <div class="row oneline">
            <label for="HouseNumberOrName"  required="true" >House Number or Name</label>
            <div class="inputOuter">
                <input type="text" value="" tabindex="30" name="HouseNumberOrName" id="HouseNumberOrName" data-val-required="House Number or Name was missing." data-val="true">
                <table class="inputMessage  right"><tbody><tr><td id="HouseNumberOrName-validation-message"></td></tr></tbody></table><div class="fldFlag "></div><div class="messageArrow "></div>
            </div>
        </div>
        <div class="row oneline">
            <label for="Postcode"  required="true" >Postcode</label>
            <div class="inputOuter">
                <input type="text" value="" tabindex="40" name="Postcode" id="Postcode" data-val-required="Postcode was missing." data-val-regex-pattern="(GIR 0AA|GIR0AA|gir 0aa|gir0aa|[A-PR-UWYZa-pr-uwyz]([0-9]{1,2}|([A-HK-Ya-hk-y][0-9]|[A-HK-Ya-hk-y][0-9]([0-9]|[ABEHMNPRV-Yabehmnprv-y]))|[0-9][A-HJKS-UWa-hjks-uw])\s?[0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2})" data-val-regex="Please enter a valid Postcode" data-val="true">
                <table class="inputMessage  right"><tbody><tr><td id="Postcode-validation-message"></td></tr></tbody></table><div class="fldFlag "></div><div class="messageArrow "></div>
            </div>
        </div>
        <div class="row oneline">
            <label for="MakeDefault">Make Default</label>
            <div class="inputOuter checkbox">
                <input type="checkbox" value="true" tabindex="100" name="MakeDefault" id="MakeDefault" data-val-required="The Make Default field is required." data-val="true"><input type="hidden" value="false" name="MakeDefault">
            </div>
        </div>
        <input type="hidden" value="PostcodeSearch" name="ActiveView" id="ActiveView" data-val-required="The ActiveView field is required." data-val="true"><input type="hidden" value="DCAddress" name="Mode" id="Mode" data-val-required="The Mode field is required." data-val="true"><input type="hidden" value="AddDCAddress" name="DCAddressingMode" id="DCAddressingMode" data-val-required="The DCAddressingMode field is required." data-val="true">
        <input type="submit" name="AddAddress" tabindex="110" value="Add Address"  class="btn btn-primary">
    </div>

</div>
