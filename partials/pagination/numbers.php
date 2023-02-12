<div class="pagination pagination__numbers">
    <ul class="page-numbers">
        <?php foreach( Sagani::utils()->get_pagination_links() as $link ): ?>
        <!-- <li class="page-number prev"><a href="#" aria-label="Previous page">&nbsp;</a></li> -->
        <li class="page-number"><?php echo $link; ?></li>
        <?php endforeach; ?>

        <li class="page-number more">
            <input type="checkbox" name="go_to_box" value="" id="go-to-page" class="go-to-page">
            <label for="go-to-page" class="fa fa-ellipsis-h">&nbsp;</label>
            <i class="close fa fa-times"></i>
            <div class="page-number form">
                <form action="#">
                    <label for="pagination-page-number">
                        <input type="number" name="page_number" value="" placeholder="Enter page id" min="1" id="pagination-page-number">
                    </label>
                    <!-- <button> Go </button> -->
                </form>
            </div>
            
        </li>
    </ul>
</div>