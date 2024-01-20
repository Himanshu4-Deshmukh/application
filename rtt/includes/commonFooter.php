
<script type='text/javascript' src='assets/js/jquery.msgBox.js'></script>
<link rel="stylesheet" href="assets/css/msgBoxLight.css" />

<script type="text/javascript">

  

    $(document).ready(function(){
        msgBoxImagePath = "assets/images/";
    })
    // ALERT dialog box for showing msg
    // function showSuccessMsgBox(msg) {
    //     $.msgBox({
    //         title: "Alert box",
    //         content: msg,
    //         type: "info",
    //         autoClose:true
    //     });
    // }

    // ALERT autoclose dialog box for showing msg
    function showSuccessMsgBox(msg) {
        $.msgBox({
        title: "Success !!!",
        content: msg,
        type: "info",
        showButtons: false,
        opacity: 0.5,
        autoClose:true
        });
    }

    function showErrorMsgBox(msg) {
        $.msgBox({
            title: "Ooops",
            content: msg,
            type: "error",
            buttons: [{ value: "Ok" }],
            opacity: 0.3,
            // autoClose:true
        });
    }

     function showConfirmMsgBox(msg) {
    $.msgBox({
                title: "Are You Sure",
                content: msg,
                type: "confirm",
                buttons: [{ value: "Yes" }, { value: "No" }],
                success: function (result) 
                {
                    if (result == "Yes") 
                    {
                        
                    }
                }
            });
    }

    // for image showing
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);

        }
    }
</script>