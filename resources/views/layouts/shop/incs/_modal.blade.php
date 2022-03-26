
<!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="success-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row g-0 popup_content">
                    <div class="alert alert-primary d-none" id="item_added" role="alert">
                        @lang('frontend.itemToCart')
                    </div>
                    <div class="alert alert-primary d-none" id="favorite_item" role="alert">
                        @lang('frontend.itemToFavor')
                    </div>
                    <div class="alert alert-primary d-none" id="item_removed" role="alert">
                        @lang('frontend.itemRemovedCart')
                    </div>

                    <div class="alert alert-danger  d-none" id="item_not_added" role="alert">
                        @lang('frontend.NotAvailable')
                    </div>
                    <div class="alert alert-danger  d-none" id="item_in_favorite" role="alert">
                        @lang('frontend.InFavorite')
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
<!-- End Screen Load Popup Section --> 