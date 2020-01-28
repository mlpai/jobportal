<footer class="site-footer">
    <div class="container">
        <div class="row">
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Search Trending</h3>
            <ul class="list-unstyled">
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Graphic Design</a></li>
            <li><a href="#">Web Developers</a></li>
            <li><a href="#">Python</a></li>
            <li><a href="#">HTML5</a></li>
            <li><a href="#">CSS3</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Resources</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
            <li><a href="#">Support</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
                    {!!
                        Share::currentPage('Apply for Jobs here @ ')
                        ->facebook()
                        ->twitter()
                        ->linkedin('Apply this job')
                        ->whatsapp();
                        !!}
            </div>
        </div>
        </div>

    </div>
</footer>

@push('styles')
<style>
    #social-links li {
        float:left ;
        display: inline;
        margin-right: 10px;
        padding: 0px;
    }
</style>
@endpush
