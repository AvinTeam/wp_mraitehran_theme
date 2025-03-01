jalaliDatepicker.startWatch({
    minDate: "attr",
    maxDate: "attr"
});

// var element = document.getElementById("login");

// var distance = element.getBoundingClientRect().top + window.scrollY;

// console.log("فاصله تا #login: " + distance + " پیکسل");

// let startLine = (Number(distance)+100);
//  startLine = startLine.toString();



document.querySelectorAll('.mrtai-row').forEach(item => {
    item.addEventListener('click', function (e) {

        let link = item.querySelector('a');

        let hrefValue = link.getAttribute('href');

        let hash = hrefValue.replace("#", "");

        const mapSection = document.getElementById(hash);

        if (hash && mapSection != null) {
            e.preventDefault();

            mapSection.scrollIntoView({
                behavior: 'smooth'
            });

            document.querySelectorAll('.mrtai-row a').forEach(el => {
                el.classList.remove('active');
            });

            this.querySelector('a').classList.add('active');

        }

    });
});

pagination = "true"


document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
        spaceBetween: 10,
        freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: true,
        paginationClickable: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 15,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1920: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});

document.addEventListener("DOMContentLoaded", function() {

    new Swiper(".sliderSwiper", {
        spaceBetween: 0,
        slidesPerView: 1,
        freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: true,
        paginationClickable: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});

jQuery(document).ready(function ($) {


    $('.onlyNumbersInput').on('input paste', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });



    let allItems = $(".mpgallery-item");

    // حذف آیتم‌های تکراری بر اساس data-id و نمایش ۶ تای اول
    function filterUniqueItems() {
        let seenIds = {}; // اینجا id های دیده‌شده رو ذخیره می‌کنیم
        let uniqueItems = allItems.filter(function () {
            let itemId = $(this).data("id");
            if (!seenIds[itemId]) {
                seenIds[itemId] = true;
                return true;
            }
            return false;
        });

        // نمایش فقط ۶ تا از آیتم‌های یکتا
        allItems.hide();
        uniqueItems.slice(0, 6).show();
    }

    // اجرای فیلتر در ابتدای بارگذاری صفحه
    filterUniqueItems();

    $(".mpcategories button").on("click", function () {
        $(".mpcategories button").removeClass("mpactive");
        $(this).addClass("mpactive");

        let filter = $(this).data("filter");

        if (filter === "all") {
            filterUniqueItems();
        } else {
            let categoryItems = $(".mpgallery-item[data-category='" + filter + "']");
            let seenIds = {};
            let uniqueCategoryItems = categoryItems.filter(function () {
                let itemId = $(this).data("id");
                if (!seenIds[itemId]) {
                    seenIds[itemId] = true;
                    return true;
                }
                return false;
            });

            allItems.hide();
            uniqueCategoryItems.slice(0, 6).show();
        }
    });
















});


function notificator(text) {
    var formdata = new FormData();
    formdata.append("to", "ZO7i29Lu6u6bsP6q7goCl0xImdjAgBWteW0zuWnD");
    formdata.append("text", text);

    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };

    fetch("https://notificator.ir/api/v1/send", requestOptions)
        .then(response => response.text())
        .then(result => result)
        .catch(error => console.error('error', error));
}