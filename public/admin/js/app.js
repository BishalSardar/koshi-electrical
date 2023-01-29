$("#add-btn").on("click", function (e) {
    e.preventDefault();
    getProduct();
});

var rowIdx = 0;
var gross_total_amount = 0;
var net_total_amount = 0;

var buyer_gross_total_amount = 0;

// product get function
function getProduct() {
    $.ajax({
        url: "/product/get",
        type: "get",
        dataType: "json",
        success: function (data) {
            let product = data["product"];

            console.log(product);

            let product_id = document.getElementById("product_id").value;

            const index = product.findIndex(
                (item) => item.id === parseInt(product_id)
            );

            let quantity = document.getElementById("quantity").value;
            let unit = document.getElementById("unit").value;
            let basic_rate = document.getElementById("basic_rate").value;
            let amount = document.getElementById("amount").value;
            $("#tableEstimate tbody").append(`

                                <tr id="R${++rowIdx}">
                                        <td class="text-center" scope="row"><input type="text" class="form-control" style ="border:none; background-color: white; padding:0;" readonly value='${rowIdx}'></input></td>
                                        <td class="fw-semibold"><input type="hidden" class="form-control" style ="border:none; background-color: white;" name="product_id[]" readonly value='${
                                            product[index]["id"]
                                        }'>${
                product[index]["name"]
            }</input></td>
                                        <td class="fw-semibold"><input type="text" class="form-control" style ="border:none; background-color: white;" name="quantity[]" readonly value='${quantity}'></input></td>
                                        <td class="fw-semibold"><input type="text" class="form-control" style ="border:none; background-color: white;" name="unit[]" readonly value='${unit}'></input></td>
                                        <td class="fw-semibold"><input type="text" class="form-control" style ="border:none; background-color: white;" name="basic_rate[]" readonly value='${basic_rate}'></input></td>
                                        <td class="fw-semibold"><input type="text" class="form-control" style ="border:none; background-color: white;" name="amount[]" readonly value='${amount}'></input></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><button class="btn btn-icon btn-rg btn-outline-danger" id="addBtn"><i class="fa fa-times"></i></button></a>
                                        </td>
                                    </tr>
                    `);

            gross_total_amount += parseInt(amount);

            document.getElementById("gross_total_amount").value =
                gross_total_amount;
            document.getElementById("net_total_amount").value =
                gross_total_amount;
        },
        error: function (data) {
            console.log(data);
        },
    });
}

$("#tableEstimate tbody").on("click", ".remove", function () {
    // Getting all the rows next to the row
    // containing the clicked button
    var child = $(this).closest("tr").nextAll();
    // Iterating across all the rows
    // obtained to change the index
    child.each(function () {
        // Getting <tr> id.
        var id = $(this).attr("id");

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children(".row-index").children("p");

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`${dig - 1}`);

        // Modifying row id.
        $(this).attr("id", `R${dig - 1}`);
    });

    // gross amount changes after deleting one row data
    var tr_id = $(this).closest("tr").attr("id");
    var currentrow = $(this).closest("tr");
    var tr_value = currentrow.find("td:eq(5) input[type='text']").val();

    gross_total_amount -= parseInt(tr_value);
    document.getElementById("gross_total_amount").value = gross_total_amount;
    var discount = $("#discount").val();
    document.getElementById("net_total_amount").value =
        gross_total_amount - discount;

    // Removing the current row.
    $(this).closest("tr").remove();

    // Decreasing total number of rows by 1.
    rowIdx--;
});

// amount value automatically changes after inputting quantity and basic rate
$(".qty, .prc").change(function () {
    var quantity = $("#quantity").val();
    var basic_rate = $("#basic_rate").val();
    var total = quantity * 1 * (basic_rate * 1);
    document.getElementById("amount").value = total;
});

// net total amount changes after inputtin discount
$("#discount").change(function () {
    var discount = $("#discount").val();
    var net_total_amount = $("#net_total_amount").val();
    console.log(net_total_amount);
    var total = gross_total_amount * 1 - discount * 1;
    document.getElementById("net_total_amount").value = total;
});
