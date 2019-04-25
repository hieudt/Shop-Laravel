<div class="modal fade" id="quickViewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="information-blocks">
                    <div class="row">
                        <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
                            <div class="product-preview-box">
                                <section class="items">
                                <div class="product-zoom-image">
                                    <img class="image-product" src="" alt="" data-zoom="" />
                                </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-7 information-entry">
                            <div class="product-detail-box">
                                <input type="hidden" value="" id="modalIdProduct">
                                <h1 class="product-title">Tiêu đề PRoduct</h1>
                                <div class="price detail-info-entry">
                                    <span class="current">255000₫</span>
                                </div>
                                <div class="detail-info-entry-title">Kích cỡ</div>
                                <div class="form-group">
                                    <select class="form-control" name="selSize" id="selSize">
                                    </select>
                                </div>
                                <div class="detail-info-entry-title">Màu Sắc</div>
                                <div class="colorsProduct">
                                    <ul id="ListSelectColor">

                                    </ul>
                                </div>
                                <div class="quantity-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Số Lượng</div>
                                    <div class="entry number-minus">&nbsp;</div>
                                    <div class="entry number" id="modalSoLuong">1</div>
                                    <div class="entry number-plus">&nbsp;</div>
                                </div>

                                <div class="detail-info-entry">
                                    <div class="clear"></div>
                                </div>

                            </div>
                        </div>
                        <div class="clear visible-xs visible-sm"></div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="CloseModal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btnAddProduct"  data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Đang xử lý">Thêm giỏ hàng</button>
                <button type="button" class="btn btn-danger" id="btnAddWishlist" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Đang xử lý">Yêu thích</button>
            </div>
        </div>
    </div>
</div>