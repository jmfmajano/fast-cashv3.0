$.notify.addStyle("metro", {
    html:
        "<div>" +
            "<div class='image' data-notify-html='image'/>" +
            "<div class='text-wrapper'>" +
                "<div class='title' data-notify-html='title'/>" +
                "<div class='text' data-notify-html='text'/>" +
            "</div>" +
        "</div>",
    classes: {
        default: {
            "color": "#fafafa !important",
            "background-color": "#ABB7B7",
            "border": "1px solid #ABB7B7"
        },
        error: {
            "color": "#fafafa !important",
            "background-color": "#FF0000",
            "border": "1px solid #FF0000"
        },
        success: {
            "color": "#000 !important",
            "background-color": "#00CC00",
            "border": "1px solid #00CC00"
        },
        info: {
            "color": "#000 !important",
            "background-color": "#29B6F6",
            "border": "1px solid #29b6f6"
        },
        warning: {
            "color": "#000 !important",
            "background-color": "#FFC107",
            "border": "1px solid #FFC107"
        },
        black: {
            "color": "#fafafa !important",
            "background-color": "rgba(33, 33, 33, 0.8)",
            "border": "1px solid #212121"
        },
        white: {
            "background-color": "#FBFCFC",
            "border": "1px solid #ddd"
        }
    }
});