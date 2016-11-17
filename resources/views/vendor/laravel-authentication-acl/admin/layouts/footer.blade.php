<footer id="footer-bottom">
    <div class="container">
        <div class="row">           
            <div class="col-md-6 col-sm-5">
                <p><strong>FOR INTERNAL USE ONLY</strong><br>COPYRIGHT &copy; {{ date("Y") }} WESTCON COMSTOR. ALL RIGHTS RESERVED</p>
            </div>
            <div class="col-md-6 col-sm-7">
                <ul>
            <?php
                //$footer_pages = DB::table('pages')->whereIn('template', ['terms_of_use','informed_consent','disclaimer'])->get();
                $privacy_policy = DB::table('pages')->where('template','new_template')->first();
                $terms_of_use = DB::table('pages')->where('template','terms_of_use')->first();
                $informed_consent = DB::table('pages')->where('template','informed_consent')->first();
                $disclaimer = DB::table('pages')->where('template','disclaimer')->first();
            ?>
                    <li><a href="@if(isset($privacy_policy))/page/{{$privacy_policy->slug}}@endif" target="_blank">@if(isset($privacy_policy)){{str_replace('-',' ',$privacy_policy->slug)}} @else Privacy Policy @endif</a></li>
                    <li><a href="@if($terms_of_use)/pages/{{$terms_of_use->slug}}@endif" target="_blank">@if(isset($terms_of_use)){{str_replace('-',' ',$terms_of_use->slug)}} @else Terms of Use @endif</a></li>
                    <li><a href="@if(isset($disclaimer))/pages/{{$disclaimer->slug}}@endif" target="_blank">@if(isset($disclaimer)){{$disclaimer->slug}} @else Disclaimer @endif</a></li>
                    <li><a href="@if(isset($informed_consent))/pages/{{$informed_consent->slug}}@endif" target="_blank">@if(isset($informed_consent)){{str_replace('-',' ',$informed_consent->slug)}} @else Informed Consent @endif</a></li>
                </ul>
            </div>
        </div>      
    </div><!-- /container -->
</footer>     
<!--/Footer-->