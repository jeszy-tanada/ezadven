$('#item').on('change', function() {

    if(this.value==2){
    $('#type').empty();
    $('#price').val(150);

    var list = ['Magic', 'Plain', 'Colored'];
    for (i = 0; i < list.length; i++) {
    var opt = $("<option></option>");
    opt.val(list[i]);
    opt.html(list[i]);
    $('#type').append(opt);
    $('#type').val(opt.val());
    }
    } else if(this.value==3){
    $('#type').empty();
    $('#price').val(300);

    var list = new Array('5x4', '3x5');
    for (i = 0; i < list.length; i++) {
    var opt = $("<option></option>");
    opt.val(list[i]);opt.html(list[i]);
    $('#type').append(opt);
    $('#type').val(opt.val());
    }
    } else if(this.value==4){
    $('#type').empty();
    $('#price').val(123);

    var list = new Array('1x1', '2x2', '3x3');
    for (i = 0; i < list.length; i++) {
    var opt = $("<option></option>");
    opt.val(list[i]);opt.html(list[i]);
    $('#type').append(opt);
    $('#type').val(opt.val());
    }
    } else if(this.value==5){
    $('#type').empty();
    $('#price').val(627);

    var list = new Array('ID', 'Bag Tag', 'Name Tag');
    for (i = 0; i < list.length; i++) {
    var opt = $("<option></option>");
    opt.val(list[i]);opt.html(list[i]);
    $('#type').append(opt);
    $('#type').val(opt.val());
    }
    } else if(this.value==6){
    $('#type').empty();
    $('#price').val(18);

    var list = new Array('Business', 'Personal');
    for (i = 0; i < list.length; i++) {
    var opt = $("<option></option>");
    opt.val(list[i]);opt.html(list[i]);
    $('#type').append(opt);
    $('#type').val(opt.val());
    }
    } else if(this.value==7){
    $('#type').empty();
    $('#price').val(28);

    var list = new Array('Black and White', 'Colored');
    for (i = 0; i < list.length; i++) {
    var opt = $("<option></option>");
    opt.val(list[i]);opt.html(list[i]);
    $('#type').append(opt);
    $('#type').val(opt.val());
    }
    } else if(this.value==1){
    $('#type').empty();
    $('#price').val(200);

    var list = new Array('Plain White', 'Colored', 'Print');
    for (i = 0; i < list.length; i++) {
    var opt = $("<option></option>");
    opt.val(list[i]);opt.html(list[i]);
    $('#type').append(opt);
    $('#type').val(opt.val());
    }
    }

    // var select = $("<select></select>");



    });
var no = 0;
var td = "";
$('#add').on('click', function() {
    $('#items').show();
    var tr = $("<tr></tr");
    td = $("<td></td");
    td.html(++no);
    tr.append(td);

    td = $("<td></td");
    td.html($("#product option:selected").text());
    tr.append(td);
    $('#table-data').append(tr);

    td = $("<td></td");
    td.html($("#type option:selected").text());
    tr.append(td);
    $('#table-data').append(tr);

    td = $("<td></td");
    td.html($("#quantity").val());
    tr.append(td);
    $('#table-data').append(tr);

    td = $("<td></td");
    td.html($("#price").val());
    tr.append(td);
    $('#table-data').append(tr);

    td = $("<td class='total'></td");
    td.html($("#price").val() * $("#quantity").val());
    tr.append(td);
    $('#table-data').append(tr);
    compute();
    });


function compute(){
    var total = 0;
    if(no==0){
    alert("NO ORDER YET!!");
    }else {
    $('#ordermodal').modal('show');
    $('#order-table').show();
    $.each( $( ".total" ), function() {
    // Do something
    total += parseInt($(this).text());
    });
    $('#subtotal').text(total);
    vat = total / 1.12 * 0.12;
    $('#vat').text(vat.toFixed(2));
    $('#sales').text((total-vat).toFixed(2));
    $('#half').text(total/2*-1);
    $('#remaining').text( total + parseInt(    $('#half').text()     )   );
    }
    }
$('#items').hide();
$('#order-table').hide();