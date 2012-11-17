/* 
 * Neste arquivo temos todos os serviços da
 * tela de lista de usuario e cadastro do mesmo
 * 
 * Autor Simão Menezes
 */


var api = "http://simaomenezes.com/webservice/WebServiceSysBugs/index.php/api/";
var apiuser = "http://simaomenezes.com/webservice/WebServiceSysBugs/index.php/api/AccountsRest/accounts";
var apiprojeto = "http://simaomenezes.com/webservice/WebServiceSysBugs/index.php/api/ProductsRest/products";
var apistatus = "http://simaomenezes.com/webservice/WebServiceSysBugs/index.php/api/StatusRest/status";


/*########## functions de list ##########################*/
$('#pageListBugs').live('pageinit', function(event) {
    loadAllBugs;        
});

$('#page_cad_bugs').live('pageinit', function(event) {
    loadAllUser;    
    loadAllProjetc;
    loadAllStatus;
});

//var api = "http://localhost/WebServiceSysBugs/index.php/api/";
//var apiuser = "http://localhost/WebServiceSysBugs/index.php/api/AccountsRest/accounts";
//var apiprojeto = "http://localhost/WebServiceSysBugs/index.php/api/ProductsRest/products";
//var apistatus = "http://localhost/WebServiceSysBugs/index.php/api/EstatusRest/status";


var loadAllBugs = $(function() {     
    $.ajax({
        type : "GET",
        url : api + "BugsRest/bugs",
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
        var bugs = $(this).find("bugs").text();
        var user = $(this).find("user").text();
        var projeto = $(this).find("projeto").text();
        var status = $(this).find("status").text();       
        
        var output = [ '<li data-role="list-divider">' + user + '</li>\n\
                        <li>\n\
                            <a href="#">\n\
                                <h3>' + projeto + '</h3>\n\
                                <p><strong>' + bugs + '</strong></p>\n\
                                </a></li>']
        $("ul").append(output.join("\n"));
        $('ul').listview('refresh');
    });
}

/*############ function de cadastro #########################*/
$(document).bind('pageinit',function() {    
    
    $('#btnAdd').click(function() {
        $.ajax({
            type : 'POST',
            url : api + "BugsRest",
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

/*########### preenche o combo user #################*/
var loadAllUser = $(function() {     
    $.ajax({
        type : "GET",
        url : apiuser,
        dataType : "xml",
        contentType : 'application/xml',
        processData : false,
        success : listUserXML,
        error : function(callback) {
//            alert('error: ' + callback);
        }
    });
});
function listUserXML(data) {
    $(data).find("item").each(function() {
        var name = $(this).find("name").text();
        var id = $(this).find("id").text();
       var output = [ '<option value='+ id +'>' + name + '</option>' ]
        $("#user").append(output);
    });
}
/*########### preenche o combo projeto #################*/
var loadAllProjetc = $(function() {     
    $.ajax({
        type : "GET",
        url : apiprojeto,
        dataType : "xml",
        contentType : 'application/xml',
        processData : false,
        success : listProjetctXML,
        error : function(callback) {
//            alert('error: ' + callback);
        }
    });
});
function listProjetctXML(data) {
    $(data).find("item").each(function() {
        var name = $(this).find("name").text();
        var id = $(this).find("id").text();
        var output = [ '<option value='+ id +'>' + name + '</option>' ]
        $("#projeto").append(output);
//        $('select').listview('refresh');
    });
}
/*########### preenche o combo sttaus #################*/
var loadAllStatus = $(function() {     
    $.ajax({
        type : "GET",
        url : apistatus,
        dataType : "xml",
        contentType : 'application/xml',
        processData : false,
        success : listStatusXML,
        error : function(callback) {
//            alert('error: ' + callback);
        }
    });
});
function listStatusXML(data) {
    $(data).find("item").each(function() {
        var id = $(this).find("id").text();
        var name = $(this).find("name").text();
        var output = [ '<option value='+ id +'>' + name + '</option>' ]
        $("#estatus").append(output);
    });
}

