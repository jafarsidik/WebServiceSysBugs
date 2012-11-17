/* 
 * Neste arquivo temos todos os serviços da
 * tela de lista de usuario e cadastro do mesmo
 * 
 * Autor Simão Menezes
 */

var api = "http://simaomenezes.com/webservice/WebServiceSysBugs/index.php/api/";



/*########## functions de list ##########################*/
$('#pageListAccounts').live('pageinit', function(event) {
    loadAllAccounts;        
});

//var api = "http://localhost/WebServiceSysBugs/index.php/api/";//configuração local
var loadAllAccounts = $(function() {     
    $.ajax({
        type : "GET",
        url : api + "AccountsRest/accounts",
        dataType : "xml",
        contentType : 'application/xml',
        processData : false,
        success : manipulateXml,
        error : function(callback) {
//            alert('error: ' + callback);
        }
    });
});
function manipulateXml(data) {
    $(data).find("item").each(function() {
        var name = $(this).find("name").text();
        var id = $(this).find("id").text();
        var output = [ '<li><a href="#" class="ui-btn-right">' + name + '</a></li>' ]
//        var output = [ '<li><a href="edit_user.html" data-identity="' + id + '" class="ui-btn-right">' + name + ' - ' + id + '</a></li>' ]
        $("ul").append(output.join("\n"));
        $('ul').listview('refresh');
    });
}

/*############ function de cadastro #########################*/
$(document).bind('pageinit',function() {    
    
    $('#btnAdd').click(function() {
        $.ajax({
            type : 'POST',
            url : api + "AccountsRest/",
            dataType : "xml",
            data : $('#fmradd').serialize(),
            contentType : 'application/x-www-form-urlencoded, xml',
            processData : false,
            success : function(response) {
                console.log("salvo");
                $.mobile.changePage( "msg_ok.html", "data-inline='true' data-rel='dialog' data-transition='slidedown'", { transition: "slideup"} );
            },
            error : function() {                
                console.log("erro");
                $.mobile.changePage( "msg_erro.html", "data-inline='true' data-rel='dialog' data-transition='slidedown'", { transition: "slidedown"} );
            }
        });
    });
});

function checkForm() {
    try {
            if ($.trim($('#person').val()) == "" || $.trim($('#contact').val()) == "" || $.trim($('#description').val()) == "") {
                alert("Please enter all fields");
                return false;
            }
        } catch (e) {
            alert(e);
            return false;
        }
        return true;
}

