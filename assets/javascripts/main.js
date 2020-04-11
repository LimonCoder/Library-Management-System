// Add book insert successfully and Unsuccessfully  AlertSMS..............
function booksavepoup(){
    $(document).ready(function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Successfully ! Save this Book',
            showConfirmButton: false,
            timer: 1500
        })
    });
}

function bookfaildpoup(){
    $(document).ready(function(){
        Swal.fire({
            icon: 'error',
            title: 'Faild !',
            text: 'Data Insert Unseccessfully',
            timer: 1500
        })
    });
}
// Add book insert successfully and unsuccessfully AlertSMS..................


// Add Book Option Datepicker add..................
$(document).ready(function () {
    $("#phurshacedate").datepicker();
});

$(document).ready(function () {
    $('input[id$=Purdate]').datepicker({
        dateFormat: 'dd-mm-yy'
    });
});

$(document).ready(function () {
    $("#fromdate").datepicker();
});
$(document).ready(function () {
    $("#todate").datepicker();
});


// Add Book Option Datepicker add..................


// Issue Book Button Validation ....................
document.getElementById("isssussave").disabled = true;
$(document).ready(function(){

    $("#bookid").click(function(){

        var value = $("#bookid").val();

        if(value.length  == 0){
            document.getElementById("isssussave").disabled = true;
        }else{
            document.getElementById("isssussave").disabled = false;
        }

    });

});
// Issue Book Button Validation ....................

// Issue book data Insert Successfully AlertSms ...........

function issuesuccess(){
    $(document).ready(function () {
        $("#alertx").show();
        setTimeout(function () {
            $("#alertx").hide();
        },2000);
    });
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});





