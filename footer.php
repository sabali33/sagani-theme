<div class="search-popup-box" id="search-popup-box">
	<a href="#top" class="close"></a>
	
	<div class="search-popup">
		<form action="#">
			<input type="text" name="s" value="" placeholder="search" id="overlay-search-input">
			<!-- <label for="overlay-search-input"><i class="fa fa-search" aria-label="Search"></i>Search</label> -->
			<button class="overlay-search-button">Search</button>
		</form>
	</div>
</div>
<div class="footer__lower">
    <div class="site-width">
        <div class="footer-wrapper sg-row">
            <div class="sg-col-12-xs sg-col-4-md">
                <div class="footer-logo">
                    <?php get_template_part('/partials/footer/logo', '', ['location' => 'footer']) ?>
                </div>
            </div>
            <div class="sg-col-12-xs sg-col-4-md sg-ta-center-sm"><p class="copyright-text">&copy; 2018 All Rights Reserved.</p></div>
            <div class="sg-col-12-xs sg-col-4-md">
                <div class="back-to-top">
                    <a href="#">Back to Top</a>
                </div>

            </div>

        </div>
    </div>
</div>
<?php get_template_part('/partials/footer/mobile-menu'); ?>
    <?php wp_footer(); ?>
</body>
</html>