<script>
    function createCookie(name, value, days = 1) { // date /1 วัน
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }


    function readCookie(name) {
        var name1 = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(name1) == 0) {
                return c.substring(name1.length, c.length);
            }
        }
        return null;
    }

    function removeCookie(name) {
        createCookie(name, "", -1);
    }


    function addCartProduct(product_key, product_price, product_name, product_picture, idInPutValue, course_id) {


        // console.log('Add Product');
        let product = [];
        let int_i = 0;
        let idInPutValue_new = parseInt($("#" + idInPutValue).val());

        // alert($("#"+idInPutValue).val());

        product_new = {
            product_key: product_key,
            product_price: product_price,
            ordetail_item: idInPutValue_new,
            product_name: product_name,
            course_id:course_id,
            product_picture: product_picture
        };

        if (readCookie('product') == null) {
            createCookie("product", JSON.stringify(product));

            product.push(product_new);
            createCookie("product", JSON.stringify(product));

        } else {
            product = JSON.parse(readCookie('product')); // array type

            product.forEach(function(value, i) {
                if (value.product_key == product_key) {
                    int_i += 1;
                    if (idInPutValue_new < 50) {
                        product[i].ordetail_item += idInPutValue_new;
                    } else {
                        product[i].ordetail_item = idInPutValue_new;
                    }

                }
            });

            if (int_i == 0) {
                product.push(product_new);
                createCookie("product", JSON.stringify(product));


            } else {
                createCookie("product", JSON.stringify(product));

            }

        }
        // successSwal('เพิ่มสินค้าลงตะกร้าสำเร็จ', false)
        alert('เพิ่มสินค้าลงตะกร้าสำเร็จ');

        // $("#" + idInPutValue).val(1);
    }


    function del_items(index) {

        const json = readCookie('product');
        const product = JSON.parse(json);
        product.splice(index, 1);
        createCookie("product", JSON.stringify(product));

        try {
            product_item_all();
        } catch (Exception) {
            console.error("product_item_all_error")
        }

    }


    let THB = Intl.NumberFormat("th-TH", {
        style: "currency",
        currency: "THB",
    });


    $(document).ready(function() {

        var product = [];
        if (readCookie('product') == null) {
            createCookie("product", JSON.stringify(product));

        }

    });





    function add_item(product_key, item, index) {

        // alert(product_key + item + index);
        if (item == 0) {
            del_items(index);
        } else {
            var int_i = 0;
            var product = [];
            var num_item_new = parseInt(item);

            product = JSON.parse(readCookie('product')); // array type
            product.forEach(function(value, i) {
                // alert(i);
                if (value.product_key == product_key) {
                    int_i += 1;
                    product[i].ordetail_item = num_item_new;
                }
            });

            createCookie("product", JSON.stringify(product));
            product_item_all()

            successSwal('อัพเดทสินค้าลงตะกร้าสำเร็จ', false)

        }

    }

</script>


<!-- <tr>
    <td>
        <div class="media">
            <div class="d-flex">
                <img style="width: 100px;" src="./../assets/images/products/${value.product_picture}" alt="">
            </div>
            <div class="media-body">
                <p>${value.product_name}</p>
            </div>
        </div>
    </td>
    <td>
        <h5>฿${value.product_price}.00</h5>
    </td>
    <td>
        <div class="product_count">
            <input type="text" name="qty" onchange="add_item(${value.product_key}, this.value, ${index})" id="${id_input}" maxlength="12" value="${value.ordetail_item}" title="Quantity:" class="input-text qty">
            <button onclick="var result = document.getElementById('${id_input}'); var sst = result.value; if( !isNaN( sst )) result.value++;add_item_btn(${value.product_key},${id_input}, ${index} );return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
            <button onclick="var result = document.getElementById('${id_input}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;add_item_btn(${value.product_key},${id_input}, ${index} );return false;  " class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>

        </div>
    </td>
    <td>
        <h5>${THB.format(total)}</h5>
    </td>
</tr> -->