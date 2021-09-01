@if (session('success'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" id="close-error-handler">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        <button class="close" data-dismiss="alert" id="close-button">
                            ×
                        </button>
                        Success!
                        <div class="text-white-50 small">{{ session('success') }} </div>

                    </div>
                </div>
            </div>
            <br>
            @elseif (session('error'))
                <div class="col-lg-12" id="close-error-handler">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            <button class="close" data-dismiss="alert" id="close-button">
                                ×
                            </button>
                            Error!
                            <div class="text-white-50 small">{{ session('error') }}</div>
                        </div>
                    </div>
                </div>
                <br>
            @elseif (session('info'))
                <div class="col-lg-12" id="close-error-handler">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            <button class="close" data-dismiss="alert" id="close-button">
                                ×
                            </button>
                            Info!
                            <div class="text-white-50 small">{{ session('info') }}</div>
                        </div>
                    </div>
                </div>
                <br>
        </div>
    </div>
@endif
