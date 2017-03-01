//Add Product


var productRows = [];
var labourRows = [];
var products;
var clients;
var labours;

function addClientSelect() {
    var options = '<option value="" selected disabled>-- SELECT CLIENT --</option>';
    if (clients !== '' && (clients.length > 0)) {
        $.each(clients, function(index, value) {
            options += '<option value="' + value.id + '">' + value.name + '</option>'
        });
    }
    $('#clientSelectId').append(options);
}
$('#clientSelectId').on('change', function(ev) {
    var id = $(ev.target).val();

    function findClient(client) {
        return client.id == id;
    }

    var client = clients.find(findClient);

    $("#clientEmail").val(client.email);
    $("#clientAddress").val(client.address);
    $("#clientPhone").val(client.phone);
});

function removeBlock() {
    alert("test");
}

function changeName(ref) {
    var len = $(ref).data('len');
    var id = $(ref).val();

    function findLabour(labour) {
        return labour.id == id;
    }

    var labour = labours.find(findLabour);
    $("#labourName" + len).val(labour.name);
}

function getLabourRow(len) {
    var options = '<option selected disabled>-- SELECT LABOUR --</option>';
    if (labours !== '' && (labours.length > 0)) {
        $.each(labours, function(index, value) {
            options += '<option value="' + value.id + '">' + value.code + '</option>'
        });
    }
    var block = "";
    block += '<tr class="alert">';
    block += "<td>"+(len+1)+"</td>";
    block += '<td><select class="form-control" name="labours[' + len + '][id]" data-len="' + len + '" onchange="changeName(this);">' + options + '</select></td>';
    block += '<td><input type="text" class="form-control" id="labourName' + len + '" readonly placeholder="Labour Name"/></td>';
    block += '<td><input type="text" name="labours[' + len + '][no_of_hours]" class="form-control" placeholder="Hours"></td>';
    block += '<td><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>';
    block += "<tr>";
    return block;
}

function getProductRow(len) {
    var options = '<option selected disabled>-- SELECT PRODUCT --</option>';
    if (products !== '' && (products.length > 0)) {
        $.each(products, function(index, value) {
            options += '<option value="' + value.id + '">' + value.name + '</option>'
        });
    }

    var block = "";
    block += '<tr class="alert">';
    block += "<td>"+(len+1)+"</td>";

    block += '<td><select class="form-control" name="products[' + len + '][id]">' + options + '</select></td>';
    block += '<td><input type="text" name="products[' + len + '][quantity]" class="form-control" value="1" placeholder="Quantity"></td>';
    block += '<td><input type="text" name="products[' + len + '][no_of_days]" class="form-control hide" placeholder="Days" value="1"></td>';
    block += '<td><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>';
    block += "<tr>";
    return block;
}

function getCustomProductRow(len) {
    var block = "";
    block += '<tr class="alert">';
    block += "<td>"+(len+1)+"</td>";

    block += '<td><input type="text" class="form-control" placeholder="Product Name" name="products[' + len + '][name]"/>';
    block += '<input type="hidden" class="form-control" value="custom" name="products[' + len + '][custom]"/></td>';
    block += '<td><input type="text" name="products[' + len + '][quantity]" class="form-control" value="1" placeholder="Quantity"></td>';
    block += '<td><input type="text" name="products[' + len + '][no_of_days]" class="form-control hide" placeholder="Days" value="1"></td>';
    block += '<td><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>';
    block += "<tr>";
    return block;
}

$(document).ready(function() {
    $.ajax({
        'url': '/quote/data',
        'method': 'GET'
    }).done(function(data) {
        if (data) {
            products = data.products;
            clients = data.clients;
            labours = data.labours;
            if($("#clientSelectId").children().length == 0){
            	addClientSelect();
            }else{
            	$("#clientSelectId").trigger("change");
            }
        }
        console.log('Clients : ', clients);
    });

    if($("#block_product .panel-body table tbody").children().length>0){
    	console.log("Inside products");
    	$.each($("#block_product .panel-body table tbody").children(), function(key, val){
    		productRows.push(val);
    	});
    }

    if($("#block_labour .panel-body table tbody").children().length>0){
    	$.each($("#block_labour .panel-body table tbody").children(), function(key, val){
    		labourRows.push(val);
    	});
    }

    $("#quoteform #add_product").click(function() {
    	console.log("Length : ", productRows.length);
        var product_row = getProductRow(productRows.length);
        productRows.push(product_row);
        $("#block_product .panel-body table tbody").append(product_row);
    });

    $("#quoteform #add_custom_product").click(function() {
	console.log("Length : ", productRows.length);
        var product_row = getCustomProductRow(productRows.length);
        productRows.push(product_row);
        $("#block_product .panel-body table tbody").append(product_row);
    });

    $("#add_labour").click(function() {
        var labour_row = getLabourRow(labourRows.length);
        labourRows.push(labour_row);
        $("#block_labour .panel-body table tbody").append(labour_row);
    });
});
