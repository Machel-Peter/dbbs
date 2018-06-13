var data_btn = document.getElementById('testScript').getAttribute('data-btn');
var data_form = document.getElementById('testScript').getAttribute('data-form');
// alert(data_form);
    if (data_form == "registerform" || data_form =="loginform") {
        var form = document.getElementById(data_form);
        var btn = document.getElementsByClassName(data_btn)[0];
        // alert(document.getElementsByClassName(data_btn)[0].firstChild.type);
        // alert(btn.firstChild.type);
    }else if(data_form == "y"){
        var parent = document.getElementsByClassName(data_form)[0];
        var btn = document.getElementById(data_btn);
    }else if (data_form == "fastpostsubmitline"){
        var parent = document.getElementById(data_form);
        var btn = document.getElementById(data_btn);
    }
window.addEventListener('load',function(){
    if (data_form == "registerform" || data_form =="loginform") {
        var formdialog = btn.firstChild;
        var b = formdialog.cloneNode(true);
        b.setAttribute('type','button');
        formdialog.style.display = 'none';
        btn.appendChild(b);
        var dxcaptcha = document.getElementById("dx_captcha");
        form.appendChild(dxcaptcha);
    }else if (data_form == "y"){
        var b = btn.cloneNode(true);
        b.setAttribute('id','cp_postsubmit');
        b.setAttribute('class','btn_pn btn_pn_blue');
        b.setAttribute('disable', 'false');
        btn.style.display = "none";
        parent.appendChild(b);
        // var oculus = document.getElementsByClassName("oculus")[0];
    }else if (data_form == "fastpostsubmitline"){
        var b = btn.cloneNode();
        b.setAttribute('id','cp_fastpostsubmit');
        b.setAttribute('class','button2');
        btn.style.display = "none";
        parent.appendChild(b);
        var dxcaptcha = document.getElementById("dx_captcha");
        parent.appendChild(dxcaptcha);
    }
        b.addEventListener('click', function(e) {
            var dxcaptcha = document.getElementById("dx_captcha");
            if(dxcaptcha.style.display == 'none'){
                dxcaptcha.style.display = 'block';
            }
            myCaptcha.reload();
            e.preventDefault();
            e.stopPropagation();
            myCaptcha.show();
        }, false)
    });
    
    window.oc_custom_ajax = function(result, id, message) {
      if(result) {
        document.getElementById(id).style.display = "none";
        if (data_form == "registerform" || data_form =="loginform") {
            btn.firstChild.click();
        }else{
            btn.click();
        }
      }
    }
