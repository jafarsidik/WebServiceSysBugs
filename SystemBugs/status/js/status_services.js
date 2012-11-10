/* 
 * Neste arquivo temos todos os serviços da
 * tela de lista de usuario e cadastro do mesmo
 * 
 * Autor Simão Menezes
 */


/*########## functions de list ##########################*/
$('#pageListStatus').live('pageinit', function(event) {
    loadAllStatus;        
});

var api = "http://localhost/WebServiceRestFulTeste/index.php/api/";
var loadAllStatus = $(function() {     
    $.ajax({
        type : "GET",
        url : api + "EstatusRest/status",
        dataType : "xml",
        contentType : 'application/xml',
        processData : false,
        success : manipulateXml,
        error : function(callback) {
            alert('error: ' + callback);
        }
    });
});
function manipulateXml(data) {
    $(data).find("item").each(function() {
        var name = $(this).find("name").text();
        var output = [ '<li><a href="#" class="ui-btn-right">' + name + '</a></li>' ]
        $("ul").append(output.join("\n"));
        $('ul').listview('refresh');
    });
}

/*############ function de cadastro #########################*/
$(document).bind('pageinit',function() {    
    
    $('#btnAdd').click(function() {
        $.ajax({
            type : 'POST',
            url : api + "EstatusRest",
            dataType : "xml",
            data : $('#fmradd').serialize(),
            contentType : 'application/x-www-form-urlencoded, xml',
            processData : false,
            success : function(response) {
                console.log("salvo");
                $.mobile.changePage( "../status/list_status.html", { transition: "slideup"} );
            },
            error : function() {
                console.log("erro");
            }
        });
    });
});

