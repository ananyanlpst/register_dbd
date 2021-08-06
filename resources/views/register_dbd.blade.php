<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <br>
        <div class="container">
            
            <form class="card" id="register_form" action="{{ url('/register/save') }}" method="POST" novalidate>
                
                @csrf

                <h3 class="card-header text-center">Register</h3>

                <div class="card-body">
                    
                    @if(\Session::has('res'))
                        @if(\Session::get('res.status'))
                            <div class="alert alert-success" role="alert">
                                {!! \Session::get('res.msg') !!}
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                {!! \Session::get('res.msg') !!}
                            </div>
                        @endif
                        <br>
                    @endif

                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_taxid">Tax ID</label>
                            <input type="text" minlength="13" maxlength="13" class="form-control form-control-sm" name="input_taxid" value="{{ old('input_taxid') }}" placeholder="Entre Tax ID" required>
                            <div class="invalid-feedback">
                                Please enter a valid tax id.
                            </div>
                            <div id="pattern-feedback"></div>
                            <div class="found-status"></div>
                        </div>
                        <div class="col-4 form-inline">
                            &nbsp;&nbsp;
                            <button id="check_dbd" class="btn btn-outline-info btn-sm" type="button" style="margin-top: 28px;">
                                Check DBD
                            </button>
                            &nbsp;&nbsp;&nbsp;
                            <span class="btn-status" style="margin-top: 28px;"></span>
                        </div>
                    </div>

                    <br>

                    <!-- company -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_company">Company</label>
                            <input type="text" class="form-control form-control-sm" name="input_company" value="{{ old('input_company') }}" placeholder="" required readonly>
                            <div class="invalid-feedback">
                                Please enter a company.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>

                    <!-- firstname -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_firstname">Firstname</label>
                            <input type="text" class="form-control form-control-sm" name="input_firstname" value="{{ old('input_firstname') }}" placeholder="Entre Firstname" required>
                            <div class="invalid-feedback">
                                Please enter a valid firstname.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>

                    <!-- lastname -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <label for="input_lastname">Lastname</label>
                            <input type="text" class="form-control form-control-sm" name="input_lastname" value="{{ old('input_lastname') }}" placeholder="Enter Lastname">
                            <div class="invalid-feedback"></div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>
                    
                    <!-- email -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_email">Email</label>
                            <input type="email" class="form-control form-control-sm" name="input_email" value="{{ old('input_email') }}" placeholder="Entre Email" required>
                            <div class="invalid-feedback">
                                Please enter a valid email.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>
                    
                    <!-- tel -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_telephone">Telephone</label>
                            <input type="tel" maxlength="10" class="form-control form-control-sm" name="input_telephone" value="{{ old('input_telephone') }}" placeholder="Entre Telephone" required>
                            <div class="invalid-feedback">
                                Please enter a valid telephone.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    
                    <br>
                    
                    <!-- province -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_province">Province</label>
                            <select class="form-control custom-select-sm" name="input_province" required>
                                <option {{ old('input_province') == "" ? 'selected' : '' }} value="">Please Select</option>
                                <option {{ old('input_province') == "BKK" ? 'selected' : '' }} value="BKK">กรุงเทพมหานคร</option>
                                <option {{ old('input_province') == "NBI" ? 'selected' : '' }} value="NBI">นนทบุรี</option>
                                <option {{ old('input_province') == "NPT" ? 'selected' : '' }} value="NPT">นครปฐม</option>
                                <option {{ old('input_province') == "SPK" ? 'selected' : '' }} value="SPK">สมุทรปราการ</option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter a valid province.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>
                    <hr>
                    
                    <!-- username -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_username">Username</label>
                            <input type="text" class="form-control form-control-sm" name="input_username" value="{{ old('input_username') }}" placeholder="Entre Username" required>
                            <div class="invalid-feedback">
                                Please enter a valid username.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>

                    <!-- password -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_password">Password</label>
                            <input type="password" minlength="6" class="form-control form-control-sm" name="input_password" value="{{ old('input_password') }}" placeholder="Entre Password" required>
                            <div class="invalid-feedback">
                                Please enter a valid password.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>
                    
                    <!-- re-type password -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <span style="color: red;">*</span>
                            <label for="input_retype_password">Re-type Password</label>
                            <input type="password" minlength="6" class="form-control form-control-sm" name="input_retype_password" value="{{ old('input_retype_password') }}" placeholder="Entre Re-type Password" required>
                            <div class="invalid-feedback">
                                Please enter a valid re-type password.
                            </div>
                            <div id="pattern-feedback"></div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <br>

                    <!-- Save Button -->
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4 text-center">
                            <button id="register_save" type="submit" class="btn btn-secondary btn-sm" disabled>Save</button>
                        </div>
                        <div class="col-4"></div>
                    </div> 

                </div>

            </form> 
            
            <br>
            
        </div>
    </body>
</html>
    
<script>

