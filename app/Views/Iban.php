<?php include_once 'layout/header.php'; ?>
    <h1>Users register</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-item nav-link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal" role="tab" aria-controls="nav-personal" aria-selected="true">Personal</a></li>
        <li class="nav-item"><a class="nav-item nav-link" id="nav-address-tab" data-toggle="tab" href="#nav-address" role="tab" aria-controls="nav-address" aria-selected="false">Address</a></li>
        <li class="nav-item"><a class="nav-item nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-controls="nav-payment" aria-selected="false">Payment</a></li>
    </ul>
    <form class="form-register" name="form-register" id="form-register">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-personal" role="tabpanel" aria-labelledby="nav-personal-tab">
                <div class="row p-2">
                    <div class="col-md-6 col-xs-12 mb-3">
                        <label for="firstName">First name *</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name *</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Telephone *</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="" required>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-lg btn-block col-3 btnNext" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-address-tab">
                <div class="row p-2">
                    <div class="col-md-12 mb-3">
                        <label for="Address">Address *</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="number">Number *</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="" value="" required>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="city">City *</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="zipcode">Zipcode *</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="" value="" required>
                    </div>
                    <div class="col-md-12 row">
                        <!--<button class="btn btn-primary btn-lg col-md-3 mr-1 btnPrevious">Previous</button>-->
                        <button class="btn btn-primary btn-lg col-3 btnNext" type="button">Next</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
                <div class="row p-2">
                    <div class="col-md-12 mb-3">
                        <label for="Owner">Account owner *</label>
                        <input type="text" class="form-control" id="owner" name="owner" placeholder="" value="" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="iban">IBAN *</label>
                        <input type="text" class="form-control" id="iban" name="iban" placeholder="" value="" required>
                    </div>
                    <div class="col-md-12 row">
                        <!--<button class="btn btn-primary btn-lg col-md-3 mr-1 btnPrevious">Previous</button>-->
                        <button class="btn btn-primary btn-lg col-md-3 btnSubmit" type="submit">Finish</button>
                    </div>
                </div>
            </div>
            <div class="errors text-danger fade">
                * Pleas fill all fields
            </div>
        </div>
    </form>
<?php include_once 'layout/footer.php'; ?>