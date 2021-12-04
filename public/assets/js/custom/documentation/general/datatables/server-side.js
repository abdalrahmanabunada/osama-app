"use strict";
var KTDatatablesServerSide = function () {
    var e, t = function () {
        document.querySelector("#kt_datatable_example_1").querySelectorAll('[type="checkbox"]').forEach((e => {
            e.addEventListener("click", (function () {
                setTimeout((function () {
                    n()
                }), 50)
            }))
        }))
    },
        n = function () {
            const e = document.querySelector("#kt_datatable_example_1"),
                t = document.querySelector('[data-kt-docs-table-toolbar="base"]'),
                n = document.querySelector('[data-kt-docs-table-toolbar="selected"]'),
                a = document.querySelector('[data-kt-docs-table-select="selected_count"]'),
                r = e.querySelectorAll('tbody [type="checkbox"]');
            let s = !1,
                o = 0;
            r.forEach((e => {
                e.checked && (s = !0, o++)
            })), s ? (a.innerHTML = o, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
        };
    return {
        init: function () {
            e = $("#kt_datatable_example_1").DataTable({
                responsive: !0,
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                order: [
                    [5, "desc"]
                ],
                stateSave: !0,
                select: {
                    style: "os",
                    selector: "td:first-child",
                    className: "row-selected"
                },
                ajax: {
                    url: "https://preview.keenthemes.com/api/datatables.php"
                },
                columns: [{
                    data: "RecordID"
                }, {
                    data: "Name"
                }, {
                    data: "Email"
                }, {
                    data: "Company"
                }, {
                    data: "CreditCardNumber"
                }, {
                    data: "Datetime"
                }, {
                    data: null
                }],
                columnDefs: [{
                    targets: 0,
                    orderable: !1,
                    render: function (e) {
                        return `\n                            <div class="form-check form-check-sm form-check-custom form-check-solid">\n                                <input class="form-check-input" type="checkbox" value="${e}" />\n                            </div>`
                    }
                }, {
                    targets: 4,
                    render: function (e, t, n) {
                        return `<img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/card-logos/${n.CreditCardType}.svg" class="w-35px me-3" alt="${n.CreditCardType}">` + e
                    }
                }, {
                    targets: -1,
                    data: null,
                    orderable: !1,
                    className: "text-end",
                    render: function (e, t, n) {
                        return '\n                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">\n                                Actions\n                                <span class="svg-icon svg-icon-5 m-0">\n                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>\n                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>\n                                        </g>\n                                    </svg>\n                                </span>\n                            </a>\n                            \x3c!--begin::Menu--\x3e\n                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">\n                                \x3c!--begin::Menu item--\x3e\n                                <div class="menu-item px-3">\n                                    <a href="#" class="menu-link px-3" data-kt-users-table-filter="edit_row">\n                                        Edit\n                                    </a>\n                                </div>\n                                \x3c!--end::Menu item--\x3e\n                                \n                                \x3c!--begin::Menu item--\x3e\n                                <div class="menu-item px-3">\n                                    <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">\n                                        Delete\n                                    </a>\n                                </div>\n                                \x3c!--end::Menu item--\x3e\n                            </div>\n                            \x3c!--end::Menu--\x3e\n                        '
                    }
                }]
            }), e.$, e.on("draw", (function () {
                t(), n(), KTMenu.createInstances()
            })), document.querySelector('[data-kt-docs-table-filter="search"]').addEventListener("keyup", (function (t) {
                e.search(t.target.value).draw()
            })), t()
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTDatatablesServerSide.init()
}));