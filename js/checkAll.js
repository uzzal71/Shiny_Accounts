$(document).ready(function () {
    //  ======  ######  For Selecting All Roles  ######  ======
    $("#ckbCheckAll").click(function () {
        if (this.checked)
            $(".checkBoxClass").prop('checked', "checked");
        else
            $(".checkBoxClass").removeProp('checked');
    });

    //  ======  ######  For Selecting All Companies  ######  ======
    $("#ckbCheckAllCompany").click(function () {
        if (this.checked)
            $(".checkBoxCompanyClass").prop('checked', "checked");
        else
            $(".checkBoxCompanyClass").removeProp('checked');
    });
});
