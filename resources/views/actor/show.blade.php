    
<style>
.actor-input-wide {
	display: inline-block;
	width: 200px;
}

.actor-input-narrow {
	display: inline-block;
	width: 125px;
}


</style>

<div id="edit-actor-content">
	<fieldset>
		<legend>Actor details - ID: {{ $actorInfo->id }}</legend>
		<table class="table table-hover table-sm" data-id="{{ $actorInfo->id }}">
                <tr><td><label for="name" class="required-field" title="{{ $actorComments['name'] }}">Name</label> 
                </td><td class="ui-front"><input class="actor-input-wide noformat" name="name" value="{{ $actorInfo->name }}">
                </td><td><label for="first_name" title="{{ $actorComments['first_name'] }}">First name</label>
                </td><td><input id="first_name" class="actor-input-narrow noformat" name="first_name" value="{{ $actorInfo->first_name }}">
                </tr><tr><td><label for="display_name" title="{{ $actorComments['display_name'] }}">Display name</label>
                </td><td class="ui-front">
                		<input type="text" class="actor-input-wide noformat" name="display_name" value="{{ $actorInfo->display_name }}">
                </td><td><label for="login" title="{{ $actorComments['login'] }}">Login</label>
                </td><td><input id="login" class="actor-input-narrow noformat" name="login" value="{{ $actorInfo->login }}">
                </tr><tr><td><label for="default_role" title="{{ $actorComments['default_role'] }}">Default role</label>
                </td><td class="ui-front">
                		<input type="text" class="actor-input-wide noformat" name="default_role" value="{{ empty($actorInfo->droleInfo) ? '' : $actorInfo->droleInfo->name }}">
                </td><td><label for="function" title="{{ $actorComments['function'] }}">Function</label>
                </td><td><input id="function" class="actor-input-narrow noformat" name="function" value="{{ $actorInfo->function }}">
                </tr><tr><td><label for="company_id" title="{{ $actorComments['company_id'] }}">Employer</label>
                </td><td class="ui-front">
                		<input type="text" class="actor-input-wide noformat" id="company_id" name="company_id" value="{{ empty($actorInfo->company) ? '' : $actorInfo->company->name }}">
                <td><label for="parent_id" title="{{ $actorComments['parent_id'] }}">Parent company</label>
                </td><td class="ui-front">
                		<input type="text" class="actor-input-narrow noformat" id="parent_id" name="parent_id" value="{{ empty($actorInfo->parent) ? '' : $actorInfo->parent->name }}">
                </tr><tr><td><label for="site_id" title="{{ $actorComments['site_id'] }}">Work site</label>
                </td><td class="ui-front">
                		<input type="text" class="actor-input-wide noformat" id="site_id" name="site_id" value="{{ empty($actorInfo->site) ? '' : $actorInfo->site->name }}">
                </td><td><label for="phy_person" title="{{ $actorComments['phy_person'] }}">Person</label>
                </td><td><span class="actor-input-narrow" name="phy_person">
                        <input type="radio" name="phy_person" id="phy_person" value="1" {{ $actorInfo->phy_person ? 'checked="checked"' : "" }} />Physical&nbsp;&nbsp;
                        <input type="radio" name="phy_person" id="phy_person" value="0" {{ $actorInfo->phy_person ? "" : 'checked="checked"'}} />Legal
                </span>
                </tr><tr><td><label for="nationality" title="{{ $actorComments['nationality'] }}">Nationality</label>
                </td><td class="ui-front">
                		<input type="text" class="actor-input-wide noformat" name="nationality" value="{{ empty($actorInfo->nationalityInfo) ? '' : $actorInfo->nationalityInfo->name }}">
                </td><td><label for="small_entity" title="{{ $actorComments['small_entity'] }}">Small entity</label>
                </td><td><span class="actor-input-narrow noformat" name="small_entity">
                        <input type="radio" name="small_entity" id="small_entity" value="1" {{ $actorInfo->small_entity ? 'checked="checked"' : "" }} />Yes&nbsp;&nbsp;
                        <input type="radio" name="small_entity" id="small_entity" value="0" {{ $actorInfo->small_entity ? "" : 'checked="checked"'}} />No
                </span>
				</td></tr>
			</table>
        </fieldset>
        <fieldset>
              <legend>Contact details</legend>
              <table class="table table-hover table-sm" data-id="{{ $actorInfo->id }}">
                <tr><td><label for="address" title="{{ $actorComments['address'] }}">Address</label>
                </td><td class="ui-front">
					<input type='text' class="actor-input-wide noformat" name="address" value="{{ $actorInfo->address }}">
                </td><td><label for="country" title="{{ $actorComments['country'] }}">Country</label>
                </td><td class="ui-front">
						<input type='text' class="actor-input-narrow noformat" name="country" value="{{ empty($actorInfo->countryInfo) ? '' : $actorInfo->countryInfo->name }}">
				</tr><tr><td><label for="address_mailing" title="{{ $actorComments['address_mailing'] }}">Address mailing</label>
                </td><td class="ui-front">
					<input type='text' class="actor-input-wide noformat" name="address_mailing" value="{{ $actorInfo->address_mailing }}">
                </td><td><label for="country_mailing" title="{{ $actorComments['country_mailing'] }}">Country mailing</label>
                </td><td class="ui-front">
						<input type='text' class="actor-input-narrow noformat" name="country_mailing" value="{{ empty($actorInfo->country_mailingInfo ) ? '' : $actorInfo->country_mailingInfo->name }}">
				</tr><tr><td><label for="address_billing" title="{{ $actorComments['address_billing'] }}">Address billing</label>
                </td><td class="ui-front">
					<input type='text' class="actor-input-wide noformat" name="address_billing" value="{{ $actorInfo->address_billing }}">
                </td><td><label for="country_billing" title="{{ $actorComments['country_billing'] }}">Country billing</label>
                </td><td class="ui-front">
						<input type='text' class="actor-input-narrow noformat" name="country_billing" value="{{ empty($actorInfo->country_billingInfo ) ? '' : $actorInfo->country_billingInfo->name }}">
				</tr><tr><td><label for="email" title="{{ $actorComments['email'] }}">Email</label>
                </td><td class="ui-front">
					<input type='text' class="actor-input-wide noformat" name="email" value="{{ $actorInfo->email }}">
                </td><td><label for="phone" title="{{ $actorComments['phone'] }}">Phone</label>
                </td><td class="ui-front">
						<input type='text' class="actor-input-narrow noformat" name="phone" value="{{ $actorInfo->phone }}">
				</td></tr>
			</table>
        </fieldset>
        <fieldset>
              <legend>Contact details</legend>
              <table class="table table-hover table-sm" data-id="{{ $actorInfo->id }}">
				<tr><td><label for="VAT_number" title="{{ $actorComments['VAT_number'] }}" >VAT no.</label>
                </td><td><input type='text' class="actor-input-wide noformat" name="VAT_number" value="{{ $actorInfo->VAT_number }}">
                </td><td><label for="warn" title="{{ $actorComments['warn'] }}">Warn</label>
                </td><td><span class="actor-input-narrow noformat" name="warn">
                        <input type="radio" name="warn" value="1" {{ $actorInfo->warn ? 'checked=checked' : "" }}/>YES&nbsp;&nbsp;
                        <input type="radio" name="warn" value="0" {{ $actorInfo->warn ? "" : 'checked=checked' }}/>NO
                </span>
                </td></tr><tr><td><label for="registration_no" title="{{ $actorComments['registration_no'] }}" >Registration no.</label>
                </td><td><input type='text' class="actor-input-wide noformat" name="registration_no" value="{{ $actorInfo->registration_no }}">
                </td><td><label for="registration_no" title="{{ $actorComments['legal_form'] }}" >Legal form</label>
                </td><td><input type='text' class="actor-input-wide noformat" name="legal_form" value="{{ $actorInfo->legal_form }}">
                </td></tr><tr><td><label for="notes" title="{{ $actorComments['notes'] }}">Notes</label>
                </td><td><input type='text' class="actor-input-wide noformat" name="notes" value="{{ $actorInfo->notes }}">
                </td></tr>
        </table>
		<button title="Delete actor" class="delete-actor" data-dismiss="modal" data-id="{{ $actorInfo->id }}" style="float: right; margin-top: 10px; margin-right: 16px;">
			<span class="ui-icon ui-icon-trash" style="float: left;"></span>
			Delete
		</button>
	</fieldset>
	
</div>