var loading =   '<div class="spinner-grow text-secondary spinner-grow-sm" role="status">';
    loading +=  '<span class="sr-only">Loading...</span>';
    loading +=  '</div>';
    loading +=  '<div class="spinner-grow text-secondary spinner-grow-sm" role="status">';
    loading +=  '<span class="sr-only">Loading...</span>';
    loading +=  '</div>';
    loading +=  '<div class="spinner-grow text-secondary spinner-grow-sm" role="status">';
    loading +=  '<span class="sr-only">Loading...</span>';
    loading +=  '</div>';

var found = '<p class="text-success"><b>Found tax id!</b></p>';
var not_found = '<p class="text-danger"><b>Not found tax id!</b></p>';

$(function(){
    
    // เช็คข้อมูล realtime ตอนพิมพ์
    $('input').keyup(function(){
        checkValid(this);
    });

    // เช็ค tax id ที่ DBD
    $('#check_dbd').click(function(){
        var val = $("[name=input_taxid]").val();
        $(".btn-status").empty().append(loading);

        if(/^[0-9]+$/.test(val) && val.length == 13){
            // check tax id with DBD
            $.ajax({
                type: "GET",
                url: "https://opend.data.go.th/moc/juristic?juristic_id=" + val,
                data: {
                    // 'response-format': 'jsonp',
                    'api-key': 'qoJGZ53QGgQ4r609AVOVG9Kqg83p0gCT'
                },
                success: function (result) {
                    if(result){
                        // console.log(result);
                        $('[name=input_company]').val(result.juristicNameEN);
                        $(".btn-status").empty().append(found);
                        $("#register_save").prop('disabled', false);
                    } else {
                        $(".btn-status").empty().append(not_found);
                    }
                },
                error: function (error) {
                    console.log("error: "+error);
                }
            });

            // $.ajax({
            //     type: "GET",
            //     url: "https://dataapi.moc.go.th/juristic?juristic_id=" + val,
            //     dataType: "json",
            //     success: function (result) {
            //         console.log(result);
            //         if(result){
            //             if(result.juristicNameEN){
            //                 $(".status").empty();
            //                 $("[name=input_company]").val(result.juristicNameEN);
            //                 $('#register_save').prop("disabled", false);
            //             }
            //         } else {
            //             $(".status").empty();
            //             $(".status").append(not_found);
            //             $('#register_save').prop("disabled", true);         
            //         }
            //     },
            //     error: function (error) {
            //         console.log("error");
            //     }
            // });
        }
    });

    $("#register_form").on("submit",function(){
        
        var invalid_len = $(".invalid").length;
        if(invalid_len == 0){
            var form = $(this)[0];
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');    
        } else {
            alert('Please check your input data.');
            return false;
        }   
    });

});

function checkValid(obj){
    var name = obj.name;
    var val = obj.value;
    var text = '';

    if(!val){
        text = '';
        $("[name=" + name + "]").removeClass('invalid');

        if(name == 'input_taxid'){
            $("[name=input_company]").val('');
            $(".found-status").empty();
        }

    } else {

        // if(['input_company'].includes(name)){
        //     if(!/^[A-Za-z._,-]+$/.test(val) && val.length > 0){
        //         text = 'Please enter english character , . _ - only.';
        //     }
        // } else 
        
        if(['input_taxid'].includes(name) && val.length > 0){

            if(!/^[0-9]+$/.test(val)){  
                text = 'Please enter numeric only.';
                $("[name=input_company]").val('');
            } else if(/^[0-9]+$/.test(val) && val.length < 13){
                $("[name=input_company]").val('');
            }
        } else if(['input_firstname', 'input_lastname'].includes(name)){
            if(!/^[A-Za-z-]+$/.test(val) && val.length > 0){
                text = 'Please enter english character only.';
            }
        } else if(['input_email'].includes(name)){
            if(!/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(val) && val.length > 0){
                text = 'Please match the requested format email.';
            }
        } else if(['input_telephone'].includes(name)){
            if(!/^0([8|9|6])([0-9]{8}$)/.test(val) && val.length > 0){
                text = 'Please enter numeric only.';
            }
        } else if(['input_username'].includes(name)){
            if(!/^[A-Za-z0-9._-]+$/.test(val) && val.length > 0){
                text = 'Please enter english character and numeric only (A-Z, a-z, 0-9, . _ -).';
            }
        } else if(['input_password'].includes(name)){
            if(!/^[a-zA-Z0-9!@#$%^&*]+$/.test(val) && val.length > 0 || val.length < 6){
                text = 'The password must be at least 6 characters long (A-Z, a-z, 0-9, ! @ # $ % ^ & *).'
            }
        } else if(['input_retype_password'].includes(name) && val.length > 0){
            var pwd = $('[name=input_password]').val();
            if(pwd !== val){
                text = 'The password confirmation does not match.';
            }
        }

        (text) ? $("[name=" + name + "]").addClass('invalid') : $("[name=" + name + "]").removeClass('invalid');
    }

    $("[name=" + name + "]").next("div.invalid-feedback").next("div#pattern-feedback").text(text)
}

</script>

<style>
#pattern-feedback{
    color: #dc3545;
    font-size: 12.5px;
    margin-top: 4px;
}
</style>