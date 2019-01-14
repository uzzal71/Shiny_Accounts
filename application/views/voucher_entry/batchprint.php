    <!DOCTYPE html>
    <html>

    <head>
        <title>
            2RA Technology Limited
        </title>
   
    </head>

    <body>


    <br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          
        </div>
        <div class="col-md-3"></div>
    </div>
    <br><br>
    <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4">


            <div class="panel panel-primary custom-panel">

                <div class="panel-heading">Batch Print</div>
                <br>
                <form role="form" action="<?php echo base_url();?>voucher_entry/queue" method="post" target="_blank">

                    <div  style="margin-top: 21px;">
                        <div>
                            <label for="from" style="margin-top: 4px;margin-right: 8px;float: left;margin-left: 15px">From VN</label>
                        </div>
                        <div>
                            <input type="text" id="from" name="from" required style="height: 23px!important;width: 120px;margin-top: 8px;float: left;font-size: 13px;margin-right: 8px">
                        </div>
                        <div style="float: left">
                            <label for="toDate" style="margin-top: 4px;margin-left:10px;margin-right: 8px; ">To VN</label>
                        </div>

                        <div style="float: left">
                            <input type="text" id="to" name="to" class="form-control custom-input" style="height: 23px!important;width: 120px;margin-top: 8px;float: left;font-size: 13px">
                        </div>

                    </div>

                    <br><br><br><br>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div>
                                <div class="col-md-4" style="float: right;width: 4%;margin-top: 11px">
                                    <button type="submit" class="btn btn-info pull-right" style="width: 112px;margin-right: 15px;">Print Vouchers</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>


        <div class="col-md-3"></div>
    </div>


    <br><br><br><br>
    

    </body>
    </html>
