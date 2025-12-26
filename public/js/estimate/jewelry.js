window.addEventListener( "DOMContentLoaded" , ()=> {
    getChange("jewelry");
    getChange("certificate");
    getChange("is_color_dia", "white_dia");
    getChange("dia_certificate");
    document.getElementsByClassName("add_file")[0].classList.remove("disabled")
    show_checkbox_contents();
});

function getChange(showClass, hideClass=null) {
    const targets = document.getElementsByName(showClass);
    targets.forEach(
        target => target.addEventListener("change" ,
            result => switchClass(result.target.value, showClass + "_chosen", hideClass)
        )
    );
}

function switchClass(show, showClass, hideClass) {
    const targets = document.getElementsByClassName(showClass);
    const inversionTargets = document.getElementsByClassName(hideClass);
    const order = (show === "1") ? "flex" : "none";
    const inversionOrder = (show === "0") ? "flex" : "none";
    Array.prototype.forEach.call(targets, function (target) {
        target.style.display = order;
    })
    Array.prototype.forEach.call(inversionTargets, function (target) {
        target.style.display = inversionOrder;
    })
}

// チェックボックスでのコンテンツ表示非表示
function show_checkbox_contents(){
    const show_checkbox_metal = document.getElementById("show_checkbox_metal");
    const show_checkbox_brand = document.getElementById("show_checkbox_brand");
    if(show_checkbox_metal.checked){
        metal_open();
    }else{
        metal_close();
    }
    if(show_checkbox_brand.checked){
        brand_open();
    }else{
        brand_close();
    }
}
function metal_open() {
    const metal = document.getElementById("metal");
    metal.style.display = "table";
    metal.classList.add("active")
}
function metal_close() {
    const metal = document.getElementById("metal");
    metal.style.display = "none";
    metal.classList.remove("active")
}

function brand_open() {
    const brand = document.getElementById("brand");
    brand.style.display = "table";
    brand.classList.add("active")
}
function brand_close() {
    const brand = document.getElementById("brand");
    brand.style.display = "none";
    brand.classList.remove("active")
}
// ダイヤ詳細表示、非表示
function jewelry_area_close() {
    const jewelry_area = document.getElementsByClassName("jewelry_area")[0];
    const jewelry_area_detail = document.getElementsByClassName("jewelry_area")[1];

    jewelry_area.classList.add("close")
    jewelry_area_detail.classList.add("close")
}
function jewelry_area_open() {
    const jewelry_area = document.getElementsByClassName("jewelry_area")[0];
    const jewelry_area_detail = document.getElementsByClassName("jewelry_area")[1];

    jewelry_area.classList.remove("close")
    jewelry_area_detail.classList.remove("close")
}
// 撮影するポイント表示

function photograph_point() {
    var dia_point_content = document.getElementById('dia_point_content');
    if (show_checkbox_metal.checked) {
        dia_point_content.classList.add("close")
    } else {
        dia_point_content.classList.add("close")
    }
}
$(function(){
  $(".toggleButton").click(function() {
    $(".toggleContent").toggleClass("active");
 
  });
});