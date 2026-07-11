<div class="modal fade pop-up-1" tabindex="-1" role="dialog"   aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="request-brouchure">
<div class="modal-header"> 
<h2>Schedule a Site Visit</h2> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
</div>
<div class="modal-body">

<div class="sbgwhite">
<form method="POST" class="form" autocomplete="off" id="modelid" action="{{route('common.send')}}">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">  
<div class="row">
<div class="col-md-6 col-12">
<div class="form-group">  
<label>Name<span>*</span></label>
<input name="name" id="name" class="form-control" type="text" placeholder="Your Name"> 
<span class="text-danger small error-text name_error"> </span>
</div>
</div>
<div class="col-md-6 col-12">
<div class="form-group">  
<label>Email Address<span>*</span></label>
<input name="email" id="email" class="form-control" type="text" placeholder="Email Id"> 
<span class="text-danger small error-text email_error"> </span>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-12">
<div class="form-group">  
<label>Contact No.<span>*</span></label>
<input name="phone" id="phone" class="form-control" type="text" placeholder="Phone No."> 
<span class="text-danger small error-text phone_error"> </span> 
</div>
</div>
<div class="col-md-6 col-12">
<div class="form-group">
<label>City<span>*</span></label>  
<input name="city" id="city" class="form-control" type="text" placeholder="Your City"> 
<span class="text-danger small error-text city_error"> </span> 
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="form-group"> 
<label>Message<span>*</span></label> 
<textarea name="messages" id="messages" placeholder="Message" rows="4"></textarea>
</div>
</div>
 
<div class="col-sm-12">
<div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
<span class="text-danger small error-text g-recaptcha-response_error"> </span>
</div>
 
</div>
<div class="row">
<div class="col-12 mt-2">
<div class="form-group"> 
<input type="hidden" class="form-control" name="page_url" id="page_url" value="{{url()->current()}}">
<input class="wpcf7-submit" id="modelid" type="submit" value="Submit"> 
</div>
</div>
</div> 
</form>
</div> 
 



</div>

</div>
</div> 
</div> 
</div>