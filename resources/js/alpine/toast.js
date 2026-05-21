export default function toast(sessionMessage = "", sessionType = "success") {
    return {
        show: false,
        message: "",
        type: "success",

        init() {
            if (sessionMessage) {
                this.dispatchToast(sessionMessage, sessionType);
            }
        },

        getColor(style = "border-") {
            return this.type == "success"
                ? `${style}valid`
                : this.type == "warning"
                  ? `${style}warning`
                  : `${style}invalid`;
        },

        dispatchToast(msg, type) {
            this.message = msg;
            this.type = type;
            this.show = true;

            setTimeout(() => {
                this.show = false;
            }, 7000);
        },

        handleEvent(event) {
            this.dispatchToast(event.detail[0].message, event.detail[0].type);
        },
    };
}
