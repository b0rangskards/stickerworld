<div class="modal fade modal-form" id="addMaterialModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Material</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">
                        <div class="row prd-row">
                            <div class="col-md-6">
                                <div class="prd-img">
                                    <img class="item-img" src="{{Config::get('constants.NO_IMG_URL')}}" alt="">
                                </div>
                                <div class="action">
                                    <div class="input-group m-bot15">
                                        <span class="input-group-btn">
                                          <button class="btn" type="button">
                                          <i class="fa fa-search"></i>
                                          </button>
                                        </span>
                                        <input type="text" name="item" id="search-project-item" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h1 class="item-name-label"></h1>
                                <p class="normal remarks-label"></p>
                                <p class="terques">P<span class="unit-price-label">0.00</span> / <span class="unit-label">PCS</span></p>
                                <div class="price">
                                    <div class="amnt inline-block">P<span class="total-amount-label">0.00</span></div>
                                    <input type="number" class="item-project-qty" min="0" class="form-control"/> <span class="label">QTY</span>
                                    <p>Total</p>
                                </div>
                            </div>

                            <a href="#" class="btn btn-primary pull-right btn-add-cart add-item-to-project-btn">Add to Project</a>

                        </div>
                        </div>
                    </section>
                    {{Form::hidden('item_id')}}
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

