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

var api = "http://simaomenezes.com/webservice/WebServiceSysBugs/index.php/api/";

//var api = "http://localhost/WebServiceSysBugs/index.php/api/";
var loadAllStatus = $(function() {     
    $.ajax({
        type : "GET",
        url : api + "StatusRest/status",
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
            url : api + "StatusRest",
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
                $.mobile.changePage( "msg_erro.html", "data-inline='true' data-rel='dialog' data-transition='slidedown'", { transition: "slideup"} );
            }
        });
    });
});

